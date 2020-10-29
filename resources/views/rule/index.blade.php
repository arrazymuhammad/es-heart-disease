@extends('template.base')

@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Rules</h1>
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
						<h3 class="card-title">Rules Representation</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th rowspan="2" width="50px" class="text-center">Kode Penyakit</th>
									<th rowspan="2" width="50px" class="text-center">Rule</th>
								</tr>
							</thead>
							<tbody>
								@foreach($list_penyakit->sortBy('kode') as $penyakit)
									<tr>
										<td>
											{{$penyakit->kode}}
										</td>
										<td>
											{!!
												$penyakit->rule->sortBy('id_gejala')->map(fn($v) => $v->gejala->kode)->implode(", ")
											!!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
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
						<h3 class="card-title">Rules Representation</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th rowspan="2" width="50px" class="text-center">Kode Gejala</th>
									<th colspan="{{$list_penyakit->count()}}" class="text-center">Kode Penyakit</th>
								</tr>
								@foreach($list_penyakit->sortBy('kode') as $penyakit)
								<th width="50px" class="text-center">{{$penyakit->kode}}</th>
								@endforeach
							</thead>
							<tbody>
								@foreach($list_gejala->sortBy('kode') as $gejala)
								<tr>
									<td class="text-center">{{$gejala->kode}}</td>
									@foreach($list_penyakit->sortBy('kode') as $penyakit)
										<td width="50px" class="text-center" onclick="setRule(this, {{$penyakit->id}},{{$gejala->id}})">
											{!!$penyakit->hasGejala($gejala->id)!!}
										</td>
									@endforeach
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('script')
	<script>
		function setRule(self, penyakit, gejala){
			$.get(`{{url('master/rule/set-rule')}}/${penyakit}/${gejala}`, function(result){
				$(self).html(result)
			});
		}
	</script>
@endpush

@push('style')
	<style>
		td:not(:first-child):hover {
			background: #ddd;
		}
	</style>
@endpush