<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $primaryKey = 'id_color'; // Définit explicitement la clé primaire

    public $timestamps = false; // Désactive les horodatages

    protected $fillable = [
        'name_color', 'hex',
    ];

    // Vous pouvez également définir des relations Eloquent ici si nécessaire
}
