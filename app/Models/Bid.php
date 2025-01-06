<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'bid_request_id',
        'bid_price',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function bid_request()
    {
        return $this->belongsTo(BidRequest::class, 'bid_request_id');
    }
}
