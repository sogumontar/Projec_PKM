@extends('layouts.template')
@section('content')
             <div class="container">  
                        


<div class="container">
      <hr>
      <h5 style="text-align:center;">Daftar Homestay </h5>
      <hr>
        <!-- Example row of columns -->
        <div class="form-group">
        </div>
        <div>
            <a href="{{route('homestay.search')}}">sort Desc</a>
        </div>

        <div class="row">


        @foreach($homestay as $homestays)
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
                  <img class="card-img-top" src="/uploadgambar/{{$homestays->gambar}}" alt="Card image cap">
                  <hr>
                  <p>{{$homestays->keterangan}}</p>
                  <hr>
                  @if(Route::has('log'))
                      <p>test</p>
                  @endif
                  @if(!Route::has('loga'))
                      <p>set</p>
                  @endif
                </div>
                
                <div class="col-lg-3"><a href="{{route('homestay.booking',$homestays->id)}}" class="btn btn-primary">Booking</a>
               </div>
               <div class="container">
                <div class="col-lg-3">
                 <a href="{{route('homestay.update',$homestays->id)}}" class="btn btn-primary">Update</a>
                  
                </div>
                <div class="col-lg-1">
                     <form method="post" action="{{route('homestay.destroy',$homestays->id)}}">
                         {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger"  value="delete">
                   </form>
                 </div>

                </div>
              </div>
            </div>
          </div>

      

                    
    @endforeach
      </div>

                    	
                 
                    <!-- <a href=""><button class="btn btn-danger">delete</button></a> -->
                 