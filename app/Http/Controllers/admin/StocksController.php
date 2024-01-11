<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class StocksController extends Controller
{
    public function index()
    {
        try {
            $products = Product::orderBy('id_product', 'ASC')->get();
            return view('admin.stocks', compact('products'));
        } 
        catch (\Throwable $th) {
            dd($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $stockData = $request->input('stock');

            foreach ($stockData as $productId => $newStock) {

                $product = Product::find($productId);
                if ($product) {
                    $product->stock = $newStock;
                    $product->save();
                }
            }

            return redirect()->back()->with('success', 'Stock updated successfully!');
        } 
        catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'An error occured: ' .$th);
        }
    }
}
