@extends('layouts.template')
@foreach($homestay as $homestays)
             <div class="container">  
                        <br>
                    	<input class="form-control" type="" name="" value="{{ $homestays->nomor_kamar}}">
                    
                    	<br>
                    <input type="text" name="" value="{{ $homestays->id_pemilik}}" class="form-control">
                    <br>
                    <input type="text" name="" value="{{ $homestays->harga}}" class="form-control">
                    <br>
                    <input type="textarea" name="" value="{{ $homestays->keterangan}}" class="form-control">
                    <br>
                    <input type="" name="" value="{{ $homestays->nama}}" class="form-control">
                    <br>
                    <input type="" name="" value="{{ $homestays->gambar}}" class="form-control">
                    <br>
                    <a  href="{{route('homestay.edit',$homestays->id)}}" class="btn btn-primary"><button class="btn btn-primary">Updates</button></a>
                    <br>	
                    <form action="{{route('homestay.delete',$homestays->id)}}">
                    	<br>
                    	<input type="submit" value="delete" class="btn btn-danger" name="">
                    </form>

                    
                </div>
                    <!-- <a href=""><button class="btn btn-danger">delete</button></a> -->
                 @endforeach