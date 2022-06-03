<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'tenSP',
        'DVT',
        'mauSac',
        'regular_price',
        'sale_price',
        'tgBaoQuan',
        'description',
        'image',
        'images',
        'category_id',
    ];

}
