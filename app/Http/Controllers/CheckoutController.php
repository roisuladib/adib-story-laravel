<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use Exception;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function process(Request $request) {
        // Save User Data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proses Checkout
        $code = 'AS-' . mt_rand(000000,999999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        // Transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        // Lopping data carts
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(000000,999999);
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'code' => $trx,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => ''
            ]);
        }

        // Delete Cart data
        Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->delete();

        // Configurasi Midtrans        
        Config::$serverKey = config('services.midtrans.serverKey');        
        Config::$isProduction = config('services.midtrans.isProduction');        
        Config::$isSanitized = config('services.midtrans.isSanitized');        
        Config::$is3ds = config('services.midtrans.is3ds');

        // Cretae array to send Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,                
                'email' => Auth::user()->email,                                               
            ],
            'enabled_payments' => [
                'gopay', 'bni_va', 'bri_va', 'cimb_clicks', 'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va', 'bca_va', 'shopeepay', 'indomaret', 'bank_transfer'
            ],
            'vtweb' => []
        ];        
        try {            
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;                        
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function callback(Request $request) {
        
    }
}
