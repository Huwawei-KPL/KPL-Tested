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
                                <h4 class="card-title mt-2">Penambahan Admin</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            <form method="POST" action="/addadmin/{{{Auth::user()->id_perusahaan}}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Admin</span>
                                    </div>
                                    <input name="nama_user" id="nama_user" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
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



                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Role</span>
                                    <select name="admin" id="admin" class="form-control">
                                        <option value="">-- Pilih Role --</option>
                                        <option value="2">Admin Personalia</option>
                                        <option value="1">Admin Ruangan</option>

                                    </select>

                                </div>


                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data admin?')" class="btn btn-primary btn-round">Tambah</button>
                        <a href="/showPegawai/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary btn-round">Kembali</a>

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