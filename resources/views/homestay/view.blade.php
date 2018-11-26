@extends('layouts.template')
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
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <img class="card-img-top" src="/uploadgambar/{{$homestays->gambar}}" alt="Card image cap">
                  <p>{{$homestays->keterangan}}</p>
                </div>
                <div class="col-md-3">
                  <h5 class="card-header"> <a href="{{route('homestay.update',$homestays->id)}}" class="btn btn-primary">Update</a></h5>
                </div>
                <div class="col-lg-3">
                  <form method="post" action="{{route('homestay.destroy',$homestays->id)}}">
                         {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger"  value="delete">
                   </form>
               </div>
              </div>
            </div>
          </div>

      

                    
    @endforeach
      </div>

                    	
                 
                    <!-- <a href=""><button class="btn btn-danger">delete</button></a> -->
                 