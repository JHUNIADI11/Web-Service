<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'customer_id', 'product_id', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    // relasi table dari product dengan product_id
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
