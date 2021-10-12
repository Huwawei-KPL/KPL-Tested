@extends('layouts.app', ['activePage' => 'pegawai', 'title' => 'Daftar pegawai dan departemen', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        @foreach ($users as $users)
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mt-2">Ubah Password </h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('profilepegawai.ubahpassword') }}">
                                @csrf
                                @method('patch')



                                @include('alerts.success', ['key' => 'password_status'])
                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])

                                <div class="pl-lg-4">
                                    @include('alerts.success', ['key' => 'password_status'])
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <span class="input-group-text" id="inputGroup-sizing-sm" for="input-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Password baru') }}
                                        </span>
                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="">
                                        @if ($errors->get('password'))
                                        <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                            <strong>Error!</strong> Harap isi password dengan minimal 6 karakter.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <span class="input-group-text" id="inputGroup-sizing-sm" for="input-password-confirmation">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Konfirmasi Password Baru') }}
                                        </span>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="">
                                        @if ($errors->get('password_confirmation'))
                                        <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                            <strong>Error!</strong> Harap isi password terlebih dahulu / isi password tidak sama!.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                    </div>

                                    <div style="display: none;">
                                        <input type="text" name="iduser" value="{{$users->id}}">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" onclick="return confirm('Apakah yakin ingin mengganti password  pegawai?')" class="btn btn-twitter btn-round">{{ __('Change password') }}</button>
                                        @if (Auth::user()->id_perusahaan=='')
                                        <a href="/showPegawaiMaster" class="btn btn-primary btn-round">Kembali</a>
                                        @else
                                        <a href="/showPegawai/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary btn-round">Kembali</a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
</div>
@endsection