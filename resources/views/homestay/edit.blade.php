<br><br>@if(Auth::user()->role='owner')
    @extends('layouts.owner')
@endif
@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<br>
<h2 align="center">Update Data Homestay</h2><br><br>
<div class="container">
        <div class="row" align="left">
            <div class="col-md-2">
                    
            </div>

            <div class="col-md-8 col-offset-2">
                <form action="{{ route('homestay.update',$homestay->id) }}"  method="post" enctype="multipart/form-data">
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
                        <textarea type="text" class="form-control" name="keterangan" ><?php echo $homestay->keterangan ?></textarea>
                    </div>
                      <div class="form-group">
                        <label>Nama Homestay</label>
                        <input type="text" class="form-control" name="nama" value="{{$homestay->nama}}">
                    </div>

                    <div class="form-group">
                        <label>Gambar Homestay</label>
                        <center><a href="/uploadgambar/{{$homestay->gambar}}"><img class="card" style="width: 300px; height: 250px;"  src="/uploadgambar/{{$homestay->gambar}}"></a></center><br>
                        <input type="file" class="form-control" name="gambar" id="gambar" >
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>