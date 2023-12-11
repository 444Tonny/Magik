<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::select(
            'orders.*', 
            'products.name_product',
            'products.stock',
            'products.image_large'
        )->join('products', 'orders.id_product', '=', 'products.id_product')->get();

        return view('admin.orders', compact('orders'));
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $id_order = $request->input('edited_order');
            $order = Order::find($id_order);
            $product = Product::find($order->id_product);

            if (!$order) {
                return redirect()->back()->with('error', 'Order not found.');
            }

            // Update 'status'
            $previousStatus = $order->status_order;
            $order->status_order = $request->input('status_order');

            // Put product back in stock in case of cancel (unless it ws already canceled before)
            if($request->input('status_order') == 'Canceled' && $previousStatus != 'Canceled')
            {
                $product->stock++;
            }
            // Remove product from stock in case of a pending/confirmed (unless it was not canceled before)
            else if($request->input('status_order') != 'Canceled' && $previousStatus == 'Canceled')
            {
                if($product->stock - 1 < 0) return redirect()->back()->with('error', 'Not enough product in stock');
                else $product->stock--;
            }

            $product->save();
            $order->save();

            DB::commit(); 

            return redirect()->back()->with('success', 'Order updated successfully.');
        
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occured');
        }
    }

    public function destroy(Request $request)
    {
        try {
            
            DB::beginTransaction();

            $id = $request->input('edited_order');
            $order = Order::find($id);
            $product = Product::find($order->id_product);

            if (!$order) {
                // Gérer le cas où la commande n'est pas trouvée
                return redirect()->back()->with('error', 'Order not found');
            }

            // Update 'status'
            $previousStatus = $order->status_order;
 
            // Order already canceled so no need to add back in stock
            if($previousStatus != 'Canceled')
            {
                $product->stock++;
            }
            
            // delete order
            
            $product->save();
            $order->delete();

            DB::commit();

            return redirect()->back()->with('warning', 'Order deleted successfully');
            
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occured');
        }

        
    }

}
