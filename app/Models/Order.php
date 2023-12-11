<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
