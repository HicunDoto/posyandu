<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $table = 'balita';
    protected $fillable = ['nama','id_user','tempat','tl','jenis','ayah','ibu','anakke','alamat'];

}
