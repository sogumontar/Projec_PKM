
<br><br>
@extends('layouts.template')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">

<br>
<br>
@include('layouts.alerts')
	<div class="container"><br>
		 <form action="{{route('reg')}}" method="post">
                            <label>Nama:</label>
                            <input class="form-control" type="text" name="nama"  id="nama" required="">
                            <label>Alamat:</label>
                            <input class="form-control" type="text" name="alamat"  id="alamat" required="">
                            <label>Nomor Telepon:</label>
                            <input class="form-control" type="text" name="notelp"  id="notelp" required="">
                            <label>Email</label>
                            <input class="form-control" type="email" name="mail"  id="nama" required="">
                            <label>Password:</label>
                            <input class="form-control" type="password" name="password"  required="">
                            <label>Confirm Password:</label>
                            <input class="form-control" type="password" name="confirmpassword"  required="" id="password"><br>
                            <div class="row"> 
                             <div class="col-md-1" align="left">
                              <input type="submit" class="btn btn-danger" name="" value="cancel" align="right">
                           </div>
                           <div class="col-md-11" align="right">
                              <input type="submit" class="btn btn-info" name="" value="save" align="right">
                           </div>
                        </div>
                        <input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
                     </form>
	</div>
