@extends('layouts.template')
@include('layouts.alerts')
</div>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-12">
      <h4 class="text-center">Pengalaman Mencoba Cafe SmileCoffe</h4>
    </div>
  </div>
    @foreach($detail as $s)
  <div class="row">
    <div class="col-md-12">
      <center><img style="width: 350px; height: 290px;" src="/pengalaman/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></center>
    </div>
  </div>
<div class="col-md-3">
      <h5>Gita Nadapdap</h5>
      <h6>22-07-1999  01.00.00</h6>
    </div>
  <div class="row mt-5 mb-4">
    <div class="col-md-2"></div>
    
    <div class="col-md-8">
      <textarea class="form-control" rows="5" disabled="">{{$s->keterangan}}</textarea>
    </div>
  </div>
 @endforeach
</div>