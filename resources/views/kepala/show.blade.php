@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Kepala_keluarga_pasien
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Kepala_Keluarga_pasien</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $w->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Pasien</label>	
			  			<input type="text" name="pasien_id" class="form-control" value="{{ $w->Pasien->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection