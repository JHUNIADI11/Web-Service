<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categori extends Model
{
    use HasFactory;
    protected $table = 'categori';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name'];

    //relasi dari product to caregori
    public function product()
    {
        return $this->hasMany(Product::class,'categori_id');
    }
}
