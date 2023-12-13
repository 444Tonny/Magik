<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\admin\MagikUser;
use App\Models\admin\MagikCodes;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function indexRedeem(Request $request)
    {
        $currentOrders = Order::getCurrentOrders(session('google_id'));

        return view('client.redeem', compact('currentOrders'));
    }

    public function redeemPoints(Request $request)
    {
        try {
            DB::beginTransaction();

            if(!session('google_id')) return redirect()->back()->with('error', "Debes iniciar sesión para continuar");
            $currentUser = MagikUser::where('id', session('google_id'))->first();

            // Check if codes exists and not used
            $validator = Validator::make($request->all(), [
                'code' => 'required|string',
            ]);

            $validator->after(function ($validator) use ($request) {
                $input = $request->all();
                $cleanedData = array_map('htmlspecialchars', $input);

                $request->replace($cleanedData);
            });

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $magikCode = MagikCodes::where('value', $request->input('code'))->first();

            // Code not exist
            if(!$magikCode || $magikCode->is_used == 1 || $magikCode->date_redeem != null)
            {
                return redirect()->back()->with('error', "Tu código no es válido"); 
            }

            // valide, ajouter points et invalider code
            else 
            {
                $magikCode->is_used = 1;
                $magikCode->date_redeem = now();

                $currentUser->points = $currentUser->points + $magikCode->points;
            }

            $magikCode->save();
            $currentUser->save();
            
            Session::put('points', $currentUser->points);

            DB::commit();

            return redirect()->back()->with('success', '¡Felicidades, has recibido '. $magikCode->points .' puntos!');

        } catch (\Throwable $th) {

            //throw $th;
            DB::rollBack();
            dd($th->getMessage());

            return redirect()->back()->with('error', 'An error occured');
        }

    }

    public function orderProduct(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name_order' => 'required|string',
                'username_order' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
            ]);
    
            // Ajouter une étape de nettoyage après la validation
            $validator->after(function ($validator) use ($request) {
                $input = $request->all();
                $cleanedData = array_map('htmlspecialchars', $input);

                // Remplacer les données dans la requête par les données échappées
                $request->replace($cleanedData);
            });

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Check stock
            $id_product = $request->input('id_product');
            $product = Product::find($id_product);
            $stockValue = $product->stock;

            if($stockValue <= 0) return redirect()->back()->with('error', 'No hay suficientes productos en stock');
            else $product->stock--;
    
            $order = new Order([
                'name_order' => $request->input('name_order'),
                'username_order' => $request->input('username_order'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'color' => $request->input('color'), 
                'status_order' => 'Pending',
                'date_orders' => Carbon::now(),
                'id_product' => $id_product,
                'id_user' => session('google_id') // Vous pouvez ajuster cela en fonction de votre logique d'utilisateur authentifié
            ]);
            
            // Chekc price

            if(!session('google_id')) return redirect()->back()->with('error', "Debes iniciar sesión para continuar");
            $currentUser = MagikUser::where('id', session('google_id'))->first();

            if($currentUser->points >= $product->price)
            {
                $currentUser->points = $currentUser->points - $product->price;
            }
            else return redirect()->back()->with('error', "No tienes suficientes puntos");

            $currentUser->save();
            $product->save();
            $order->save();

            DB::commit(); 

            Session::put('points', $currentUser->points);

            return redirect()->back()->with('success', 'Your order has been successfully sent');

        } catch (\Throwable $th) {
            DB::rollback();

            //dd($th->getMessage());
            return redirect()->back()->with('error', 'An error occured');
        }
    }
}
