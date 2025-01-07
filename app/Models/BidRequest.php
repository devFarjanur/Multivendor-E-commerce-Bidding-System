<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'category_id',
        'subcategory_id',
        'type',
        'description',
        'target_price',
        'image_path',
        'bid_status',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'bid_request_id');
    }
}
