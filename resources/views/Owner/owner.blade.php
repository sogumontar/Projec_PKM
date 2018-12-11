@include('layouts.alerts')
    @extends('layouts.owner')
<div class="container">
    <hr>
    <div class="d-flex flex-row bg-light">
      <div class="p-2 bg-light">Data Diri
      </div>
      <div class="p-2 bg-light">Akomodasi
      </div>
      <div class="p-2 bg-Light">Lokasi
      </div>
      <div class="p-2 bg-light">Services
      </div>
      <div class="p-2 bg-light">Kamar
      </div>
      <div class="p-2 bg-Light">Foto
      </div>
      <div class="p-2 bg-Light">Cantumkan Judul
      </div>
    </div>
    <hr>
            <div class="panel panel-primary filterable">
                        
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">List Pesanan Homestay</h3>
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
                                    <th><p>Nama Homestay</p></th>
                                    <th><p>Harga</p></th> 
                                    <th><p>Tgl Pemesanan</p></th>
                                    <th><p>Jumlah Kamar</p></th>
                                    <th><p>Jumlah Pengunjung</p></th>
                                    <th></th>
                                    <th></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                 @foreach($db as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->nama}}</td>

                                    <td>{{$a->harga}}</td>
                                    <td>{{$a->data}}</td>
                                    <td>{{$a->jumlah_kamar}}</td>
                                    <td>{{$a->jumlah_pengunjung}}</td>
                                    <td>{{$a->status}}</td>
                                     <td><textarea class="form-control" disabled=""><?php echo $a->keterangan ?></textarea></td>
                                     
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
                        <br><br><br>
                        <div class="panel-heading">
                            <h3 class="panel-title">List Pesanan Kendaraan</h3>
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
                                    <th><p>Date</p></th>
                                    <th><p>Lama Pemesanan</p></th>
                                    <th><p>Status</p></th>
                                    <th><p>Deskripsi</p></th>
                                    

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                 @foreach($dbb as $aa)
                                <div>
                                  <tr>
                                    <td>{{$aa->jenis_kendaraan }}</td>

                                    <td>{{$aa->Merk_kendaraan}}</td>
                                     <td>{{$aa->plat_nomor}}</td>
                                     <td>{{$aa->harga}}</td>
                                     <td>{{$aa->date}}</td>
                                     <td>{{$aa->lama_pemesanan}}</td>
                                     <td>{{$aa->status}}</td>
                                     <td><textarea class="form-control" disabled=""></textarea></td>
                                     
                                  </tr>
                                </div>

                                @endforeach
                          
                            </table>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>
</div>
<b><hr></b>
    
    </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <hr>
  </div>

@section('content')
@endsection
