<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['product_type', 'agent_category', 'product_price', 'paid_amount', 'remaining_amount', 'product_received', 'payment_status', 'purchased_at', 'created_at', 'updated_at'];
}
