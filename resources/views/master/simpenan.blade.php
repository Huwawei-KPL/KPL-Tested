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
                                    <input name="nama_ruang" id="nama_ruang" value="{{$ruangan->nama_ruang}}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Gedung</span>
                                    <select name="gedung" id="gedung" class="form-control">
                                        <option value="{{$ruangan->id_gedung}}">{{ $ruangan->gedung }}</option>
                                        @foreach ($gedung as $gedung)
                                        @if ($gedung->id_gedung != $ruangan->id_gedung)
                                        <option value="{{$gedung->id_gedung}}">{{ $gedung->gedung }}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Lantai</span>
                                    </div>
                                    <input name="lantai" id="lantai" type="number" value="{{$ruangan->lantai}}" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Kapasitas</span>
                                    </div>
                                    <input name="kapasitas" id="kapasitas" value="{{$ruangan->kapasitas}}" type="number" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="form-group">
                                    @if ($ruangan->foto != NULL)
                                    @endif
                                    <input type="file" name="foto" id="foto"><br>
                                </div>
                                <br>

                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Luas Ruangan (m2)</span>
                            </div>
                            <input name="luas" id="luas" type="number" value="{{$ruangan->luas}}" min="1" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="gedung"]').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '/addruangan/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {


                        $('select[name="lantai"]').empty();
                        $.each(data, function(key) {
                            $('select[name="lantai"]').append('<option value="' + key + '">' + key + '</option>');
                        });


                    }
                });
            } else {
                $('select[name="lantai"]').empty();
            }
        });
    });
</script>
@endsection