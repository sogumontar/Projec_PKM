<br><br>@if(Auth::user()->role='owner')
    @extends('layouts.owner')
@endif
@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<br>
<h2 align="center">Tambahkan promo pada homestay ini</h2><br><br>
<?php $del =DB::SELECT("SELECT * FROM homestay where id=$id");?>
<div class="container">
        <div class="row" align="left">
            <div class="col-md-2">
                    
            </div>

            <div class="col-md-8 col-offset-2">
                <form action="{{route('homestay.promoProcess',$id)}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nama Promo</label>
                        <input type="text" class="form-control" name="nama" value="">
                    </div>
                    <div class="form-group">
                        <label>Tanggal mulai promo</label>
                        <input type="date" class="form-control" name="mulai">
                    </div>
                    <div class="form-group">
                        <label>Tanggal berakhir promo</label>
                        <input type="date" class="form-control" name="selesai" >
                    </div>
                     <div class="form-group">
                        <label>Potongan harga</label>
                        <input type="number" min="0" max="{{$del[0]->harga}}" class="form-control" name="harga" >
                    </div>
                    <div class="form-group">
                        <label>Keterangan Promo</label>
                        <textarea class="form-control" name="keterangan" ></textarea>
                    </div>
                     

                   
                    <div class="form-group" align="right"   >
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>
        </div>
    </div>