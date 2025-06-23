<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'invoice_id',
        'shop_id',
        'quantity',
    ];

    /**
     * Get the product associated with the claim.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the invoice associated with the claim.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the shop (user) associated with the claim.
     */
    public function shop()
    {
        return $this->belongsTo(User::class, 'shop_id');
    }
}
