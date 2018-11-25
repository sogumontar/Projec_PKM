@extends('layouts.template')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <form action="{{ route('homestay.update',$homestay->id) }}"  method="post">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label>Nomor Kamar Homestay</label>
                        <input type="text" class="form-control" name="nomor_kamar" value="{{$homestay->nomor_kamar}}">
                    </div>
                    <div class="form-group">
                        <label>Id Pemilik Homestay</label>
                        <input type="text" class="form-control" name="id_pemilik" value="{{$homestay->id_pemilik}}">
                    </div>
                    <div class="form-group">
                        <label>Harga Homestay</label>
                        <input type="text" class="form-control" name="harga" value="{{$homestay->harga}}">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Homestay</label>
                        <input type="text" class="form-control" name="keterangan" value="{{$homestay->keterangan}}">
                    </div>
                      <div class="form-group">
                        <label>Nama Homestay</label>
                        <input type="text" class="form-control" name="nama" value="{{$homestay->nama}}">
                    </div>

                    <div class="form-group">
                        <label>Gambar Homestay</label>
                        <input type="text" class="form-control" name="gambar" value="{{$homestay->gambar}}">
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>