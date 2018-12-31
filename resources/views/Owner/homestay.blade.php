<script type="text/javascript">
  var input = document.getElementById('filesToUpload');
  var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
  list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
  //add to list
  var li = document.createElement('li');
  li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
  list.append(li);
}
</script>
<br><br>@include('layouts.alerts')
@extends('layouts.owner')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<div class="container">
  <hr>

  <div class="panel panel-primary filterable">

    <!-- panel heading starat -->
    <div class="panel-heading">
      <h3 class="panel-title">List Homestay</h3><br><br>
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
            <th><p>Harga</p></th> 
            <th><p>Keterangan</p></th>
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
                                  <td>{{$a->nama }}</td>

                                  <td>{{$a->harga}}</td>
                                  <td><textarea class="form-control" rows="3" disabled=""><?php echo $a->keterangan ?></textarea></td>
                                  <td> <a href="{{route('homestay.update',$a->id)}}" class="btn btn-primary">Update</a></td>
                                  <td> <form method="post" action="{{route('homestay.destroy',$a->id)}}">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus homestay ini?')" value="Hapus">
                                  </form></td>
                                </tr>
                              </div>

                              @endforeach

                            </table>
                            <!-- panel content end -->
                            <!-- panel end -->
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <b><hr></b>
                      <div class="container" style="margin-top:30px;" >
                       <div class="panel-heading">
                        <h3 class="panel-title">Daftar Homestay Baru</h3><br><br>
                        <div class="pull-right">

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <br>
                          <form action="{{route('homestay.store')}}" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                              {{ csrf_field() }}
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Nama Homestay
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <input type="text" name="nama" required="" class="form-control form-control-lg" value="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Harga Kamar / Malam
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <input type="number" min="0" required="" class="form-control form-control-lg" name="harga"  value="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Jumlah Kamar
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <input type="number" required="" name="jumlah" min="1" class="form-control form-control-lg" value="">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Deskripsi Homestay
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <textarea name="keterangan" required="" class="ckeditor">
                                </textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Gambar
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <input type="file" name="gambar" required="" class="form-control form-control-lg" value="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Alamat
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <input type="text" name="alamat" required="" class="form-control form-control-lg" value="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Kecamatan
                                </h5>
                              </div>
                              <div class="col-md-9">
                                <select class="custom-select my-1 mr-sm-2 custom-select-lg" required="" name="kecamatan" id="inlineFormCustomSelectPref">
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
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>Fasilitas Homestay
                                </h5>
                              </div>
                              <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" value="Meja"  name="check[]" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Meja
                                  </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" value="TV" name="check[]" class="custom-control-input"  id="customCheck2">
                                  <label class="custom-control-label" for="customCheck2">TV
                                  </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="check[]" value="kaca" id="customCheck3">
                                  <label class="custom-control-label" for="customCheck3">Kaca
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="check[]"  value="kulkas" id="customCheck5">
                                  <label class="custom-control-label" for="customCheck5">Kulkas
                                  </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="check[]" value="ac" id="customCheck6">
                                  <label class="custom-control-label" for="customCheck6">AC
                                  </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="check[]" value="wardrobe" id="customCheck7">
                                  <label class="custom-control-label" for="customCheck7">Wardrobe
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="check[]" value="wifi" id="customCheck9">
                                  <label class="custom-control-label" for="customCheck9">Wifi
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <h5>
                                  Gambar Tambahan Homestay
                                </h5>
                              </div>
                              <div class="col-md-5">
                                <input type="file" name="file[]" id="filesToUpload" multiple="">
                                <br><br>
                                
                              </div>
                              
                            </div>
                            <div>

                            </div>
                            <hr>
                            <div class="form-group row">
                              <div class="col-md-10">
                              </div>
                              <div class="col-md-2" style="color:grey;">

                                <button class="btn btn-success btn-sm" type="submit">Save
                                </button>

                              </div>
                            </div>
                          </div>
                        </form>


                      </div>
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
