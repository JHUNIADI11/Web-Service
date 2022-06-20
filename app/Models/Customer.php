<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'phone', 'email', 'address'];

    //Relasi dari order to customer
    public function order(){
        return $this->hasMany(order::class);
    }
}
