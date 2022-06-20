<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description', 'price', 'categori_id'];

        // relasi table dari product dengan category_id
        public function category()
        {
            return $this->belongsTo(Categori::class, 'categori_id');
        }
}
