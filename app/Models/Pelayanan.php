<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $table = 'pelayanan';
    protected $fillable = ['id_bidan','id_balita','id_kader','id_penimbangan','tgl_layanan','id_imun','id_vaksin','penyuluhan'];

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
    public function penimbangan()
    {
        return $this->hasOne(App\Models\Penimbangan::class);
    }
}
