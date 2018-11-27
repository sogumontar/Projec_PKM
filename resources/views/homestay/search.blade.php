@extends('layouts.template')
<div class="container">  
                        


  <div class="container">
        <hr>
        <h5 style="text-align:center;">Daftar Homestay </h5>
          <hr>
          <div class="row">

          @foreach($homestay as $homestays)
            <div class="col-lg-4">
              <div class="card-body">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <img class="card-img-top" src="3.jpg" alt="Card image cap">
                    <p>{{$homestays->keterangan}}</p>
                  </div>
                 
                </div>
              </div>
            </div>
          @endforeach
          </div>
  </div>
</div>          	
                 
                 