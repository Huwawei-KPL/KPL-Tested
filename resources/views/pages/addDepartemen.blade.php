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
                                    <input name="departemen" id="Departemen" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>

                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data departemen?')" class="btn btn-primary btn-round">Tambah</button>
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