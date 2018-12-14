<br><br>@include('layouts.alerts')
<?php 
  $iod=Auth::user()->id;
  $hendra=DB::SELECT("SELECT * FROM notifikasi where id_penerima=$iod");
?>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
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
  <div class="row content">
    <div class="col-sm-3 sidenav fixed-side">
     
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li class=""><a href="{{route('admin.akun')}}">Akun</a></li>
        <li><a href="{{route('admin.homestay')}}">Homestay</a></li>
        <li><a href="{{route('admin.kendaraan')}}">Kendaraan</a></li>
        <li><a href="{{route('admin.objekWisata')}}">Objek Wisata</a></li>
        <li><a href="{{route('admin.request')}}">Request</a></li>
        <li class="">   <form id="logout-form" action="{{ route('logout') }}" method="POST">
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

      <div class="panel panel-primary filterable">
                        
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Objek Wisata</h3>
                            <div class="pull-right">
                            
                        </div>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <div class="col-md-8 col-offset-2">
                <form action="{{route('objekWisata.update',$dd->id)}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label>Nama</label>
                       <input type="text" value="{{$dd->nama}}" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="6" name="keterangan">{{$dd->keterangan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" value="{{$dd->lokasi}}">
                    </div>

                    <div class="form-group">
                        <label>Gambar Homestay</label>
                        <center><a href="/objewisata/{{$dd->gambar}}"><img class="card" style="width: 300px; height: 250px;"  src="/objekwisata/{{$dd->gambar}}"></a></center><br>
                        <input type="file" class="form-control" name="gambar" id="gambar" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="save"> 
                    </div>
                </form>
                
            </div>

                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>

<style type="text/css">                    

</style>
                           
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
