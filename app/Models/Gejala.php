<?php

namespace App\Models;

use App\Models\Rule;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';
    protected $primaryKey = 'id';

    function rule(){
    	return $this->hasMany(Rule::class, 'id_gejala');
    }
}
