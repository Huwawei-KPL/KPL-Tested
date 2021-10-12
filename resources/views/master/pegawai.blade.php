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
                        <button type="button" class="btn btn-primary btn-md btn-modal btn-round" data-toggle="modal" data-target="#myModal" style="margin-top:20px; margin-bottom:10px;">Tambahkan Admin +</button>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Perusahaan</th>
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
                                    <td>{{$pegawai->nama_perusahaan}}</td>

                                    <td><a class="btn  btn-danger btn-round" href="/deleteuser/{{$pegawai->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data pegawai ini?')" style="color:red; margin-right:20;">Hapus</a>
                                        <div class="divider"></div>

                                        <a class="btn  btn-danger btn-round" href="/ubahpassworduser/{{$pegawai->id}}/{{$pegawai->id_perusahaan}}" style="color:red;"><i class="nc-icon nc-key-25 nc-3x" style="-webkit-text-stroke: 1px red;"></i></a>
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
                                    <td>{{$admin->nama_perusahaan}}</td>
                                    <td><a class="btn  btn-danger btn-round" href="/deleteuser/{{$admin->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data pegawai ini?')" style="color:red; margin-right:20;">Hapus</a>
                                        <div class="divider"></div>

                                        <a class="btn  btn-danger btn-round" href="/ubahpassworduser/{{$admin->id}}/{{$admin->id_perusahaan}}" style="color:red;"><i class="nc-icon nc-key-25 nc-3x" style="-webkit-text-stroke: 1px red;"></i></a>
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


                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Departemen</th>
                                <th>Perusahaan</th>


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
                                    <td>{{$departemen->nama_perusahaan}}</td>

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

                            <div class="card-header card-header-primary">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title mt-2">Penambahan Admin</h4>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">

                                    <form method="POST" action="/addadminmaster">
                                        @csrf
                                        <div class="form-group">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Perusahaan</span>
                                            <select name="id_perusahaan" id="id_perusahaan" class="form-control" required>
                                                <option value="">-- Pilih Perusahaan --</option>
                                                @foreach ($perusahaan as $perusahaan)


                                                <option value="{{$perusahaan->id_perusahaan}}">{{ $perusahaan->nama_perusahaan }}</option>

                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Pegawai</span>
                                            </div>
                                            <input name="nama_user" id="nama_user" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Role</span>
                                            <select name="role" id="role" class="form-control" onchange="if (document.getElementById('role').value != 0)  document.getElementById('id_departemen').disabled = true; else document.getElementById('id_departemen').disabled = false; ">
                                                <option value="">-- Pilih Role --</option>

                                                <option value="1"> Admin Ruangan</option>
                                                <option value="2"> Admin Personalia</option>
                                                <option value="4"> Admin Konsumsi</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                            </div>
                                            <input name="email" id="email" type="email" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        @include('alerts.success', ['key' => 'password_status'])
                                        @include('alerts.error_self_update', ['key' => 'not_allow_password'])



                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <span class="input-group-text" id="inputGroup-sizing-sm" for="input-password">
                                                <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Password baru') }}
                                            </span>
                                            <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="" required>

                                            @include('alerts.feedback', ['field' => 'password'])
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-text" id="inputGroup-sizing-sm" for="input-password-confirmation">
                                                <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Konfirmasi Password Baru') }}
                                            </span>
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" value="" required>
                                        </div>






                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data pegawai?')" class="btn btn-primary btn-round">Tambah</button>
                                <button type="button" class=" btn btn-primary btn-round" data-dismiss="modal">Kembali</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection