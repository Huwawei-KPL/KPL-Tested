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
                                <h4 class="card-title mt-2">Pengubahan Data Admin</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            @foreach($users as $users)
                            <form method="POST" action="/ubahms/{{$users->id}}/{{{Auth::user()->id_perusahaan}}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Admin</span>
                                    </div>
                                    <input name="nama_user" id="nama_user" value="{{$users->nama_user}}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                    </div>
                                    <input name="email" id="email" value="{{$users->email}}" type="email" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>


                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Role</span>
                                    <select name="admin" id="admin" class="form-control">
                                        @if ($users->admin == 1)

                                        <option value="1">Admin Ruangan</option>
                                        <option value="2">Admin Personalia</option>
                                        @else
                                        <option value="2">Admin Personalia</option>
                                        <option value="1">Admin Ruangan</option>
                                        @endif

                                    </select>

                                </div>


                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin mengubah data admin?')" class="btn btn-primary btn-round">Ubah</button>
                        <a href="/showPegawai/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary btn-round">Kembali</a>

                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endsection