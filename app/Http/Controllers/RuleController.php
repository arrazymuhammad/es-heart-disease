<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_gejala'] = Gejala::all();
        $data['list_penyakit'] = Penyakit::with('rule')->get();
        return view('rule.index', $data);
    }

    public function setRule($penyakit, $gejala)
    {
        $rule = Rule::where('id_penyakit', $penyakit)->where('id_gejala', $gejala)->first();
        if($rule){
            $rule->delete();
            return "";
        }else{
            $rule = new Rule;
            $rule->id_penyakit = $penyakit;
            $rule->id_gejala = $gejala;
            $rule->save();
            return "&#10003;";
        }
    }
}
