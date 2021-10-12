@extends('layouts.app', ['activePage' => 'pegawai', 'title' => 'Daftar pegawai dan departemen', 'activeButton' => ''])

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // var select = document.getElementById("role").value;
    // if (select != "0") {
    //     document.getElementById("id_departemen").disabled = true;
    // }
    // document.getElementById("id_departemen").disabled = true;
    $("select[id='role']").on('click', function() {
            // if ($(".role").val() != 0) {
            //     $("select[id='id_departemen']").setAttribute("disabled");
            // }

        }
        // var project_id = $(this).value; $("select[name='subproject'] > option[data-project != " + project_id + "]").hide();

        // if (project_id == 1) {
        //     var note = $("textarea[name='note']");
        //     note.show();
        //     note.prop("disabled", false);
        // }
    )
</script>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mt-2">Penambahan Pegawai</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            <form method="POST" action="/addpegawaibaru/{{{Auth::user()->id_perusahaan}}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Pegawai</span>
                                    </div>
                                    <input name="nama_user" id="nama_user" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
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
                                        <option value="">-- Pilih Role --</option>
                                        <option value="0"> Pegawai</option>
                                        <option value="1"> Admin Ruangan</option>
                                        <option value="2"> Admin Personalia</option>
                                        <option value="4"> Admin Konsumsi</option>
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
                                    <input name="email" id="email" type="email" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('email'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi email terlebih dahulu / Format email kurang tepat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                @include('alerts.success', ['key' => 'password_status'])
                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])



                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" for="input-password">
                                        <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Password baru') }}
                                    </span>
                                    <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="">
                                    @if ($errors->get('password'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi password terlebih dahulu.
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
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" value="">
                                    @if ($errors->get('password_confirmation'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi password terlebih dahulu / isi password tidak sama!.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>



                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Departemen</span>
                                    <select name="id_departemen" id="id_departemen" class="form-control" disabled>
                                        <option value="">-- Pilih Departemen --</option>
                                        @foreach ($departemen as $departemen)

                                        @if ($departemen->departemen != NULL)
                                        <option value="{{$departemen->id_departemen}}">{{ $departemen->departemen }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->get('id_departemen'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap pilih departemen pengguna.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>


                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data pegawai?')" class="btn btn-primary btn-round">Tambah</button>
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