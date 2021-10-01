<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_product',
        'deskripsi_product',
        'img_product',
        'cat_product',
        'stock_product',
    ];
}
