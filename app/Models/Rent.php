<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ['id_sepeda_sewa', 'nama_sepeda_sewa', 'jenis_sepeda_sewa', 'gambar_sewa', 'id_pengguna'];
}
