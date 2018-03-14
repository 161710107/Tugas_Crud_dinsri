<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
     protected $table = 'pasiens';
     protected $fillable = ['nama','nopsn','dokter_id'];
     public $timestamps = true;

	public function Dokter()
	{
		return $this->belongsTo('App\Dokter','dokter_id');
	}

    public function Kepala()
    {
    	return $this->hasOne('App\Kepala','pasien_id');
    }
}
