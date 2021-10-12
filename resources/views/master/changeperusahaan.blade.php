@extends('layouts.app', ['activePage' => 'perusahaan', 'title' => 'Ubah Perusahaan', 'activeButton' => 'perusahaan'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mt-2">Ubah Perusahaan</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            @foreach($perusahaan as $perusahaan)
                            <form method="POST" action="/changeperusahaan/{{$perusahaan->id_perusahaan}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Perusahaan</span>
                                    </div>
                                    <input name="nama_perusahaan" value="{{$perusahaan->nama_perusahaan}}" id="nama_perusahaan" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Lokasi</span>
                                    </div>
                                    <input name="lokasi" id="lokasi" value="{{$perusahaan->lokasi}}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Deskripsi</span>
                                    </div>
                                    <input name="deskripsi" id="deskripsi" value="{{$perusahaan->deskripsi }}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>

                        </div>

                        <button type="submit" onclick="return confirm('Apakah yakin ingin mengubah data perusahaan?')" class="btn btn-primary btn-round">Tambah</button>
                        <a href="/showPerusahaan" class="btn btn-primary btn-round">Kembali</a>

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