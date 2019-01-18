@extends('layouts.template')
@include('layouts.alerts') 
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
  <div style=" background-size: cover;">
</div>
             <div class="container">  
                        


<div class="container">

      <hr>
      <h3 style="text-align:center;">List Kendaraan</h3>
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
  <div class="row">
    <div class="col-sm-12">
      <h2>Daftar Kendaraan </h2>
      <hr>
      <a href="#" style="color:#000; text-decoration:none;"></a>
<?php 
    $s=0;
    ?>
      @foreach($kendaraan as $rr)
      <?php $s++;?>
      <div class="row">
        <div class="col-md-1">
        </div>
          <div class="col-md-6" >
            <div class="card" style="width:760px;height:220px;">
              <span class="border border-primary" style="height:220px">
              <div class="card-body">
                <?php 
                   $hasil_rupiah = "Rp " . number_format($rr->harga,2,',','.');

                ?>
                <div class="col-md-2">

                <a href="/kendaraan/{{$rr->gambar}}"><img src="/kendaraan/{{$rr->gambar}}" alt="" class="card"  style="width:200px; height: 150px; float:left;"></a>
                </div>
                <div style="float: left;" class="col-md-7">
                <h1 style="color:#353b48"></h1>
                  <p><b>{{$rr->jenis_kendaraan}}</b></p> 
                  <p>Merk : <?php echo $rr->Merk_kendaraan ?></p>
                  
                <div class="row">
                          <div class="col-lg-9">
                        

                        </div>
                        <div class="col-md-1">
                          
                        </div>
                         <div class="col-md-12">
                        

                              <div class="col-md-1" align="left">
                                <a href="{{route('kendaraan.booking',$rr->id)}}" float="left"><button class="btn btn-primary">Pesan</button></a>
                              
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
                <h4 class="card-title">Harga : </h4>
                
               <br>
                <h5 style="color:#e67e22;"><img style="width:25px;" src="/del.png">&nbsp;&nbsp;&nbsp;{{$hasil_rupiah}}/hari</h5><br>  
                
              </div>
            </span>
            </div>
          </div>
          <div class="col-md-2">  
          </div>
        </div>
        <br>
      @endforeach

      @if($s==0)
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      @endif
      <br>
      
      </div>
    </div>

           <div class="col-md-12" align="center"> 
             {!! $kendaraan->render() !!}
           </div>
           @endif
           @if(!$p)
           <div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Kendaraan yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
         @endif
      </div>
               
               </div>
               </div>       
                 
                    <!-- <a href=""><button class="btn btn-danger">delete</button></a> -->
                 @include('layouts.footer')