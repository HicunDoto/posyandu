<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $table = 'bidan';
    protected $fillable = ['nama_bidan','tempat','tl','jenis','status','no_telp','alamat'];
}
