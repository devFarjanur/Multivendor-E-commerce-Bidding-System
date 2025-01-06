<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;
  protected $fillable = [
    'product_id',
    'customer_id',
    'vendor_id',
    'quantity',
    'total_price',
    'status',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function customer()
  {
    return $this->belongsTo(User::class, 'customer_id');
  }

  public function vendor()
  {
    return $this->belongsTo(Vendor::class, 'vendor_id');
  }
}
