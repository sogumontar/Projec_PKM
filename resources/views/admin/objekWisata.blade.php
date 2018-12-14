<br><br>@include('layouts.alerts')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KingStay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content fixed-top">
    <div class="col-sm-3 sidenav fixed-top">
      <br>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li class=""><a href="{{route('admin.akun')}}">Akun</a></li>
        <li><a href="{{route('admin.homestay')}}">Homestay</a></li>
        <li><a href="{{route('admin.kendaraan')}}">Kendaraan</a></li>
        <li><a href="{{route('admin.objekWisata')}}">Objek Wisata</a></li>
        <li><a href="{{route('admin.request')}}">Request</a></li>
        <li class="">  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" class="form-control" value="Logout" name="" onclick="return confirm('Anda ingin keluar?')">
                                    </form>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9"><br>

<br><br><br><br>
      <div class="panel panel-primary filterable">
                        
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Akun</h3>
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
                                    <th><p>Nama Objek Wisata</p></th>
                                    <th><p>Keterangan</p></th>
                                    <th><p>Lokasi</p></th>
                                    <th><p>Kecamatan</p></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                @foreach($objekWisata as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->nama }}</td>
                                     <td>{{$a->keterangan}}</td>
                                     <td>{{$a->lokasi}}</td>
                                     <td>{{$a->daerah}}</td>
                                     <td><a href="{{route('edit_obj',$a->id)}}" ><button class="btn btn-primary">Ubah</button></a></td>
                                     <td> <form method="post" action="{{route('admin.destroy',$a->id)}}">
                                {{csrf_field()}}
                               {{ method_field('DELETE') }}
                               <input type="submit" onclick="return confirm('Anda ingin menghapus objekWisata ini?')" class="btn btn-danger"  value="Hapus">
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
                            <h3 class="panel-title">Tambah Objek Wisata</h3>
                          
                        </div>
                        <!-- panel heading end -->

                      <div class="jumbotron">
						  <form action="{{route('objekWisata.store')}}" method="post" enctype="multipart/form-data">
						    <div class="form-group">
						        <div>
						          {{ csrf_field() }}
						          <input type="text" class="form-control" placeholder="nama" name="nama" id="nama"><br>
						          <textarea type="text" class="form-control" placeholder="Keterangan" name="keterangan" id="keterangan" rows="5"></textarea><br>
                      <input type="text" class="form-control" placeholder="lokasi" name="lokasi" id="lokasi"><br>
                       <select class="form-control" name="kecamatan" id="inlineFormCustomSelectPref">
                        <option selected>Pilih...
                        </option>
                        <option value="Balige">Balige
                        </option>
                        <option value="Ajibata">Ajibata
                        </option>
                        <option value="Bor-bor">Bor-bor
                        </option>
                        <option value="Habinsaran">Habinsaran
                        </option>
                        <option value="Lumban Julu">Lumban Julu
                        </option>
                        <option value="Nassau">Nassau
                        </option>
                        <option value="Pintu Pohan Meranti">Pintu Pohan Meranti
                        </option>
                        <option value="Siantar Narumonda">Siantar Narumonda
                        </option>
                        <option value="Sigumpar">Sigumpar
                        </option>
                        <option value="Silaen">Silaen
                        </option>
                        <option value="Porsea">Porsea
                        </option>
                        <option value="Laguboti">Laguboti
                        </option>
                        <option value="Tampahan">Tampahan
                        </option>
                        <option value="Uluan">Uluan
                        </option>
                    </select><br> 
						          <input type="file" class="form-control" placeholder="gambar" name="gambar" id="gambar"><br>
						          <div align="right">
						            <input type="submit" class="btn btn-primary" align=""  name="">
						          </div>
						        </div>      
						    </div>
						  </form>
					  </div>
					</div>



    				</div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
