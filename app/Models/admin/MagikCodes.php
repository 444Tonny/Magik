<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagikCodes extends Model
{
    use HasFactory;

    protected $table = 'magik_codes';
    protected $primaryKey = 'id_code';

    protected $fillable = [
        'value', 'points','is_used','date_redeem'
    ];

    public $timestamps = false;
}
