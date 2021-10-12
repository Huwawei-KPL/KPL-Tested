@extends('layouts.app', ['activePage' => 'ruang', 'title' => 'Penambahan ruang Perusahaan', 'activeButton' => 'kelola'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mt-2">Penambahan Ruang</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            <form method="POST" enctype="multipart/form-data" action="/addruangadmin/{{{Auth::user()->id_perusahaan}}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Ruang</span>
                                    </div>
                                    <input name="nama_ruang" id="nama_ruang" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" onchange="lantai();">Gedung</span>
                                    <select name="gedung" id="gedung" class="form-control">
                                        @foreach ($gedung as $gedung)
                                        <option id="{{$gedung->jml_lantai}}" value="{{$gedung->id_gedung}}">{{ $gedung->gedung }} -- {{$gedung->jml_lantai}} Lantai</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Lantai</span>
                                    <select name="lantai" id="lantai" class="form-control">

                                    </select>

                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Kapasitas</span>
                                    </div>
                                    <input name="kapasitas" id="kapasitas" type="number" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Luas Ruangan (m2)</span>
                                    </div>
                                    <input name="luas" id="luas" type="number" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" onchange="lantai();">Perusahaan</span>
                                    <select name="perusahaan" id="perusahaan" class="form-control">
                                        <option>--Pilih Perusahaan-- </option>
                                        @foreach ($perusahaan as $perusahaan)
                                        <option value="{{$perusahaan->id_perusahaan}}"> {{$perusahaan->nama_perusahaan}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fasilitas</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input name="ac" class="form-check-input" type="checkbox" value="1" id="ac">
                                                    <label class="form-check-label" for="ac">
                                                        AC (Air Conditioner)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input name="infocus" class="form-check-input" type="checkbox" value="1" id="infocus">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Infocus (Proyektor)
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input name="whiteboard" class="form-check-input" type="checkbox" value="1" id="whiteboard">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Whiteboard
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6" aria-rowspan="2">
                                        <div class="form-group">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Lainnya</span>
                                            <textarea class="form-control" id="fasilitas" name="fasilitas" value="" rows="5"></textarea>
                                        </div>
                                    </div>



                                </div>
                                <div class="form-group">
                                    <input type="file" name="foto" id="foto"><br>
                                </div>
                                <br>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data ruang?')" class="btn btn-primary btn-round">Tambah</button>
                                <a href="/showRuang/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary btn-round">Kembali</a>

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