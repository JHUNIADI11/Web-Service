<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    use HasFactory;
    // model rental
    use HasFactory;
    protected $table = 'rental2';
    protected $primaryKey = 'id_barang';
    public $timestamps = true;
    protected $fillable = ['id_barang','nama_barang','nama_penyewa','harga_sewa','jumlah_sewa','keterangan'];
}
