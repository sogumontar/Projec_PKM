@extends('layouts.template')
@foreach($db as $s)
<?php if(Auth::user()){ $test=Auth::user()->id;
 $ss= DB::select("select * from rating where id_member=$test AND id_homestay=$s->id");

 
}?>

</div>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-12">
      <h4 class="text-center">Detail Homestay</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <center><a href="/uploadgambar/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/uploadgambar/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a></center>
    </div>
  </div>
<div class="col-md-3">
      <h5>Gita Nadapdap</h5>
      <h6>22-07-1999  01.00.00</h6>
    </div>
    <form method="post" action="{{route('homestay.rating',$s->id)}}">
{{ csrf_field() }}
    @if($ss)
     <input value="<?php echo  $s->rating / $s->jumlah_booking?>" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled="">
     @else

     <input value="3" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5">
     @endif
     <input type="submit" class="btn btn-primary" name="">
   </form>
  <div class="row mt-5 mb-4">
    <div class="col-md-2"></div>
    
    <div class="col-md-8">
      <textarea class="form-control" rows="5" disabled=""></textarea>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/test.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/star-rating.min.css')}}">
<script type="text/javascript" src="{{asset('vendor/jss/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jss/js/star-rating.min.js')}}"></script>
@endforeach