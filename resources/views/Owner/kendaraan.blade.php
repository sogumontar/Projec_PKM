<br><br>@if(Auth::user()->role=='member')
  <?php return redirect()->route('welcome') ?>
@elseif(Auth::user()->role=='admin')
  <?php return redirect()->route('admin.homestay')?>
@else
    @extends('layouts.owner')
@endif
@include('layouts.alerts')

<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">

<br><br><br><br>
<div class="container">
      <div class="panel panel-primary filterable">
                        
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Kendaraan</h3>
                            <div class="pull-right">
                            
                        </div>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><p>Jenis Kendaraan</p></th>
                                    <th><p>Merk Kendaraan</p></th> 
                                    <th><p>Plat Nomor</p></th>
                                    <th><p>Harga</p></th>
                                    <th></th>
                                    <th></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                 @foreach($config as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->jenis_kendaraan }}</td>
                                     <td>{{$a->Merk_kendaraan}}</td>
                                     <td>{{$a->plat_nomor}}</td>
                                     <td>{{$a->harga}}</td>
                                     <td> <a href="{{route('kendaraan.edit',$a->id)}}" class="btn btn-primary">Ubah</a></td>
                                     <td> <form method="post" action="{{route('kendaraan.destroy',$a->id)}}">
                                {{csrf_field()}}
                               {{ method_field('DELETE') }}
                               <input type="submit" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus kendaraan ini?')" value="Hapus">
                          </form></td>
                                  </tr>
                                </div>
                                @endforeach
                          
                            </table>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>

                    <div class="panel panel-primary filterable">
                        
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Kendaraan</h3>
                            <div class="pull-right">
                            
                        </div>
                        </div>
                        <!-- panel heading end -->
                          <div class="jumbotron">
  <form action="{{route('kendaraan.store')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <div>
          {{ csrf_field() }}

          <label>Jenis Kendaraan</label>
          <select name="jenis" id="jenis" class="form-control" >

            <option value="mobil">Mobil</option>
            <option value="mobil">Motor</option>
          </select><br>
          <label>Merk Kendaraan</label>
          <input type="text" class="form-control" placeholder="Merk Kendaraan" name="merk" id="merk"><br>
          <!-- <input type="text" class="form-control" placeholder="id_pemilik" name="id" id="id"><br> -->

          <label>Plat Nomor Kendaraan</label>
          <input type="text" class="form-control" placeholder="Plat Nomor Kendaraan" name="plat" id="plat"><br>

          <label>Harga Kendaraan</label>
          <input type="text" class="form-control" placeholder="Harga" name="harga" id="harga"><br>
          <input type="file" class="form-control" placeholder="Harga" name="gambar" id="gambar"><br>
          <input type="submit" class="btn btn-primary" name="" value="Simpan">
        </div>      
    </div>
  </form>
</div>
</div>
</div>

                       
<div class="col-sm-2"><br>
    </div>



