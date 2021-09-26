<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dt_imunisasi extends Model
{
    protected $table = 'dt_imunisasi';
    protected $fillable = ['id_imun','id_balita'];

}
