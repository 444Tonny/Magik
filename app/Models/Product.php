<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_product'; // Définit explicitement la clé primaire
    public $incrementing = true; // Assure que l'incrémentation automatique est activée
    protected $keyType = 'int'; // Définit explicitement le type de la clé primaire

    public $timestamps = false; // Désactive les horodatages

    protected $fillable = [
        'name_product', 'description', 'price', 'stock', 'image_large', 'image_small', 'id_category', 'color_product',
    ];
}
