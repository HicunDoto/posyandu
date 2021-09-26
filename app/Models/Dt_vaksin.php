<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dt_vaksin extends Model
{
    protected $table = 'dt_vaksin';
    protected $fillable = ['id_vaksin','id_balita'];

}
