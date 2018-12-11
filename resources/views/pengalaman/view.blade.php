@extends('layouts.template')
@include('layouts.alerts')
@section('content')
@endsection

<?php

	$p=DB::select('select * from pengalaman');
?>
@if($p)
@foreach($pengalaman as $s)
<br><br>
<link rel="stylesheet" type="text/css" href="{{ asset('css/gita1.css')}}">
@if(Auth::user())
<a href="{{route('pengalaman.create')}}" class="container"><button class="btn btn-primary">New</button></a><br><br>
@endif
<a href="{{route('pengalaman.create')}}" class="container"><button class="btn btn-primary" disabled="">New</button></a><br><br>
<div class="container">
  <div class="row" style="background-color: #dbdbdb ">

    <div class="row col-md-11 m-5 p-2" id="gita" style="background-color: #BCB7B7">
      <div class="col-md-4">
        <h5>{{$s->judul}}</h5>
        <img src="/pengalaman/{{$s->gambar}}" width="200px" class="card">
      </div>
      <div class="col-md-8 mt-4 text-justify" >
       <textarea class="form-control" rows="6">{{$s->keterangan}}</textarea><br>
        <u><a href="{{route('pengalaman.detail',$s->id)}}" class="btn btn-warning" style="float: right; ">Detail</a></u>
      </div>

    </div>
    
  </div>
</div>
@endforeach
	
	@endif
	@if(!$p)
	<div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Pengalaman yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
    @endif
	
</div>




