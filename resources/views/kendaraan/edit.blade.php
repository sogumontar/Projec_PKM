@extends('layouts.template')
@section('content')
</div>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <form action="{{route('kendaraan.update',$kendaraan->id)}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-control" name="jenis_kendaraan" >
                            <option value="{{$kendaraan->jenis_kendaraan}}">{{$kendaraan->jenis_kendaraan}}</option>
                            @foreach($test as $test)
                            <option >{{$test->jenis_kendaraan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Merk Kendaraan</label>
                        <input type="text" class="form-control" name="Merk_kendaraan" value="{{$kendaraan->Merk_kendaraan}}">
                    </div>
                    <div class="form-group">
                        <label>Id Pemilik</label>
                        <input type="text" class="form-control" name="id_pemilik" value="{{$kendaraan->id_pemilik}}">
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
                        <label>Gambar Kendaraan</label>
                        <input type="file" class="form-control" name="gambar" ">
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    @endsection