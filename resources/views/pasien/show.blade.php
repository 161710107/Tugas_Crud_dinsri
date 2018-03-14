@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pasien 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">nama pasien</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $p->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">No_Pasien</label>
						<input type="text" name="nopsn" class="form-control" value="{{ $p->nopsn }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Dokter</label>
						<input type="text" name="dokter_id" class="form-control" value="{{ $p->Dokter->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection