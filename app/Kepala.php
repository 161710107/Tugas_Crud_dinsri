<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kepala extends Model
{
    protected $table = 'kepalas';
    protected $fillable = ['nama','pasien_id'];
    public $timestamps = true;

    public function Pasien()
	{
		return $this->belongsTo('App\Pasien','pasien_id');
	}
}