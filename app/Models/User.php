<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'address',
        'phone',
        'profile_image',
        'is_active',
        'email_verified_at',
        'date_of_birth',
        'gender',
        'last_login_at',
        'last_login_ip',
        'referral_code',
        'preferences',
        'reward_points',
        'is_suspended',
        'suspension_reason',
        'country',
        'state',
        'alternate_email',
        'alternate_phone',
        'tax_id',
        'newsletter_subscription',
    ];

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    public function isVendor()
    {
        return $this->role === 'vendor';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCustomer()
    {
        return $this->role === 'customer';
    }
}
