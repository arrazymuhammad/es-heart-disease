<?php

namespace App\Models;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rule';
    protected $primaryKey = 'id';

    function penyakit(){
    	return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }
    function gejala(){
    	return $this->belongsTo(Gejala::class, 'id_gejala');
    }
}
