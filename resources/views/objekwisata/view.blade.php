<br><br>@include('layouts.alerts')
@extends('layouts.template')
@section('content')

<br><br>
<div class="container">
<div class="container">
      <hr>
      <h3 style="text-align:center;">List ObjekWisata</h3>
      <hr>
      <br><br>
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
                 
                   <div class="form-group card">

                     <div class="container" style="width: 20rem;">
                       <div class="card-body" >
                         
                          <p><b>{{$s->nama}}</b></p>
                         
                          <hr>
                         <a href="/objekwisata/{{$s->gambar}}"><img class="card-img-top" style="width: 250px; height: 200px;" src="/objekwisata/{{$s->gambar}}" alt="Card image cap"></a>
                         <br><br>
                         <hr>
                         <?php $kalimat1=$s->keterangan;
                           $jumlahkarakter1=100;
                           $cetak1 = substr($kalimat1, 0, $jumlahkarakter1);

                         ?>
                         <p align="justify"><?php echo $cetak1 ?>&nbsp;&nbsp;&nbsp;...</p>
                         <hr>
                         <div class="row">
                            <div class="col-md-2">
                              <img src="/Location.png" style="width: 30px">
                            </div>
                            <div class="col-md-7">
                              <p>{{$s->lokasi}}</p>
                            </div>
                            <div class="col-md-2">
                              <a href="{{route('objekWisata.detail',$s->id)}}"><button class="btn " style="background-color:#FFA500;  color: #ffffff;">Detail</button></a>
                            </div>
                            <div class="col-md-1">
                              
                            </div>
                          </div>
                        
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
           <br>
           <div class="col-md-12" align="center">
             {!! $test->render() !!}
           </div>
           @endif
           @if(!$p)
           <div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Homestay yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
         @endif
      </div>
    </div>
  </div>
