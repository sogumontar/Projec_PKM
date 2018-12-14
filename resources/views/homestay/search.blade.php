<br><br>@include('layouts.alerts')
@extends('layouts.owner')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/test.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/star-rating.min.css')}}">
<script type="text/javascript" src="{{asset('vendor/jss/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jss/js/star-rating.min.js')}}"></script>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<div class="container" style="margin-top:30px;" >
  <div class="row">
    <div class="col-sm-12">
      <h1>Daftar homestay </h1>
      <hr>
      <a href="#" style="color:#000; text-decoration:none;"></a>
   
      <?php
       $ee=DB::select("SELECT * from record_pemesanan_homestay");
        $i=0;
       
           
            
        $ghgh=DB::SELECT("SELECT * from homestay");
        
        $trtr=$ghgh[$i]->kecamatan;
        $tes=DB::select("SELECT * from  homestay where  nama like '%$ag%' OR  kecamatan like'%ag%'");
        
            foreach($tes as $rr){
           
            echo"<br>";   
             $i++; 
            
          
         
          

      ?>

      <div class="row">
        <div class="col-md-1">
        </div>
          <div class="col-md-6" >
            <div class="card" style="width:760px;height:220px;">
              <span class="border border-primary" style="height:220px">
              <div class="card-body">
                <?php ?>
                <div class="col-md-2">
                <img src="/uploadgambar/{{$rr->gambar}}" alt="" style="width:250px; float:left;">
                </div>
                <div style="float: left;" class="col-md-7">
                <h1 style="color:#353b48"></h1>
                  <h3 class="card-title">{{$rr->nama}} </h3>
                  <p class="card-title">100</p>
                <div class="row">
                          <div class="col-lg-9">
                          @if($rr->jumlah_booking ==0)  
                           <li class=""><input value="0"  type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled=""></li>
                           @else
                           <li class=""><input value="<?php echo  $rr->rating / $rr->jumlah_booking?>"  type="number" disabled class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" ></li>
                           @endif <br><br>
                          

                        </div>
                        <div class="col-md-1">
                          
                        </div>
                         <div class="col-md-12">
                        

                              <div class="col-md-1" align="left">
                                <a href="{{route('homestay.booking',$rr->id)}}" float="left"><button class="btn btn-primary">Booking</button></a>
                              
                              </div>
                              <div class="col-sm-8">
                                
                              </div>
                              <!-- <div class="col-md-1" align="right" align="right">
                                <a href="{{route('homestay.detail',$rr->id)}}" "><button class="btn btn-primary">Detail</button></a>
                              </div> -->
                            </div>
                  </div>

                </div>
              </div>
            </span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="height:220px">
              <span class="border border-primary" style="height:220px;">
              <div class="card-body">
                <h4 class="card-title">Fasilitas : </h4>
                <?php $tt=DB::SELECT("SELECT * FROM fasilitas where id_homestay=$rr->id"); ?>
                @foreach($tt as $t)   
                  <h3 class="card-text"><li>{{$t->nama}}</li></h3>
               @endforeach
               <br>
                <h2 style="color:#e67e22;"><img style="width:25px;" src="/del.png">&nbsp;&nbsp;&nbsp;Rp.{{$rr->harga}},00</h2><br>  
                <h5><img src="/point.png" alt="" style="width:25px;">&nbsp;&nbsp;&nbsp;{{$rr->poin}}</h5>
              </div>
            </span>
            </div>
          </div>
          <div class="col-md-2">  
          </div>
        </div>
       
       <?php  

     }
        ?>
      
      </div>
    </div>

     
    

@section('content')
@endsection
