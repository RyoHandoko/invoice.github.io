<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceDetail extends Model
{
    use HasFactory;
    public function invoice()
    {
        return $this->belongsTo(invoice::class, 'invoice_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
