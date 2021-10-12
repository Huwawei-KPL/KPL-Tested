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
                                <h4 class="card-title mt-2">Pengubahan Ruang</h4>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            @foreach ($ruangan as $ruangan)
                            <form method="POST" enctype="multipart/form-data" action="/editruangmaster/{{$ruangan->id_ruang}}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Ruang</span>
                                    </div>
                                    <input name="nama_ruang" id="nama_ruang" value="{{$ruangan->nama_ruang}}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
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
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Gedung</span>
                                    <select name="gedung" id="gedung" class="form-control">
                                        <option id="{{$ruangan->jml_lantai}}" value="{{$ruangan->id_gedung}}">{{ $ruangan->gedung }}</option>
                                        @foreach ($gedung as $gedung)
                                        @if ($gedung->id_gedung != $ruangan->id_gedung)
                                        <option id="{{$gedung->jml_lantai}}" value="{{$gedung->id_gedung}}">{{ $gedung->gedung }}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Lantai</span>
                                    <select name="lantai" id="lantai" class="form-control">
                                        <option value="{{$ruangan->lantai}}">{{$ruangan->lantai}} </option>
                                    </select>
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Kapasitas</span>
                                        </div>
                                        <input name="kapasitas" id="kapasitas" value="{{$ruangan->kapasitas}}" type="number" min="1" step="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="form-group">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Pemakaian Ruangan</span>
                                        <select name="approve" id="approve" class="form-control">
                                            @if ($ruangan->approve == 1)
                                            <option value="1">Perlu persetujuan admin</option>
                                            <option value="0">Tidak perlu persetujuan admin</option>
                                            @else
                                            <option value="0">Tidak perlu persetujuan admin</option>
                                            <option value="1">Perlu persetujuan admin</option>
                                            @endif

                                        </select>
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
                                        <input name="luas" id="luas" type="number" value="{{$ruangan->luas}}" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                        @if ($errors->get('luas'))
                                        <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                                            <strong>Error!</strong> Harap isi luas ruang pertemuan terlebih dahulu.
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
                                                        @if ($ruangan->ac == 1)
                                                        <input name="ac" class="form-check-input" type="checkbox" value="1" id="ac" checked>
                                                        @else
                                                        <input name="ac" class="form-check-input" type="checkbox" value="1" id="ac">
                                                        @endif
                                                        <label class="form-check-label" for="ac">
                                                            AC (Air Conditioner)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        @if ($ruangan->infocus==1)
                                                        <input name="infocus" class="form-check-input" type="checkbox" value="1" id="infocus" checked>
                                                        @else
                                                        <input name="infocus" class="form-check-input" type="checkbox" value="1" id="infocus">
                                                        @endif
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Infocus (Proyektor)
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        @if ($ruangan->whiteboard ==1)
                                                        <input name="whiteboard" class="form-check-input" type="checkbox" value="1" id="whiteboard" checked>
                                                        @else
                                                        <input name="whiteboard" class="form-check-input" type="checkbox" value="1" id="whiteboard">
                                                        @endif
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
                                                <textarea class="form-control" id="fasilitas" name="fasilitas" value="" rows="5">{{$ruangan->fasilitas}}</textarea>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-lg-3" style="margin:auto;">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Foto (Opsional)</span>
                                        @if ($ruangan->foto != NULL)
                                        <img src="{{ asset('storage/assets/img/perusahaan/ruangan/'.$ruangan->foto) }}" class="img-thumbnail img-previeww">
                                        @else
                                        <img src="{{ asset('light-bootstrap/img/door.jpg') }}" class="img-thumbnail img-previeww">

                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class=" @error('avatar') is-invalid @enderror" name="avatar" id="imagee" onchange="previewImgg()">
                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach

                                    <button type="submit" onclick="return confirm('Apakah yakin ingin mengubah data ruang?')" class="btn btn-primary btn-round">Ubah</button>
                                    <a href="/showRuangMaster" class="btn btn-primary btn-round">Kembali</a>

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
        // For A Delete Record Popup





        $('#gedung').ready(function() {
            var lantai = $("#gedung").children(":selected").attr("id");
            var lt = $("#lantai").children(":selected").attr("value");

            var i = 1;


            while (i <= lantai) {
                $('#lantai').append(new Option(i, i));


                i++;
            }




        });
        $('#gedung').change(function() {
            var lantai = $(this).children(":selected").attr("id");
            var i = 1;
            $('#lantai').find('option').remove().end();
            // while (i < lantai) {

            //     $('#lantai').append($('<option>', {
            //         value: i,
            //         text: i
            //     }));
            // }
            while (i <= lantai) {
                $('#lantai').append(new Option('Lantai ' +
                    i, i));
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