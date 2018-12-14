<br><br>@extends('layouts.template')
@include('layouts.alerts') 
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
             <div class="container">  
                        


<div class="container">
      <hr>
      <h5 style="text-align:center;">List Kendaraan</h5>
      <hr>
        <!-- Example row of columns -->
        <div class="form-group">
        </div>
      
        <div class="row">

        <?php 
        $p= DB::select('select id from homestay ');
        ?>

        @if($p)
        <br>

        @foreach($kendaraan as $s)
        <br>
                 <div class="col-lg-4">
                 
                   <div class="form-group">

                     <div class="" style="width: 20rem;">
                       <div class="card-body" >
                         <hr>
                          <p>{{$s->jenis_kendaraan}}</p>
                          <hr>
                         <img class="card-img-top" style="width: 300px; height: 200px;" src="/kendaraan/{{$s->gambar}}" alt="Card image cap">
                         
                        
                        
                          <p><?php echo $s->keterangan?></p>
                       </div>
                          <hr>
                          <p>{{$s->Merk_kendaraan}}</p>
                          <p>{{$s->plat_nomor}}</p>
                          <hr>
                          <p>Harga/Hari:{{$s->harga}}</p>
                       
                        <div class="row">
                        <div class="col-lg-1">
                          
                        </div>
                          <div class="col-lg-7">
                            
                          </div>
                        
                           <div class="col-lg-3" align="right">
                          <a href="{{route('kendaraan.booking',$s->id)}}"><button class="btn btn-primary" >Booking</button></a>
                        
                        </div>
                      </div>
                       <div class="row">
                          <div class="col-lg-1">
                         
                          </div>
                        </div>
                      <div class="container">
                   
                       </div>
                     </div>
                   </div>
                 </div>
       
             
       
                           
           @endforeach
           @endif
           @if(!$p)
           <div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Homestay yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
         @endif
      </div>

                      
                 
                    <!-- <a href=""><button class="btn btn-danger">delete</button></a> -->
                 