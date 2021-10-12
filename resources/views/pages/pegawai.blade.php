@extends('layouts.app', ['activePage' => 'pegawai', 'title' => 'Daftar pegawai dan departemen', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Pegawai dan Admin</h4>
                        <p class="card-category"></p>
                        <a href="/addpegawai/{{{Auth::user()->id_perusahaan}}}" class="btn  btn-primary btn-round " style="margin-top:20px; margin-bottom:10px;">Tambahkan user +</a>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($pegawai as $pegawai)
                                @if ($pegawai->id != Auth::user()->id)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$pegawai->nama_user}}</td>
                                    @if ($pegawai->departemen == NULL)
                                    <td>-</td>
                                    @else
                                    <td>{{$pegawai->departemen}}</td>
                                    @endif
                                    <td>{{$pegawai->email}}</td>

                                    <td>Pegawai</td>

                                    <td><a class="btn  btn-danger btn-round" href="/deleteuser/{{$pegawai->id}}/{{{Auth::user()->id_perusahaan}}}" onclick="return confirm('Apakah anda yakin ingin menghapus data pegawai ini?')" style="color:red; margin-right:20;">Hapus</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahuser/{{$pegawai->id}}/{{{Auth::user()->id_perusahaan}}}" style="color:red;">Ubah</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahpassworduser/{{$pegawai->id}}/{{{Auth::user()->id_perusahaan}}}" style="color:red;"><i class="nc-icon nc-key-25 nc-3x" style="-webkit-text-stroke: 1px red;"></i></a>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endif
                                @endforeach
                                @foreach ($admin as $admin)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$admin->nama_user}}</td>
                                    <td>-</td>
                                    <td>{{$admin->email}}</td>
                                    @if ($admin->admin == 1)
                                    <td>Admin Ruangan</td>
                                    @elseif ($admin-> admin== 2)
                                    <td>Admin Personalia</td>
                                    @elseif ($admin-> admin== 4)
                                    <td>Admin Konsumsi</td>


                                    @endif
                                    <td><a class="btn  btn-danger btn-round" href="/deleteuser/{{$admin->id}}/{{{Auth::user()->id_perusahaan}}}" onclick="return confirm('Apakah anda yakin ingin menghapus data pegawai ini?')" style="color:red; margin-right:20;">Hapus</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahadmin/{{$admin->id}}/{{{Auth::user()->id_perusahaan}}}" style="color:red;">Ubah</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahpassworduser/{{$admin->id}}/{{{Auth::user()->id_perusahaan}}}" style="color:red;"><i class="nc-icon nc-key-25 nc-3x" style="-webkit-text-stroke: 1px red;"></i></a>
                                    </td>

                                </tr>
                                @php $i++; @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Departemen</h4>
                        <p class="card-category"></p>
                        <button type="button" class="btn btn-primary btn-md btn-modal btn-round" data-toggle="modal" data-target="#myModal" style="margin-top:20px; margin-bottom:10px;">Tambahkan Departemen +</button>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Departemen</th>

                                <th></th>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($departemen as $departemen)
                                @if ($departemen->departemen != NULL)
                                <tr>
                                    <td>@php echo $i @endphp</td>
                                    <td>{{$departemen->departemen}}</td>

                                    <td><a class="btn  btn-danger btn-round" onclick="return confirm('Apakah anda yakin ingin menghapus data departemen ini?')" href="/deleteDepartemen/{{$departemen->id_departemen}}/{{{Auth::user()->id_perusahaan}}}" margin-right:20;">Hapus</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahDepartemen/{{$departemen->id_departemen}}">Ubah</a>
                                    </td>
                                </tr>
                                @php $i++; @endphp

                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title mt-2">Penambahan Departemen</h4>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="table-responsive">

                                        <form method="POST" action="/tambahdepartemen/{{{Auth::user()->id_perusahaan}}}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Nama Departemen</span>
                                                </div>
                                                <input name="departemen" id="departemen" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                            </div>

                                    </div>

                                    <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data departemen?')" class="btn btn-primary btn-round">Tambah</button>
                                    <button type="button" class="btn btn-danger btn-modal btn-round" data-dismiss="modal">Kembali</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
</div>
</div>
@endsection