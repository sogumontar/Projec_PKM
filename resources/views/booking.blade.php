@extends('layouts.template')

</div>
<br>


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

<!--
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
-->
                                </tr>
                            </thead>
                                @foreach($d as $a)
                                <div>
                                  <tr>
                                    <td>{{$a->date }}</td>
                                     <td>{{$a->status}}</td>
                                     <td>{{$a->nama}}</td>
                                     <td><a href="{{route('member.bayar',$a->id)}}"><button class="btn btn-primary">bayar</button></a></td>
                                  </tr>
                                </div>
                                @endforeach
                          
                            </table>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>


