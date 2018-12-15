@include('layouts.alerts')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kingstay</title>
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
  <div class="row content">
    <div class="col-sm-3 sidenav fixed-side">
      <ul class="nav nav-pills nav-stacked"><br>
        <li ><a href="{{route('admin.akun')}}">Home</a></li>
        <li class=""><a href="{{route('admin.akun')}}">Akun</a></li>
        <li><a href="{{route('admin.homestay')}}">Homestay</a></li>
        <li><a href="{{route('admin.kendaraan')}}">Kendaraan</a></li>
        <li><a href="{{route('admin.objekWisata')}}">Objek Wisata</a></li>
        <li class="active"><a href="{{route('admin.request')}}">Request</a></li>
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

<br><br>
        <div class="panel panel-primary filterable">
                        
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">List request menjadi owner homestay</h3>
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
                                    <th><p>Nama</p></th>
                                    <th><p>Alamat</p></th> 
                                    <th><p>Tanggal Request</p></th>
                                    <th><p>Tanggal Lahir</p></th>
                                    <th><p>NIK</p></th>
                                    <th><p>Foto KTP</p></th>
                                    <th><p>Foto Diri</p></th>
                                </tr>
                            </thead>
                                @foreach($test2 as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->nama}}</td>
                                     <td>{{$a->alamat}}</td>
                                      <td>{{$a->created_at}}</td>
                                      <td>{{$a->tanggal_lahir}}</td>
                                      <td>{{$a->NIK}}</td>
                                      <td><a href="/owner/{{$a->foto_ktp}}"><img src="/owner/{{$a->foto_ktp}}" style="width: 100px; height: 55px;"></a></td>
                                      <td><a href="/owner/{{$a->foto_diri}}"><img src="/owner/{{$a->foto_diri}}" style="width: 100px; height: 55px;"></a></td>
                                  @if($a->status=='pending')
                                     <td> 
                                      <form method="post" action="{{route('admin.acc',$a->id_akun )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success"  value="Terima">
                                      </form>
                                    </td>
                                     <td> 
                                      <form method="post" action="{{route('admin.rej',$a->id_akun )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                       <input type="submit" class="btn btn-danger"  value="Tolak">
                                      </form>
                                     </td>
                                     @else
                                     <td> 
                                      <form method="post" action="{{route('accept',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success"  value="Terima">
                                      </form>
                                    </td>
                                     <td> 
                                      <form method="post" action="{{route('reject',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                       <input type="submit" class="btn btn-danger"  value="Tolak">
                                      </form>
                                     </td>
                                   @endif  
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
                            <h3 class="panel-title">List request booking homestay</h3>
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
                                    <th><p>Tanggal</p></th>
                                    <th><p>Jumlah Kamar</p></th> 
                                    <th><p>Status</p></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                @foreach($test as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->date}}</td>
                                     <td>{{$a->jumlah_kamar}}</td>
                                      <td>{{$a->status}}</td>
                                  @if($a->status=='pending')
                                     <td> 
                                      <form method="post" action="{{route('accept',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success"  value="Terima">
                                      </form>
                                    </td>
                                     <td> 
                                      <form method="post" action="{{route('reject',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                       <input type="submit" class="btn btn-danger"  value="Tolak">
                                      </form>
                                     </td>
                                     @elseif($a->status=='On Process')
                                     <td> 
                                      <form method="post" action="{{route('accept',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success"  value="Terima">
                                      </form>
                                    </td>
                                     <td> 
                                      <form method="post" action="{{route('reject',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                       <input type="submit" class="btn btn-danger"  value="Tolak">
                                      </form>
                                     </td>
                                   @endif  
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
                            <h3 class="panel-title">List request booking Kendaraan</h3>
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
                                    <th><p>Tanggal</p></th>
                                    <th><p>Jumlah Kamar</p></th> 
                                    <th><p>Status</p></th>

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                @foreach($test1 as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->date}}</td>
                                     <td>{{$a->date_akhir}}</td>
                                      <td>{{$a->status}}</td>
                                  @if($a->status=='pending')
                                     <td> 
                                      <form method="post" action="{{route('accept',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success"  value="Terima">
                                      </form>
                                    </td>
                                     <td> 
                                      <form method="post" action="{{route('reject',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                       <input type="submit" class="btn btn-danger"  value="Tolak">
                                      </form>
                                     </td>
                                     @elseif($a->status=='On Process')
                                     <td> 
                                      <form method="post" action="{{route('accept',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success"  value="Terima">
                                      </form>
                                    </td>
                                     <td> 
                                      <form method="post" action="{{route('reject',$a->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                       <input type="submit" class="btn btn-danger"  value="Tolak">
                                      </form>
                                     </td>
                                   @endif  
                                  </tr>
                                </div>
                                @endforeach
                          
                            </table>
                        <!-- panel content end -->
                        <!-- panel end -->
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
