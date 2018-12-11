@include('layouts.alerts')
@extends('layouts.template')

<div  style="background: url('/interior-design-ideas-bedroom-wallpaper-bedroom-wallpaper-ideas-with-added-design-bedroom-and-captivating-to-various-settings-layout-of-the-room-bedroom-captivating-2-interior-design-bedroom-wallpaper.jpg')">
    <br><br><br>
<div class="container">
    
<font color="#000000" >
        <div class="row">
                <div class="col-md-2 col-offset-2">
                </div>
            <div class="col-md-8 col-offset-2">
               
                <form action="{{ route('kendaraan.booking.process',$kendaraan->id) }}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="">
                        <div class="" align="center">
                            <img class="card" style="width: 450px; height: 250px;" src="{{$kendaraan->gambar}}">
                        </div>
                        
                        
                        <div class="">
                            <label><b>Date</b></label>
                            <input type="date" class="form-control" name="date" value="" placeholder="date" accept="center">
                        </div>
                        <div class="form-group">
                            <label><b>Lama pemesanan</b></label>
                            <input type="number" class="form-control" name="lama" value="" placeholder="Lama pemesanan">
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                   
                   </div>
                
            </div>
             <div class="col-md-2 col-offset-2">
                </div>
        </div>
    </font>
    </div>
</div>