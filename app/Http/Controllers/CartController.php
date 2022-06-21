<?php

namespace App\Http\Controllers;

use App\Helpers\cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }
    
    
    public function addToCart(Product $product)
    {

        $cart= Cart::instance('cart-shop');
        if(( $cart->has($product)))
        {
            if($cart->count($product)<$product->inventory)
            {
                $cart->update($product,1);
            }
            
        }

        else
        {

            $cart->put([

                'quantity'=> 1,
                'price'=> $product->price,
                ],

            $product
            );
        }
        return redirect('/cart');
    }


    public function quantityChange(Request $request)
    {
        $data=$request->validate([
            'quantity'=>'required',
            'id'=>'required',

        ]);
        return $data;

        $cart=Cart::instance($data['cart']);

        if($cart->has($data['id']))
        {
            $cart->update($data['id'],[
                'quantity'=>$data['quantity']
            ]);
            return response(['status'=>'success']);
        }
        return response(['status'=>'error'],404);
    }


    public function delete($id)
    {
        $cart=Cart::instance('cart-shop');
        $cart->delete($id);
        return back();
    }
}
