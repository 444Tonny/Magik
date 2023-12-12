<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    
    protected $table = 'orders';

    protected $primaryKey = 'id_orders'; // Définit explicitement la clé primaire

    public $timestamps = false; // Désactive les horodatages

    protected $fillable = [
        'status_order',
        'date_orders',
        'name_order',
        'username_order',
        'address',
        'phone',
        'email',
        'id_user',
        'id_product',
        'color'
    ];

    public static function getCurrentOrders($userID)
    {
        $orders = null;

        if(session('google_id'))
        {
            $orders = Order::select(
                'orders.*', 
                'products.name_product',
                'products.image_large'
            )->join('products', 'orders.id_product', '=', 'products.id_product')
            ->where('orders.id_user', '=', ''.$userID)
            ->get();

            return $orders;
        }

        return $orders;
    }

}
