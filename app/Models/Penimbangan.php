<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    protected $table = 'penimbangan';
    protected $fillable = ['id_bidan','id_balita','id_kader','tgl_timbang','bb','tb'];

    public function balita()
    {
        return $this->hasOne(App\Models\Balita::class);
    }
    public function bidan()
    {
        return $this->hasOne(App\Models\Bidan::class);
    }
    public function kader()
    {
        return $this->hasOne(App\Models\Kader::class);
    }
}
