<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    use HasFactory;

    protected $table = 'totals';

    protected $fillable = [
        'name',
        'tongX',
        'tongN',
        'doanhThu',
    ];
}
