<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function getProductsByCategories()
    {
        // Récupérer les catégories spécifiées
        $categories = ['Accesorios', 'Consolas', 'PC Gaming', 'Sillas Gaming', 'Experiencias'];

        // Tableaux pour stocker les produits de chaque catégorie
        $allProducts = [];

        // Récupérer les produits pour chaque catégorie
        foreach ($categories as $categoryName) {
            $category = Category::where('name_category', $categoryName)->first();

            if ($category) {
                // Récupérer les 5 premiers produits pour chaque catégorie
                $products = Product::where('id_category', $category->id_category)
                    ->take(5)
                    ->get();

                // Stocker les produits dans le tableau associatif
                $allProducts[$categoryName] = $products;
            }
        }

        $currentOrders = Order::getCurrentOrders(session('google_id'));

        // Retourner la vue avec les données
        return view('client.index', compact('allProducts', 'currentOrders'));
    }

    public function getProductDetail(Request $request)
    {
        $idProduct = $request->input('id_product');
        $product = Product::find($idProduct);
        $colors = null;

        $productColor = array();

        // Vérifiez si le produit et sa propriété color existent
        if ($product && $product->color_product !== null) {
            
            $colors = Color::all();

            // Séparez les nombres de la chaîne et stockez-les dans $productColor
            $productColor = explode(';', $product->color_product);

            $colors = Color::whereIn('id_color', $productColor)->get();
        }

        $currentOrders = Order::getCurrentOrders(session('google_id'));

        if ($product) {
            //echo($colors);
            return view('client.product', compact('product', 'colors', 'currentOrders'));
        } 
        /*else {
            // Redirigez ou affichez une page d'erreur si le produit n'est pas trouvé
            return redirect()->route('page_not_found');
        }*/
    }
}
