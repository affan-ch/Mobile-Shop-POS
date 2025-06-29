<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'shop_id', 'total_bill', 'discount', 'final_bill', 'customer_name', 'customer_phone', 'customer_info'
    ];

    // Relationship with Sale
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Relationship with Shop
    public function shop()
    {
        return $this->belongsTo(User::class);
    }
}