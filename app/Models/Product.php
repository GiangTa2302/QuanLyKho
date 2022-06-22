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
        'giaNhap',
        'giaXuat',
        'tgBaoQuan',
        'description',
        'quantity',
        'image',
        'images',
        'category_id',
    ];
}
