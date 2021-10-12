@extends('layouts.app', ['activePage' => 'gedung', 'title' => 'Daftar Gedung Perusahaan', 'activeButton' => 'kelola'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mt-2">Penambahan Gedung</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            <form method="POST" action="/addgedungadmin/{{{Auth::user()->id_perusahaan}}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Gedung</span>
                                    </div>
                                    <input name="gedung" id="gedung" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

                                    @if ($errors->get('gedung'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi nama gedung terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Jumlah Lantai</span>
                                    </div>
                                    <input name="jml_lantai" id="jml_lantai" type="number" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('jml_lantai'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi jumlah lantai pada gedung terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Jumlah Ruangan</span>
                                    </div>
                                    <input name="jml_ruangan" id="jml_ruangan" type="number" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('jml_ruangan'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi jumlah ruangan terlebih dahulu / jumlah ruangan harus merupakan angka bulat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Lokasi</span>
                                    </div>
                                    <input name="lokasi" id="lokasi" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('lokasi'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi lokasi gedung terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data gedung?')" class="btn btn-primary btn-round">Tambah</button>
                        <a href="/showGedung/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary btn-round">Kembali</a>

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