<br><br><br><br><?php 


  
?>
<style type="text/css">
.vr
{
  display:inline;
  height:23%;
  width:1px;
  border:1px inset;
  margin:5px
}
</style>

@extends('layouts.template')
@include('layouts.alerts')
<br><br>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
</div>
<div class="container card" style="background-color: #dbdbdb;">

      @foreach($detail as $s)

      <?php
            $DB=DB::SELECT("SELECT * FROM users where id=$s->id_member");
       ?>
  <div class="row mt-3">
    <div class="col-md-12">
      <h4 class="text-center">{{$s->judul}}</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <center><img style="width: 350px; height: 290px;" src="/pengalaman/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></center>
    </div>
  </div><b><hr style="background-color: #000000 "></b><br>  
    <center>  
      <div class="row">
      <div class="col-md-3">
        
        <h5>{{$DB[0]->name}}</h5>
        <br>
        <h6>Tgl dipost :{{$s->date}}</h6>
      </div>
   <div class="vr">
     
   </div>
      
      
      <div class="col-md-7" >
        <textarea style="background-color: #dbdbdb" class="form-control" rows="5" disabled="">{{$s->keterangan}}</textarea>
      </div>
 @endforeach
 <br><br>
</div>
<br><br>
</center>
</div>

<br><br><br><br>
