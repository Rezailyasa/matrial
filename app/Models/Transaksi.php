<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    use HasFactory;

    public function data_toko()
    {
        return $this->belongsTo(Data_toko::class);
    }
    public function data_barang()
    {
        return $this->belongsTo(Data_barang::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function data_biaya_kirim()
    {
        return $this->belongsTo(Data_biaya_kirim::class);
    }
    public function data_komisi()
    {
        return $this->belongsTo(Data_komisi::class);
    }
    public function data_harga()
    {
        return $this->belongsTo(Data_harga::class);
    }
}
