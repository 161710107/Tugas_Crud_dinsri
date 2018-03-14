<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokters'; // -> meminta izin untuk mengakses table dosens
    protected $fillable = ['nama','nosip']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function Pasien()
    {
    	return $this->hasMany('App\Pasien','dokter_id');
    }
}
