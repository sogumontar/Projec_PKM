@extends('layouts.template')
@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<br>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                 
                    <div class="form-group">
                        <label>Id Member</label>
                        <input type="text" class="form-control" name="id_member" value="{{$record->id_member}}">
                    </div>
                    <div class="form-group">
                        <label>Id Homestay</label>
                        <input type="text" class="form-control" name="id_homestay" value="{{$record->id_homestay}}">
                    </div>
                    <div class="form-group">
                        <label>date</label>
                        <input type="text" class="form-control" name="date" value="{{$record->date}}">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kamar</label>
                        <input type="text" class="form-control" name="jumlah_kamar" value="{{$record->jumlah_kamar}}">
                    </div>
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" value="{{$record->status}}">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Pengunjung</label>
                        <input type="text" class="form-control" name="jumlah_pengunjung" value="{{$record->jumlah_pengunjung}}">
                    </div>

                    <div class="form-group">
                        <label>Nomor Kamar</label>
                        <input type="text" class="form-control" name="nomor_kamar" value="{{$record->nomor_kamar}}">
                    </div>
            @if($record->status=='pending')
                <form action="{{route('accept',$record->id)}}"  method="post">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}     
                   <div class="" align="left"> 
                       <input type="submit" class="btn btn-success" name="" value="accept">
                   </div>
                
                </form>
                 <form action="{{route('booking.reject',$record->id)}}"  method="post">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}     
                   <div align="right">
                       <input type="submit" class="btn btn-danger" name="" value="reject">
                   </div>
            
                </form> 
                @else
                    <div class="">
                        <a href=""><button class="btn btn-primary" disabled="">{{$record->status}}</button></a>
                    </div>

            @endif
                
            </div>
        </div>
    </div>