<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
\Midtrans\Config::$serverKey = config('midtrans.serverKey');
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;


    }

    public function createPayment(Request $request, $orderId)
    {
        // Ambil data order dari database
        $order = Order::find($orderId);

        if (!$order) {
            return back()->with('error', 'Order tidak ditemukan');
        }

        // Parameter pembayaran Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total, // Pastikan kolom 'total' ada di tabel orders
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email' => $order->customer_email,
            ],
        ];

        try {
            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);
            
            // Kirim Snap Token ke frontend
            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $order->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
