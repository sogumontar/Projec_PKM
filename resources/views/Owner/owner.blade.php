@include('layouts.alerts')
    @extends('layouts.owner')
    
    <link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<div class="container">
    <hr>
    <div class="d-flex flex-row bg-light">
     <!--  <div class="p-2 bg-light">Data Diri
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
      </div> -->
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
                        <table class="table table-hover ">
                            <thead>
                                <tr class="filters">
                                    <th><p align="center">Nama Homestay</p></th>
                                    <th><p align="center">Harga</p></th> 
                                    <th><p align="center">Tgl Pemesanan</p></th>
                                    <th><p align="center">Jumlah Kamar</p></th>
                                    <th><p align="center">Jumlah Pengunjung</p></th>
                                    <th><p align="center">Status</p></th>
                                                                  

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                 @foreach($db as $a)
                                <div>
                                  <tr>
                                    <td align="center">{{$a->nama}}</td>

                                    <td align="center">{{$a->harga}}</td>
                                    <td align="center">{{$a->date}}</td>
                                    <td align="center">{{$a->jumlah_kamar}}</td>
                                    <td align="center">{{$a->jumlah_pengunjung}}</td>
                                    <td align="center">
                                    @if($a->status=='expired')
                                      <p style="color: #dbdbdb">{{$a->status}}</p>
                                    @elseif($a->status=='accepted')
                                     <p style="color: green">{{$a->status}}</p>
                                     @else
                                     <p style="color: blue">{{$a->status}}</p>
                                    @endif

                                  </td>
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
                        <table class="table table-hover ">
                            <thead>
                                <tr class="filters">
                                    <th align="center"><p align="center">Jenis Kendaraan</p></th> 
                                    <th align="center"><p align="center">Merk Kendaraan</p></th>
                                    <th align="center"><p align="center">Plat Nomor</p></th>
                                    <th align="center"><p align="center">Harga</p></th>
                                    <th align="center"><p align="center">Date</p></th>
                                    <th align="center"><p align="center">Lama Pemesanan</p></th>
                                    <th align="center"><p align="center">Status</p></th>
                                    

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                 @foreach($dbb as $aa)
                                <div>
                                  <tr>
                                    <td align="center">{{$aa->jenis_kendaraan }}</td>

                                    <td align="center">{{$aa->Merk_kendaraan}}</td>
                                     <td align="center">{{$aa->plat_nomor}}</td>
                                     <td align="center">{{$aa->harga}}</td>
                                     <td align="center">{{$aa->date}}</td>
                                     <td align="center">{{$aa->lama_pemesanan}}</td>
                                     <td align="center">
                                    @if($aa->status=='expired')
                                      <p style="color: #dbdbdb">{{$aa->status}}</p>
                                    @elseif($aa->status=='accepted')
                                     <p style="color: green">{{$aa->status}}</p>
                                     @else
                                     <p style="color: blue">{{$aa->status}}</p>
                                    @endif

                                  </td>
                                   
                                     
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
