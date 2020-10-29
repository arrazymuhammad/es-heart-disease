@extends('template.base')

@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Diagnosis</h1>
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
						<h3 class="card-title">Diagnosis</h3>
					</div>
					<div class="card-body">
						<form action="" method="post">
							@csrf
							@foreach($selected as $item)
								<input type="hidden" name="selected[]" value="{{$item}}">
							@endforeach
							@foreach($excepted as $item)
								<input type="hidden" name="excepted[]" value="{{$item}}">
							@endforeach
							<h1>{{$gejala->kode}} | {{$gejala->nama}}</h1>
							<input type="hidden" name="id_gejala" value="{{$gejala->id}}">
							<button name="pilihan" value="1" class="btn btn-success">Ya</button>
							<button name="pilihan" value="0" class="btn btn-danger">Tidak</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection