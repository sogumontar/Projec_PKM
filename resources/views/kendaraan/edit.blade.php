@extends('layouts.owner')
@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
</div>
<br>
<div class="container">
    <h2 align="center">Update Data Kendaraan</h2><br><br>
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8 col-offset-2">
                <form action="{{route('kendaraan.update',$kendaraan->id)}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-control" name="jenis_kendaraan" >
                            
                            <option value="{{$kendaraan->jenis_kendaraan}}">{{$kendaraan->jenis_kendaraan}}</option>
                            @if($kendaraan->jenis_kendaraan=='Mobil')
                                <option value="Motor">Motor</option>
                                <option value="Sepeda">Sepeda</option>
                            
                            @elseif($kendaraan->jenis_kendaraan='Motor')
                                <option value="Sepeda">Sepeda</option>
                                <option value="Motor">Motor</option>
                            @else
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                            @endif
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Merk Kendaraan</label>
                        <input type="text" class="form-control" name="Merk_kendaraan" value="{{$kendaraan->Merk_kendaraan}}">
                    </div>
                    <div class="form-group">
                        <label>Plat Nomor</label>
                        <input type="text" class="form-control" name="plat_nomor" value="{{$kendaraan->plat_nomor}}">
                    </div>
                      <div class="form-group">
                        <label>Harga Kendaraan</label>
                        <input type="text" class="form-control" name="harga" value="{{$kendaraan->harga}}">
                    </div>

                    <div class="form-group">
                        <label>Gambar Homestay</label>
                        <center><a href="/kendaraan/{{$kendaraan->gambar}}"><img class="card" style="width: 300px; height: 250px;"  src="/kendaraan/{{$kendaraan->gambar}}"></a></center><br>
                        <input type="file" class="form-control" name="gambar" id="gambar" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>