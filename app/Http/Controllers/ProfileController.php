<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function edit(User $user)
    {
        return view('profile.edit' , compact('user'));
    }

    public function update(Request $request , User $user)
    {
        $data=$request->validate([
            'name' => ['required','string','max:255'],
        ]);

        if(! is_null($request->password))
        {
            $request->validate([
                'password' => ['string','min:8','confirmed']
            ]);

            $data['password']=Hash::make($request->password);

        }

        $user->update($data);
        return redirect('/profile');

    }

    public function order()
    {
        $orders=auth()->user()->order()->latest()->paginate(10);
        return view('profile.order-list',compact('orders'));
    }

    public function showDetails(Order $order)
    {
        return view('profile.order-details',compact('order'));
    }

    public function payment(Order $order)
    {
        $invoice = (new Invoice)->amount(1000);
        return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice,function($driver, $transactionId) use ($order , $invoice) {
               
            $order->payment()->create([
                    'resnumber' => $invoice->getUuid(),
                ]);

           
        })->pay()->render();

    }

    

        


}