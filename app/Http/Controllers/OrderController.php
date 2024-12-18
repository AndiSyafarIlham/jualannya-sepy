<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('dashboard.order.index', compact('orders'));
    }
    public function acc($id)
    {
        try {
            $order = Order::find($id);
            if (!$order) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $order->update(['status' => 'paid']);
            return back()->with('success', 'Pembelian berhasil dikonfirmasi');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    public function cancel($id)
    {
        try {
            $order = Order::find($id);
            if (!$order) {
                return back()->with('error', 'Data tidak ditemukan');
            }
            $order->update(['status' => 'canceled']);
            return back()->with('success', 'Pembelian berhasil dicancel');
        } catch (\Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }
    

    public function process(Request $request)
    {
        // Add the total price and status to the request
        $request->request->add([
            'total_price' => $request->price,
            'status' => 'unpaid',
        ]);
    
        // Create the order
        $order = Order::create($request->all());
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');  // Replace with your actual server key
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    
        // Transaction parameters
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'name' => $request->name,
                'email' => $request->email,
            ],
        ];
    
        try {
            // Get Snap token
            $snapToken = \Midtrans\Snap::getSnapToken($params);
    
            // Simpan snap_token ke dalam database
            $order->update(['snap_token' => $snapToken]);
    
            return view('frontend.order', compact('order', 'snapToken'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error while generating Snap token: ' . $e->getMessage());
        }
    }
    



    public function webhook(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hashed =  $request->order_id . $request->status_code . $request->gross_amount . $serverKey;

        if ($hashed == $request->signature_key) {
            $order = Order::find($request->order_id);

            if ($order && $request->transaction_status == 'settlement') {
                $order->status = 'paid';
                $order->save();
            }
        }

        return response()->json(['status' => 'success']);
    }
}
