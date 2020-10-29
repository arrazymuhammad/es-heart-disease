<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    function index(){
    	$data['selected'] = request('selected') ?? [];
    	$data['excepted'] = request('excepted') ?? [];
    	if(request()->method() == 'GET') {
    		$data['gejala'] = Gejala::first();
    	} else {
    		$pilihan = (request('pilihan') == 1) ? 'selected' : 'excepted';
    		$data[$pilihan][] = request('id_gejala');
			$data['combine'] = array_merge($data['selected'], $data['excepted']);
			$list_penyakit = [];
    		foreach($data['combine'] as $key => $item){
    			$list = Rule::where('id_gejala', $item);
    			if (in_array($item, $data['selected'])) {
    				if(count($list_penyakit) > 0) $list = $list->whereIn('id_penyakit', $list_penyakit);
    				$list_penyakit = $list->get()->pluck('id_penyakit')->toArray();
    			} else {
    				if(count($list_penyakit) == 0){
    					$list_penyakit = Penyakit::all()->pluck('id')->toArray();
    				} else {
    					$list = $list->whereIn('id_penyakit', $list_penyakit);
    				}
    				$list_buang = $list->get()->pluck('id_penyakit')->toArray();
    				$list_penyakit = array_diff($list_penyakit, $list_buang);
    			}
    			$next_g = Rule::whereIn('id_penyakit', $list_penyakit)->get()
    						  ->whereNotIn('id_gejala', $data['combine'])
    						  ->pluck('id_gejala')->unique()->sort()->first();
    			$list_penyakit = array_values($list_penyakit);
                $list_g = Gejala::find($data['selected']);
    			if(count($list_penyakit) == 0) {
                    return redirect('diagnose/fault')->with('list_gejala', json_encode($list_g));
                }
    			if(count($list_penyakit) == 1){
    				$id_penyakit = $list_penyakit[0];
    				$list_gejala = Rule::where('id_penyakit', $id_penyakit)->get()->sortBy('kode');
    				if(count($list_gejala) == count($data['selected'])){
    					$check = true;
	    				foreach($list_gejala as $key => $gejala){
	    					if($gejala->id_gejala != $data['selected'][$key]) $check = false;
	    				}
	    				if($check) return redirect('diagnose/'.$id_penyakit)->with('list_gejala', json_encode($list_g));
    				}
    			}
    		}
    		$data['gejala'] = Gejala::find($next_g);
    	}
    	return view('diagnose.index', $data);
    }

    function show(Penyakit $penyakit)
    {
    	$data['penyakit'] = $penyakit;
    	return view('diagnose.result', $data);
    }
    function fault()
    {
    	return view('diagnose.fault');
    }
}
