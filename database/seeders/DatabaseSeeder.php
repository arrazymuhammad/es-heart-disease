<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->createGejalaItem();
    	$this->createPenyakitItem();
    	$this->createRuleItem();
    }

    function createGejalaItem(){
    	Gejala::truncate();
		$list_data = [
			"Apakah merasakan sulit tidur?",
			"Apakah merasakan gelisah?",
			"Apakah pernah merasakan pingsan?",
			"Apakah merasakan mual?",
			"Apakah merasakan muntah?",
			"Apakah merasakan nyeri dada kiri bertambah sakit bila batuk atau menelan?",
			"Apakah merasakan nyeri dada kiri pada saat menghirup nafas?",
			"Apakah merasakan nyeri dada kiri seperti diremas?",
			"Apakah merasakan kaku pada leher?",
			"Apakah merasakan lemas?",
			"Apakah merasakan nyeri dada kiri menjalar ke punggung?",
			"Apakah merasakan nyeri dada kiri seperti terbakar?",
			"Apakah merasakan nyeri dada kiri terasa pegal?",
			"Apakah merasakan keringat dingin?",
			"Apakah merasakan nyeri dada kiri menjalar ke dagu/leher?",
			"Apakah merasakan nyeri dada kiri tertekan kurang dari 15 menit?",
			"Apakah merasakan nyeri dada kiri tertekan/tertindih membaik setelah minum obat?",
			"Apakah merasakan nyeri kepala?",
			"Apakah merasakan pembengkakan kaki?",
			"Apakah merasakan stress?",
			"Apakah merasakan kelemahan otot (massa otot berkurang)?",
			"Apakah merasakan mudah lelah karena aktivitas berat seperti mengangkat beban berat?",
			"Apakah merasakan mudah lelah karena aktivitas ringan seperti mengetik?",
			"Apakah merasakan mudah lelah karena aktivitas sedang seperti belajar untuk ujian?",
			"Apakah merasakan nyeri sendi?",
			"Apakah merasakan perasaan sering berdebar?",
			"Apakah merasakan sesak nafas di malam hari?",
			"Apakah merasakan sesak nafas saat beraktivitas?",
			"Apakah merasakan sesak nafas saat perubahan posisi?",
			"Apakah merasakan impotensi?",
			"Apakah merasakan mimisan?",
			"Apakah merasakan nyeri dada kanan tertusuk?",
			"Apakah merasakan nyeri dada kiri tertusuk?",
			"Apakah merasakan nyeri otot?",
			"Apakah merasakan penglihatan kabur?",
			"Apakah merasakan tersedak?",
			"Apakah merasakan batuk?",
			"Apakah merasakan demam?",
			"Apakah merasakan kencing berdarah?",
			"Apakah merasakan kesemutan?",
			"Apakah merasakan nyeri dada kanan tertekan?",
			"Apakah merasakan nyeri dada kiri tertekan/tertindih membaik setelah istirahat?",
			"Apakah merasakan nyeri dada kiri tertekan/tertindih terus menerus?",
			"Apakah merasakan nyeri di ulu hati (tengah)?",
			"Apakah merasakan penurunan berat badan?",
		];

        foreach ($list_data as $key => $item) {
            $gejala = new Gejala;
            $gejala->kode = "G".sprintf('%02d', $key+1);
            $gejala->nama = $item;
            $gejala->save();
        }
    }
    function createPenyakitItem(){
    	Penyakit::truncate();
		$list_data = [
			"Akut Miocard Syndrom",
			"Gagal Jantung", 
			"Edema Paru", 
			"Demam Jantung Reumatik",
			"Aritmia", 
			"Katup Jantung", 
			"Stable Angina Pectoris",
			"Perikarditis", 
			"Unstable Angina Pectoris", 
			"Jantung Hipertensi", 
			"ST / Non ST Elevasi Miocard Syndrom", 
			"Cardiac Arrest",
			"Miokarditis", 
			"Arteri Perifer", 
        ];

        foreach ($list_data as $key => $item) {
            $gejala = new Penyakit;
            $gejala->kode = "P".sprintf('%02d', $key+1);
            $gejala->nama = $item;
            $gejala->save();
        }
    }
    function createRuleItem(){
    	//5-1-9-10-11-8-3-7-4-13-6-14-2-12
    	Rule::truncate();
		$list_data = [
			'P05' => [	'G01', 'G02', 'G03', 'G10', 'G14', 'G18', 'G19', 'G20', 
						'G21', 'G22', 'G23', 'G24', 'G27', 'G28', 'G29', 'G45'],

			'P01' => [	'G01', 'G06', 'G07', 'G08', 'G14', 'G18', 'G21', 'G25', 
						'G26', 'G31', 'G32', 'G33', 'G34', 'G36', 'G39','G41'],

			'P09' => [	'G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G07', 'G08', 
						'G09', 'G11', 'G12', 'G13', 'G15', 'G16', 'G17', 'G42'],

			'P10' => [	'G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G07', 'G08', 
						'G09', 'G11', 'G12', 'G13', 'G15', 'G16', 'G17', 'G43'],

			'P11' => [	'G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G07', 'G08', 
						'G09', 'G10', 'G11', 'G12', 'G13', 'G15', 'G16', 'G17'],

			'P08' => [	'G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G07', 'G08', 
						'G09', 'G11', 'G12', 'G13', 'G15', 'G16', 'G17'],

			'P03' => [	'G01', 'G02', 'G04', 'G05', 'G06', 'G07', 'G08', 'G11', 
						'G12', 'G13', 'G26', 'G32', 'G33', 'G44'],

			'P07' => [	'G01', 'G02', 'G03', 'G10', 'G19', 'G20', 'G22', 'G23', 
						'G24', 'G27', 'G28', 'G29', 'G36'],

			'P04' => [	'G01', 'G02', 'G10', 'G19', 'G20', 'G22', 'G23', 'G24', 'G27', 'G28', 'G29'],

			'P13' => [	'G04', 'G05', 'G14', 'G18', 'G25', 'G31', 'G34', 'G37', 'G38'],

			'P06' => [	'G01', 'G02', 'G03', 'G10', 'G14', 'G18', 'G26'],

			'P14' => [	'G10', 'G19', 'G21', 'G25', 'G30', 'G40'],

			'P02' => [	'G01', 'G09', 'G10', 'G20', 'G30', 'G35'],

			'P12' => [	'G03', 'G14', 'G18', 'G35']];

        foreach ($list_data as $penyakit => $list_gejala) {
        	$penyakit = Penyakit::where('kode', $penyakit)->first();
        	foreach($list_gejala as $gejala){
	        	$gejala = Gejala::where('kode', $gejala)->first();
	            $rule = new Rule;
	            $rule->id_penyakit = $penyakit->id;
	            $rule->id_gejala = $gejala->id;
	            $rule->save();
        	}
        }
    }
}
