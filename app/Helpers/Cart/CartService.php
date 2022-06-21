<?php

namespace App\Helpers\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CartService
{
  
    protected $Cart;
    protected $name='default';

    public function __construct()
    {
        // $this->Cart = session()->get('Cart') ?? collect([]);
        $this->Cart = session()->get($this->name) ?? collect([]);
    }

    public function put(array $value , $obj=null)
    {
        if(! is_null($obj) && $obj instanceof Model)
        {
            $value =array_merge($value , [

                'id' => Str::random(10),
                'subject_id'=> $obj->id,
                'subject_type'=> get_class($obj),

            ]);
        }
        elseif(! isset($value['id'])){
            $value= array_merge($value , ['id'=> str::random(10)]);

        }
        $this->Cart->put($value['id'] , $value);
        session()->put($this->name, $this->Cart);
        return $this;
    }


    public function update($key,$option)
    {
       $item = collect($this->get($key,false)); 
       if(is_numeric($option))
       {
            $item->merge([
                'quantity'=>$item['quantity']+$option,
            ]);
       }

       if(is_array($option))
       {
            $item=$item->merge($option);
       }

       $this->put($item->toArray());
       return $this;
       
       
    }


     public function has($key)
     {
         if($key instanceof Model) {
             return ! is_null(
             $this->Cart->Where('subject_id', $key->id)->Where('subject_type', get_class($key))->first(),
         );
        }

         return ! is_null(
             $this->Cart->firstWhere('id' , $key)
         );
     }


     public function count($key)
     {
        if(! $this->has($key)) return 0;
        return $this->get($key)['quantity'];
     }



     public function get($key, $withRelationShip=true)
     {
        $item=$key instanceof Model

        ? $this->Cart->Where('subject_id', $key->id)->Where
        ('subject_type', get_class($key))->first()

        : $this->Cart->firstWhere('id', $key);

        // return $item;
        // return $this->withRelationShipIfExist($item);
        return $withRelationShip ? $this->withRelationShipIfExist($item) : $item;
     }

     public function all()
     {
        $cart= $this->Cart;
        $cart=$cart->map(function($item)
        {
             // dd($item);
            return $this->withRelationShipIfExist($item);

        });

        return $cart;
     }

     public function withRelationShipIfExist($item)
     {
        //  dd($item);
        if(isset($item['subject_id']) && isset($item['subject_type']))
        {
            $class=$item['subject_type'];
            $subject=(new $class())->find(
                $item['subject_id']
            );
           
            $item[strtolower(class_basename($class))]=$subject;

            unset($item['subject_id']);
            unset($item['subject_type']);
            return $item;
        }
        return $item;
     }

     public function delete($key)
     {
        if($this->has($key))
        {
            $this->Cart=$this->Cart->filter(function($item) use($key){
                if($key instanceof Model)
                {
                return ($item['subject_id'] != $key->id) && ($item['subject_type'] != $key->id) != get_class($key);
                }
                return $key != $item['id'];
            });

            session()->put($this->name,$this->Cart);
            return true;
        }

        return false;
     }

     public function instance(string $name)
     {
        $this->Cart= session()->get($name) ?? collect([]);
        $this->name= $name;
        return $this;
     }
}