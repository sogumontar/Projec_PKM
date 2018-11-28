@extends('layouts.template')
<br>
<div class="container">
        <div class="row">
            <div class="col-md-5 col-offset-2">
                <form action="{{ route('homestay.booking.process',$homestay->id) }}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card">
                        <img src="/uploadgambar/{{$homestay->gambar}}">
                    </div>
                    <div class="form-group"><br>
                        <input type="number" class="form-control" name="id" value="{{$homestay->nomor_kamar}}">
                    </div>
                    <div class="form-group"><br>
                        <input type="number" class="form-control" name="id_home" value="" placeholder="Id Homestay">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="" placeholder="date">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kamar</label>
                        <input type="number" class="form-control" name="jumlah" value="" placeholder="Jumlah Kamar">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pengunjung</label>
                        <input type="number" class="form-control" name="jumlah_pengunjung" value="" placeholder="jumlah Pengunjung">
                    </div>
                    <div class="form-group"><br>
                        <input type="number" class="form-control" name="nomor_kamar" value="" placeholder="Nomor Kamar">
                    </div>
                    
                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>