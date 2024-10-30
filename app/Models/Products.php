<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'bidding_end',
        'status',
    ];
}
