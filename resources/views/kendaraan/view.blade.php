@extends('layouts.template')
             <div class="container">  
                        


<div class="container">
      <hr>
      <h5 style="text-align:center;">Daftar Kendaraan </h5>
      <hr>
        <!-- Example row of columns -->
        <div class="form-group">
        </div>
        <div>
       
        <div class="row">

  <?php 
        $p= DB::select('select id from kendaraan ');
        ?>
        @if($p)
             <a href="">sort Desc</a>
        </div>

        @foreach($kendaraan as $kendaraan)
          <div class="col-lg-4">
            <style type="text/css">
                            img {
                                border: 3px solid ;
                                width: 550px;
                                height: 250px;
                            }
                        </style>
            <div class="form-group">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <img class="card-img-top" src="/kendaraan/{{$kendaraan->gambar}}" alt="Card image cap">
                  <hr>
                  <p>{{$kendaraan->plat_nomor}}</p>
                  <hr>
                </div>
                @if(AUTH::user())
                  <div class="col-lg-3"><a href="{{route('kendaraan.booking',$kendaraan->id)}}" class="btn btn-primary">Booking</a>
                      </div>
                @else 
                <div class="col-lg-3" ><a href=""><button class="btn btn-primary" disabled="">Booking</button></a>
                      </div>
                @endif
                
                
              <!--   <div class="col-lg-3">
                  <a href="{{route('kendaraan.edit',$kendaraan->id)}}" class="btn btn-primary">Edit</a>
                  
               </div>
               <div class="">
                  <h5 class="card-header"> <a href="" class="btn btn-primary">Delete</a>
                     <form method="post" action="">
                         {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger"  value="delete">
                   </form></h5>

                </div> -->
              </div>
            </div>
          </div>

      

                    
    @endforeach
    @endif
    @if(!$p)
     <div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Kendaraan yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
    @endif

      </div>

                    	
                 
                    <!-- <a href=""><button class="btn btn-danger">delete</button></a> -->
    
