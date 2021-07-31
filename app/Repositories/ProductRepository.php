<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    public static function allData()
    {
        return Product::all();
    }

    public static function insertOrChangeData(Request $request, $id = null)
    {
        return Product::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'price' => $request->price
        ]);
    }

    public static function findData($id)
    {
        return Product::findOrFail($id);
    }

    public static function removeData($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
