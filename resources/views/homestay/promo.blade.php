<br><br>@if(Auth::user()->role='owner')
    @extends('layouts.owner')
@endif
@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<br>
<font face="segoe ui"><h2 align="center">Tambahkan promo pada homestay ini</h2><br><br></font>
<?php $del =DB::SELECT("SELECT * FROM homestay where id=$id");?>
<div class="container">
        <div class="row" align="left">
            <div class="col-md-2">
                    
            </div>

            <div class="col-md-8 col-offset-2">
                <form action="{{route('homestay.promoProcess',$id)}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <font face="segoe ui"><p>Nama Promo</p>
                        <input type="text" class="form-control" name="nama" value="">
                    </div>
                    <div class="form-group">
                        <p>Tanggal mulai promo</p>
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
                        <textarea class="ckeditor" name="keterangan" ></textarea>
                    </div>
                     

                   
                    <div class="form-group" align="right"   >
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                </font>
            </div>
        </div>
    </div>