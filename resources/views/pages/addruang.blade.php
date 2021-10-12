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
                                    <input name="nama_ruang" id="nama_ruang" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('nama_ruang'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi nama ruang terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" onchange="lantai();">Gedung</span>
                                    <select name="gedung" id="gedung" class="form-control">
                                        <option value="">-- Pilih Gedung -- </option>
                                        @foreach ($gedung as $gedung)
                                        <option id="{{$gedung->jml_lantai}}" value="{{$gedung->id_gedung}}">{{ $gedung->gedung }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->get('gedung'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi gedung terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Lantai</span>
                                    <select name="lantai" id="lantai" class="form-control">
                                        <option value="">-- Pilih Gedung Terlebih Dahulu -- </option>
                                    </select>
                                    @if ($errors->get('lantai'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap pilih lantai tempat ruangan berada terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Kapasitas</span>
                                    </div>
                                    <input name="kapasitas" id="kapasitas" type="number" min="1" class="form-control" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('kapasitas'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi kapasitas ruang pertemuan terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Luas Ruangan (m2)</span>
                                    </div>
                                    <input name="luas" id="luas" type="number" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    @if ($errors->get('luas'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi luas ruang pertemuan terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" required>Pemakaian Ruangan</span>
                                    <select name="approve" id="approve" class="form-control">
                                        <option value="">-- Pilih Opsi --</option>
                                        <option value="1">Perlu persetujuan admin</option>
                                        <option value="0">Tidak perlu persetujuan admin</option>
                                    </select>
                                    @if ($errors->get('approve'))
                                    <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                        <strong>Error!</strong> Harap isi tingkat kepentingan ruangan terlebih dahulu.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
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
                                <div class="col-lg-3" style="margin:auto;">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Foto (Opsional)</span>
                                    <img src="{{ asset('light-bootstrap/img/door.jpg') }}" class="img-thumbnail img-previeww">
                                </div>
                                <div class="form-group">
                                    <input type="file" class=" @error('avatar') is-invalid @enderror" name="avatar" id="imagee" onchange="previewImgg()">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
@push('js')
<script>
    $(document).ready(function() {

        $('#gedung').change(function() {
            var lantai = $(this).children(":selected").attr("id");
            var i = 1;
            $('#lantai').find('option').remove().end();

            while (i <= lantai) {
                $('#lantai').append(new Option('Lantai ' + i, i));
                i++;
            }




        });
    });

    function previewImgg() {
        const gambar = document.querySelector('#imagee');
        const preview_gambar = document.querySelector('.img-previeww');

        const file_gambar = new FileReader();
        file_gambar.readAsDataURL(gambar.files[0]);

        file_gambar.onload = function(e) {
            preview_gambar.src = e.target.result;
        }
    }
</script>
@endpush