@extends('layouts.app', ['activePage' => 'pegawai', 'title' => 'Daftar pegawai dan departemen', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mt-2">Pengubahan Data Pegawai</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            @foreach ($users as $users)
                            <form method="POST" action="/editpegawai/{{$users->id}}/{{{Auth::user()->id_perusahaan}}}">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Pegawai</span>
                                    </div>
                                    <input name="nama_user" id="nama_user" value="{{$users->nama_user}}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('nama_user'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi nama pengguna terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Role</span>
                                    <select name="role" id="role" class="form-control" onchange="if (document.getElementById('role').value != 0)  document.getElementById('id_departemen').disabled = true; else document.getElementById('id_departemen').disabled = false; ">
                                        <option value="{{$users->admin}}"> @if ($users->admin==0)
                                            Pegawai
                                            @elseif ($users->admin==1)
                                            Admin Ruangan
                                            @elseif ($users->admin==2)
                                            Admin Personalia
                                            @elseif ($users->admin==4)
                                            Admin Konsumsi</option>
                                        @endif


                                        @if ($users->admin != 0)
                                        <option value="0"> Pegawai</option>@endif
                                        @if ($users->admin != 1)
                                        <option value="1"> Admin Ruangan</option>@endif
                                        @if ($users->admin != 2)
                                        <option value="2"> Admin Personalia</option>@endif
                                        @if ($users->admin != 4)
                                        <option value="4"> Admin Konsumsi</option>
                                        @endif
                                    </select>
                                    @if ($errors->get('role'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi role pengguna terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                    </div>
                                    <input name="email" id="email" type="email" min="1" value="{{$users->email}}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('email'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi email terlebih dahulu / Format email kurang tepat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Departemen</span>
                                    @if ($users->admin==0 )
                                    <select name="id_departemen" id="id_departemen" class="form-control">
                                        @else
                                        <select name="id_departemen" id="id_departemen" class="form-control" disabled>
                                            @endif
                                            @if ($users->departemen == NULL )
                                            <option value=""> -- Pilih Departemen --</option>
                                            @else

                                            <option value="{{$users->id_departemen}}"> {{$users->departemen}}</option>
                                            @endif
                                            @foreach ($departemen as $departemen)
                                            @if($departemen->id_departemen != $users->id_departemen)
                                            @if ($departemen->departemen != NULL)
                                            <option value="{{$departemen->id_departemen}}">{{ $departemen->departemen }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->get('id_deparetemen'))
                                        <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                            <strong>Error!</strong> Harap isi departemen terlebih dahulu.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                </div>




                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin mengubah data pegawai?')" class="btn btn-primary">Ubah</button>
                        <a href="/showPegawai/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary">Kembali</a>
                        @endforeach
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