@if(Auth::user()->role=='member')
  <?php return redirect()->route('welcome') ?>
@elseif(Auth::user()->role=='admin')
  <?php return redirect()->route('admin.homestay')?>
@else
    @extends('layouts.owner')
@endif
@include('layouts.alerts')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KingStay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li class=""><a href="{{route('owner.owner')}}">Home</a></li>
        <!-- <li class=""><a href="{{route('admin.akun')}}">Akun</a></li> -->
        <li class=""><a href="{{route('owner.homestay')}}" class="active">Homestay</a></li>
        <li><a href="{{route('owner.kendaraan')}}">Kendaraan</a></li>
        <li><a class="active" href="{{route('owner.booking')}}">List Pesanan</a></li>
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
                            <h3 class="panel-title">List Homestay</h3>
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
                                    <th><p>Tanggal pemesanan</p></th>
                                    <th><p>Hargaa</p></th> 
                                    <th><p>Keterangan</p></th>
                                    <th></th>
                                    <th></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                 @foreach($test as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->date }}</td>

                                    <td>{{$a->jumlah_kamar}}</td>
                                     <td>{{$a->keterangan}}</td>
                                     <td>{{$a->status}}</td>
                                     <td>{{$a->jumlah_pengunjung}}</td>
                                     <td> <a href="{{route('homestay.update',$a->id)}}" class="btn btn-primary">Update</a></td>
                                     <td> <form method="post" action="{{route('homestay.destroy',$a->id)}}">
                                {{csrf_field()}}
                               {{ method_field('DELETE') }}
                               <input type="submit" class="btn btn-danger"  value="delete">
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
                            <h3 class="panel-title">Tambah Homestay</h3>
                            <div class="pull-right">
                            
                        </div>
                        </div>
                        <!-- panel heading end -->

                      <div class="jumbotron">
  <form action="{{route('homestay.store')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <div>
          {{ csrf_field() }}
          <input type="text" class="form-control" placeholder="nama" name="nama" id="nama"><br>
          <input type="text" class="form-control" placeholder="Jumlah Kamar" name="nomor_kamar" id="nomor_kamar"><br>
          <input type="text" class="form-control" placeholder="harga" name="harga" id="harga"><br>
          <textarea class="form-control" placeholder="keterangan" name="keterangan" id="keterangan" rows="5"></textarea><br>
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
