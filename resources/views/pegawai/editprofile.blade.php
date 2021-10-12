@extends('layouts.user' ,['activePage' => 'editprofile' , 'activeButton' => 'profile','title'=>'Ubah Profil'])
@section('classbody')
page-quick-sidebar-over-content
@endsection
<!--buat page content, dipaling bawah tambah </div> -->

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN STYLE CUSTOMIZER -->

        <!-- END STYLE CUSTOMIZER -->
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Edit Profil <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/myprofile">Edit Profil</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->



        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-equalizer font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Ubah Profil</span>

                        </div>

                    </div>
                    <div class="portlet-body form">
                        @include('alerts.success')
                        @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
                        <!-- BEGIN FORM-->
                        <form method="post" class="dev" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <div class="input-group">
                                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->nama_user) }}" autofocus>

                                            </div>

                                        </div>
                                        @if ($errors->get('name'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Nama tidak boleh kosong.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Email</label>
                                            <div class="input-group">
                                                <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}">

                                            </div>

                                        </div>
                                        @if ($errors->get('email'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Email tidak boleh kosong / Email telah terpakai.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->

                            </div>
                            <div class="form-actions left">

                                <button type="submit" class="btn blue"> Ubah Data Pribadi</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                    <hr>

                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-key font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Ubah Password</span>

                        </div>

                    </div>
                    <div class="portlet-body form">
                        <form method="post" class="dev" action="{{ route('profilepegawai.password') }}">
                            <div class="row">
                                @csrf
                                @method('patch')




                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Password lama</label>
                                        <div class="input-group">
                                            <input type="password" name="old_password" id="input-current-password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="">

                                        </div>

                                    </div>
                                    @if ($errors->get('old_password'))
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="alert alert-danger">
                                                <strong>Error!</strong> Password lama tidak cocok.
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label">Password Baru</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="">

                                        </div>

                                    </div>
                                    @if ($errors->get('password'))
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="alert alert-danger">
                                                <strong>Error!</strong> Harap isi password baru / password harus diatas 6 karakter .
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="control-label">Password baru (Ulang)</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="">

                                        </div>

                                    </div>
                                    @if ($errors->get('password_confirmation'))
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="alert alert-danger">
                                                <strong>Error!</strong> Harap isi password baru / Password tidak cocok.
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    @include('alerts.success', ['key' => 'password_status'])
                                    @include('alerts.error_self_update', ['key' => 'not_allow_password'])</div>
                            </div>
                            <div class="form-actions left">

                                <button type="submit" class="btn blue"> Ubah Password</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

            <!-- END SAMPLE TABLE PORTLET-->

        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        ComponentsPickers.init();
    });
</script>
@endsection