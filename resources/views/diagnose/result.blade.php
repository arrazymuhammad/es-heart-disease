@extends('template.base')

@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Diagnose Result</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Hasil Diagnosis</h3>
					</div>
					<div class="card-body">
						@if (session('list_gejala'))
						<h4>Berdasarkan gejala yang anda pilih sebagai berikut : </h4>
							@php 
								$list_gejala = json_decode(session('list_gejala'));
							@endphp
							<ol>
								@foreach($list_gejala as $gejala)
									<li>{{$gejala->gejala->kode}} | {{$gejala->gejala->nama}}</li>
								@endforeach
							</ol>
						@endif
						<h4>Anda kemungkinan besar menderita penyakit : </h4>
						<div class="card card-header">
							<h4>{{$penyakit->nama}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection