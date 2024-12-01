<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'vendor_id',
        'bid_amount',
        'bid_status',
    ];

}
