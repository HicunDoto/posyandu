<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    protected $table = 'kader';
    protected $fillable = ['nama_kader','tempat','tempatl','tl','jenis','jabatan','no_telp','alamat'];
}
