<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PayPing\PayPingException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class PaymentController extends Controller
{
    public function payment()
    {
        $cart=Cart::instance('cart-shop');
        $cartItem=$cart->all();

        if($cartItem->count())
        {
            $price=$cartItem->sum(function($cart){
                return $cart['quantity'] * $cart['product']->price;
            });
        
            $order = auth()->user()->order()->create([
                'status'=>'unpaid',
                'price'=>$price,
            ]);

            $orderItems=$cartItem->mapWithKeys(function($cart){
            return [$cart['product']->id=>['quantity'=>$cart['quantity']]];
            });

            $order->product()->attach($orderItems);

            //پرداخت از طریق درگاه
            // $token = config('services.payping.token');
            // $args = [
            //     // "amount" => $price,
            //     "amount" => 1000,
            //     "payerIdentity" => "شناسه کاربر در صورت وجود",
            //     "payerName" => auth()->user()->name,
            //     "description" => "توضیحات",
            //     "returnUrl" => route('payment.callback'),
            //     // "clientRefId" => $res_number,
            //     "clientRefId" => $transactionId,
            // ];

            // Create new invoice.
            // $invoice = (new Invoice)->amount($price);
            $invoice = (new Invoice)->amount(1000);

            // $payment = new \PayPing\Payment($token);

            // try {
            //     $payment->pay($args);
            // } catch (Exception $e) {
            //     throw $e;
            // }
            //echo $payment->getPayUrl();
    
            // زمانیکه از شتابیت استفاده میکنیم کدهای زیر را استفاده نمیکنیم
            // $order->payment()->create([
            //     'resnumber' => $res_number,
            //     'price' => $price,
            // ]);


            // Purchase the given invoice.
            return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice,function($driver, $transactionId) use ($order , $cart , $invoice) {
               
                $order->payment()->create([
                        'resnumber' => $invoice->getUuid(),
                    ]);

                $cart->flush();
            })->pay()->render();

            // $cart->flush();
            // return redirect($payment->getPayUrl());

        }

        return back();
        
    }

    public function callback(Request $request)
    {
        // پکیج پی پینگ
        // return $request->all();

    //     $payment = Payment::where('resnumber',$request->clientRefId)->firstOrFail();

    //     $token = config('services.payping.token');

    //     $payping = new \PayPing\Payment($token);

    //     try {
    //         if($payping->verify($request->refid, 1000)){
    //             $payment->update([
    //                 'status' => 1,
    //             ]);
    //             $payment->order()->update([
    //                 'status' => 'paid',
    //             ]);

    //             alert()->success('پرداخت با موفقیت انجام شد');
    //             return redirect('/products');
    //         }else{
    //             alert()->error('پرداخت انجام نشد');
    //             return redirect('/products');
    //         }
    //     }
    //     catch (PayPingException $e) {
           
    //         $errors = collect(json_decode($e->getMessage(),true));
    //         // return $errors->first();
    //         alert()->error($errors->first());
    //         return redirect('/products');
    //     } 
    // }

         
        // پکیج شتابیت
        try {
                $payment = Payment::where('resnumber',$request->clientrefid)->firstOrFail();
                // amount($payment->order->price)
                $receipt = ShetabitPayment::amount(1000)->transactionId($request->clientrefid)->verify();
            
                
                $payment->update([
                    'status' => 1,
                ]);
                $payment->order()->update([
                    'status' => 'paid',
                ]);

                alert()->success('پرداخت با موفقیت انجام شد');
                return redirect('/products');
                
                 
            } catch (InvalidPaymentException $exception) {
                /**
                   * when payment is not verified, it will throw an exception.
                   * We can catch the exception to handle invalid payments.
                   * getMessage method, returns a suitable message that can be used in user interface.
                **/
                // echo $exception->getMessage();
                alert()->error($exception->getMessage());
                return redirect('/products');
            }

    }
}
