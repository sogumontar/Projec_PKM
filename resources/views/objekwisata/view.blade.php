<br><br>@include('layouts.alerts')
@extends('layouts.template')
@section('content')


<div class="container">
      <hr>
      <h5 style="text-align:center;">List ObjekWisata</h5>
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

        @foreach($test as $s)
        
                 <div class="col-lg-4">
                 
                   <div class="form-group">

                     <div class="" style="width: 20rem;">
                       <div class="card-body" >
                         <a href="{{route('objekWisata.detail',$s->id)}}" class="">
                          <p>{{$s->nama}}</p>
                          <hr>
                         <img class="card-img-top" style="width: 300px; height: 200px;" src="/objekwisata/{{$s->gambar}}" alt="Card image cap">
                         </a>
                        
                        
                       </div>
                        
                       
                        <div class="row">
                        <div class="col-lg-1">
                          
                        </div>
                          <div class="col-lg-7">
                            
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
    </div>