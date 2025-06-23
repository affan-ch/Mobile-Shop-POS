<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $fillable = [
        'product_id', 'shop_id', 'sale_date', 'sale_price', 'invoice_id', 'quantity', 'total_price'
    ];

    // Automatically cast sale_date to a Carbon instance
    protected $casts = [
        'sale_date' => 'date',
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
