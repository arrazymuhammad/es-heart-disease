<?php

namespace App\Models;

use App\Models\Rule;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id';

    function rule(){
    	return $this->hasMany(Rule::class, 'id_penyakit');
    }
    function hasGejala($gejala){
    	return $this->rule->where('id_gejala', $gejala)->count() > 0 ? "&#10003;" : "";
    }
}
