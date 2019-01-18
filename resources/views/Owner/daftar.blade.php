@extends('layouts.template')
@include('layouts.alerts')

<div class=" overlay"  style="">
 <div class="modal-body">
 		<font color="#ffffff">
 		
 			<div class="container"><br><br><br>
 					<center><h2>Daftar Jadi Pemilik Homestay</h2></center>
 					<div class="col-md-2">
 				</font>
 					</div>
 					<center>
 					 <div class="col-md-10">
 					 <font color="black">	
                         <form action="{{route('member.daftarProcess')}}" method="post" enctype="multipart/form-data">
                         		{{ csrf_field() }}
                         	<div align="left">
	                          <label><b>Nama Lengkap:</b></label>
	                          <input class="form-control" type="text" name="nama"  id="nama" required="">
	                        </div>  
	                        <div align="left">
	                          <label><b>Alamat:</b></label>
	                          <input class="form-control" type="text" name="alamat"  id="nama" required="">
	                        </div>  
	                        <div align="left">
	                          <label><b>Nomor Induk Keluarga:</b></label>
	                          <input class="form-control" type="text" name="NIK"  id="notelp" required="">
	                        </div>

	                        <div align="left">
	                          <label><b>Tanggal Lahir:</b></label>
	                          <input class="form-control" type="date" name="tanggal_lahir"  id="alamat" required="">
	                        </div>	                        <div align="left">
	                          <label><b>Foto KTP:</b></label><br>
	                          <input class="" type="file" name="foto_ktp"  id="nama" required=""><br>
	                        </div>
	                        <div align="left">
	                          <label><b>Foto Diri:</b></label><br>
	                          <input class="" type="file" name="foto_diri"  id="nama" required=""><br>
	                        </div><br>
	                        <div align="left">
	                          <div class="row"> 
	                            <div class="col-md-1" align="left">
	                              <a href="" class="btn btn-danger">Cancel</a>
	                            </div>
	                            <div class="col-md-11" align="right">
	                              <input type="submit" class="btn btn-info" name="" value="save" align="right">
	                            </div>
	                          </div>
	                          <input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
	                      	</font>
                     	 </form>
                     </div>
                     </center>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Send message</button> -->
                    </div>
                </div>
	</div>
</div>