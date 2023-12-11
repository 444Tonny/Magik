<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id_category'; // Définit explicitement la clé primaire

    public $timestamps = false; // Désactive les horodatages

    protected $fillable = [
        'id_category', 'name_category',
    ];

    // Vous pouvez également définir des relations Eloquent ici si nécessaire
}
