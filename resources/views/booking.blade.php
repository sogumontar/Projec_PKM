<br><br>@include('layouts.alerts')
@extends('layouts.template')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
</div>
<br>

<br><br>
<div class="panel panel-primary filterable container">
    <?php 
        $idd=Auth::user()->id;
    $a=DB::SELECT("SELECT * FROM pemilik_homestay_kendaraan where status='pending' AND id_akun=$idd");?>

            @if($a)
                <table class="table table-hover table-bordered ">
                            <thead style="background-color: #dbdbdb">
                                <tr class="filters">
                                    <th><p>Nama</p></th>
                                    <th><p>Alamat</p></th>
                                    <th><p>Tanggal Lahir</p></th>
                                    <th><p>Tanggal Request</p></th>
                                    <th><p>Status</p></th>
                                </tr>
                            </thead>
                              
                                <div>
                                  <tr>
                                    <td>{{$a[0]->nama}}</td>
                                     <td>{{$a[0]->alamat}}</td>
                                     <td>{{$a[0]->tanggal_lahir}}</td>
                                     <td>{{$a[0]->created_at}}</td>
                                     <td>{{$a[0]->status}}</td>
                                   
                                  </tr>
                                </div>
                          
                          
                            </table>
            @endif
                        
                        <!-- panel heading starat -->
                        <div class="col-md-12 card"  style="background-color: #dbdbdb">
                            <h7>Bayar Ke:99873211417010(MANDIRI)</h7> 
                            <h7>Atas Nama:Sogumontar Simangunsong</h7><br>  
                            <h7>Bayar Ke:99873211417030(BNI)</h7>
                            <h7>Atas Nama:Gita Nadapdap</h7><br>    
                            <h7>Bayar Ke:99873211417003(MANDIRI)</h7>   
                            <h7>Atas Nama:Kristopel Lumbantoruan</h7><br>   
                            <br>    <br>    
                          
                        </div>
                        <br>
                          <h3 class="panel-title">Daftar Pesanan Homestay </h3><br>
                            <div class="pull-right">
                            
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body" class="row" >
                        <!-- panel content start -->
                           <!-- Table -->
                      <table class="table table-hover table-bordered ">
                            <thead style="background-color: #dbdbdb">
                                <tr class="filters">
                                    <th><p>Tanggal Request</p></th>
                                    <th><p>Waktu Kedatangan</p></th>
                                    <th><p>Nama Homestay</p></th>
                                    <th><p>Jumlah Kamar</p></th>
                                    <th><p>Lama Menginap</p></th>
                                    <th><p>Status</p></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                @foreach($d as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->created_at}}</td>
                                    <td>{{$a->date}}</td>
                                     <td>{{$a->nama}}</td>
                                     <td>{{$a->jumlah_kamar}}</td>
                                        @if($a->lama_menginap)
                                            <td>{{$a->lama_menginap}}  hari</td>
                                        @else
                                            <td>0  hari</td>
                                        @endif
                                     @if($a->status=='pending')
                                     <td><a href="{{route('member.bayar',$a->id)}}"><button class="btn btn-primary">bayar</button></a></td>
                                     @elseif($a->status=='accepted')
                                    <td><a href="{{route('member.resi',$a->id)}}"><button class="btn btn-success">Cek Resi</button></a>
                                     @elseif($a->status=='expired')
                                     <td><a >Expired</a></td>
                                     @else
                                     <td><a >On Process</a></td>
                                     @endif
                                  </tr>
                                </div>
                                @endforeach
                          
                            </table>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>

<div class="panel panel-primary filterable container">
                         <h3 class="panel-title">Daftar Pesanan Kendaraan </h3>
                        <!-- panel heading starat -->
                       <!--  <div class="col-md-8 card"  style="background-color: #eedddd">
                            <h7>Bayar Ke:99873211417010(MANDIRI)</h7> 
                            <h7>Atas Nama:Sogumontar Simangunsong</h7><br>  
                            <h7>Bayar Ke:99873211417030(BNI)</h7>
                            <h7>Atas Nama:Gita Nadapdap</h7><br>    
                            <h7>Bayar Ke:99873211417003(MANDIRI)</h7>   
                            <h7>Atas Nama:Kristopel Lumbantoruan</h7><br>   
                            <br>    <br>    
                          
                        </div> -->

                        <?php
                          $idd=Auth::user()->id;
                         $gg=DB::SELECT("SELECT * FROM record_pemesanan_kendaraan where id_member=$idd") ?>
                         <br> 
                            <div class="pull-right">
                            
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body" class="row" >
                        <!-- panel content start -->
                           <!-- Table -->
                      <table class="table table-hover table-bordered ">
                            <thead style="background-color: #dbdbdb">
                                <tr class="filters">
                                    <th><p>Waktu Peminjaman</p></th>
                                    <th><p>Waktu Pengembaliany</p></th>
                                    <th><p>Lama Peminjaman</p></th>
                                    <th><p>Status</p></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                @foreach($gg as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->date}}</td>
                                    <td>{{$a->date_akhir}}</td>
                                     <td>{{$a->lama_pemesanan}}</td>
                                     <td>{{$a->status}}</td>
                                        
                                     @if($a->status=='process')
                                     <td><a href="{{route('kendaraan.bayar',$a->id)}}"><button class="btn btn-primary">bayar</button></a></td>
                                     @elseif($a->status=='accept')
                                    <td><a href="{{route('kendaraan.resi',$a->id)}}"><button class="btn btn-success">Cek Resi</button></a>
                                    @elseif($a->status=='reject')
                                    
                                     @elseif($a->status=='expired')
                                     <td><a >Expired</a></td>
                                     @else
                                     <td><a>On Process</a></td>
                                     @endif
                                  </tr>
                                </div>
                                @endforeach
                          
                            </table>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>


