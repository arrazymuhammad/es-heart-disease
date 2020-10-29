@extends('template.base')

@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Gejala</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Tambah Data Gejala
					</div>
					<div class="card-body">
						@if(!isset($edit))
						<form action="{{url('master/gejala')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="" class="control-label">Kode Gejala</label>
								<input type="text" name="kode" class="form-control">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Deskripsi Gejala</label>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-group">
								<button class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</form>
						@else
						<form action="{{url('master/gejala',$gejala->id)}}" method="post">
							@csrf
							@method('put')
							<div class="form-group">
								<label for="" class="control-label">Kode Gejala</label>
								<input type="text" name="kode" value="{{$gejala->kode}}" class="form-control">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Deskripsi Gejala</label>
								<input type="text" name="nama" value="{{$gejala->nama}}" class="form-control">
							</div>
							<div class="form-group">
								<button class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</form>
						@endif
					</div>
				</div> 
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Gejala</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover table-datatable">
							<thead>
								<tr>
									<th width="50px">NO</th>
									<th width="50px">Aksi</th>
									<th width="50px">Kode</th>
									<th>Deskripsi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($list_gejala->sortBy('kode') as $gejala)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
										<div class="btn-group">
											<a href="{{url('master/gejala', $gejala->id)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
											@include('template.utils.delete', ['url' => url('master/gejala', $gejala->id)])
										</div>
									</td>
									<td>{{$gejala->kode}}</td>
									<td>{{$gejala->nama}}</td>
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