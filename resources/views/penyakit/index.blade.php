@extends('template.base')

@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Penyakit</h1>
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
						Tambah Data Penyakit
					</div>
					<div class="card-body">
						@if(!isset($edit))
						<form action="{{url('master/penyakit')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="" class="control-label">Kode Penyakit</label>
								<input type="text" name="kode" class="form-control">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Deskripsi Penyakit</label>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-group">
								<button class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</form>
						@else
						<form action="{{url('master/penyakit',$penyakit->id)}}" method="post">
							@csrf
							@method('put')
							<div class="form-group">
								<label for="" class="control-label">Kode Penyakit</label>
								<input type="text" name="kode" value="{{$penyakit->kode}}" class="form-control">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Deskripsi Penyakit</label>
								<input type="text" name="nama" value="{{$penyakit->nama}}" class="form-control">
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
						<h3 class="card-title">Data Penyakit</h3>
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
								@foreach($list_penyakit->sortBy('kode') as $penyakit)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
										<div class="btn-group">
											<a href="{{url('master/penyakit', $penyakit->id)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
											@include('template.utils.delete', ['url' => url('master/penyakit', $penyakit->id)])
										</div>
									</td>
									<td>{{$penyakit->kode}}</td>
									<td>{{$penyakit->nama}}</td>
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