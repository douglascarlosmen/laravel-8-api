<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderRepository
{

    public static function allData()
    {
        return Order::with('products', 'client')->get();
    }

    public static function insertOrChangeData(Request $request, $id = null)
    {
        $order = Order::updateOrCreate(['id' => $id], [
          'client_id' => $request->client_id
        ]);

        $order->productsPivot()->delete();

        if (count($request->products) > 0) {
            foreach ($request->products as $product) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product['id']
                ]);
            }
        }

        return $order->load('products', 'client');
    }

    public static function findData($id)
    {
        return Order::with('products', 'client')->findOrFail($id);
    }

    public static function removeData($id)
    {
        $order = Order::with('productsPivot')->findOrFail($id);
        $order->productsPivot()->delete();
        $order->delete();
    }
}
