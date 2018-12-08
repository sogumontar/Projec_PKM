@extends('layouts.template')
@include('layouts.alerts')
@section('content')
             <div class="container">  
                        


<div class="container">
      <hr>
      <h5 style="text-align:center;">List Homestay </h5>
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

        @foreach($homestay as $homestays)
        <br>
                 <div class="col-lg-4">
                 
                   <div class="form-group">

                     <div class="" style="width: 18rem;">
                       <div class="card-body" >
                         <img class="card-img-top" style="width: 300px; height: 200px;" src="/uploadgambar/{{$homestays->gambar}}" alt="Card image cap">
                         
                        
                         <hr>
                          <p>{{$homestays->nama}}</p>
                          <hr>
                          <p><?php echo $homestays->keterangan?></p>
                       </div>

                       @if(Auth::user())
                        <div class="row">
                        <div class="col-lg-1">
                          
                        </div>
                         <div class="col-lg-3" align="left">
                          <a href="{{route('homestay.booking',$homestays->id)}}"><button class="btn btn-primary" >Booking</button></a>
                        </div>
                        <div class="col-lg-7" align="right">
                          <a href=""><button class="btn btn-primary" >Detail..</button></a>
                        </div>
                      </div>
                      @else
                      <div class="row">
                        <div class="col-sm-1">
                          
                        </div>
                        <div align="left" class="col-sm-1"><a href="{{route('homestay.booking',$homestays->id)}}"><button class="btn btn-primary" disabled="">Booking</button></a>
                          
                        </div>
                        <div class="col-lg-9" align="right">
                          <a href=""><button class="btn btn-primary">Detail..</button></a>
                        </div>
                      </div>
                       @endif
                      <div class="container">
                    <!--    <div class="col-lg-3">
                        <a href="{{route('homestay.update',$homestays->id)}}" class="btn btn-primary">Update</a>
                         
                       </div>
                       <div class="col-lg-1">
                            <form method="post" action="{{route('homestay.destroy',$homestays->id)}}">
                                {{csrf_field()}}
                               {{ method_field('DELETE') }}
                               <input type="submit" class="btn btn-danger"  value="delete">
                          </form>
                        </div> -->
       
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
                 