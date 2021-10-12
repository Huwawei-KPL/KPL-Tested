@extends('layouts.app', ['activePage' => 'perusahaan', 'title' => 'Daftar Perusahaan', 'activeButton' => 'perusahaan'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">

                    <div class="card-header ">
                        <h4 class="card-title">Daftar Perusahaan</h4>
                        <button type="button" class="btn btn-primary btn-md btn-modal btn-round" data-toggle="modal" data-target="#myModal" style="margin-top:20px; margin-bottom:10px;">Tambahkan Perusahaan +</button>
                    </div>

                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Bergabung</th>
                                <th>Tanggal Diubah</th>

                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($perusahaan as $perusahaan)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$perusahaan->nama_perusahaan}}</td>
                                    <td>{{$perusahaan->lokasi}}</td>
                                    <td>{{$perusahaan->deskripsi}} </td>
                                    <td>{{date('d-m-Y', strtotime($perusahaan->created_at))}}</td>
                                    @if ($perusahaan->created_at == $perusahaan->updated_at)
                                    <td>-</td>
                                    @else
                                    <td>{{date('d-m-Y', strtotime($perusahaan->updated_at))}}</td>
                                    @endif

                                    <td><a class="btn  btn-danger btn-round" onclick="return confirm('Apakah yakin ingin menghapus data perusahaan ini beserta semua data nya?')" href="/deleteperusahaan/{{$perusahaan->id_perusahaan}}" style=" margin-right:20;">Hapus</a>
                                        <div class="divider"></div>
                                        <button data-nama="{{$perusahaan->nama_perusahaan}}" data-deskripsi="{{$perusahaan->deskripsi}}" data-id="{{$perusahaan->id_perusahaan}}" data-lokasi="{{$perusahaan->lokasi}}" type="button" class="btn btn-danger btn-md btn-modal btn-round ubah-ubah" data-toggle="modal" data-target="#ubahperusahaan">Ubah</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="ubahperusahaan" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

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

                                    <form method="POST" id="ubahform" enctype="multipart/form-data" action="">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Perusahaan</span>
                                            </div>
                                            <input name="nama_perusahaan" id="nama_perusahaanubah" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Lokasi</span>
                                            </div>
                                            <input name="lokasi" id="lokasiubah" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Deskripsi</span>
                                            </div>
                                            <input name="deskripsi" id="deskripsiubah" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>



                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin mengubah data perusahaan?')" class="btn btn-primary btn-round">Ubah</button>
                                <button type="button" class="btn btn-danger btn-modal btn-round" data-dismiss="modal">Kembali</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card-header card-header-primary">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title mt-2">Penambahan Perusahaan</h4>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">

                                    <form method="POST" action="/addperusahaan" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Perusahaan</span>
                                            </div>
                                            <input name="nama_perusahaan" id="nama_perusahaan" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Lokasi</span>
                                            </div>
                                            <input name="lokasi" id="lokasi" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Deskripsi</span>
                                            </div>
                                            <input name="deskripsi" id="deskripsi" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>


                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data perusahaan?')" class="btn btn-primary btn-round">Tambah</button>
                                <button type="button" class="btn btn-danger btn-modal btn-round" data-dismiss="modal">Kembali</button>

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
    function previewImg() {
        const gambar = document.querySelector('#image');
        const preview_gambar = document.querySelector('.img-preview');

        const file_gambar = new FileReader();
        file_gambar.readAsDataURL(gambar.files[0]);

        file_gambar.onload = function(e) {
            preview_gambar.src = e.target.result;
        }
    }

    function previewImgg() {
        const gambar = document.querySelector('#imagee');
        const preview_gambar = document.querySelector('.img-previeww');

        const file_gambar = new FileReader();
        file_gambar.readAsDataURL(gambar.files[0]);

        file_gambar.onload = function(e) {
            preview_gambar.src = e.target.result;
        }
    }
    $(document).ready(function() {
        // For A Delete Record Popup
        $('.ubah-ubah').click(function() {
            var id = $(this).attr('data-id');
            var deskripsi = $(this).attr('data-deskripsi');
            var nama = $(this).attr('data-nama');
            var lokasi = $(this).attr('data-lokasi');
            var foto = $(this).attr('data-foto');
            var ft = this.getAttribute('data-foto');

            // $("#ubahfoto").attr('src', "{{ asset('storage/assets/img/perusahaan/Screenshot 2021-02-04 171535.png') }}");
            $("#ubahform").attr('action', 'changeperusahaan/' + id);
            $('#deskripsiubah').val(deskripsi);
            $('#lokasiubah').val(lokasi);
            $('#nama_perusahaanubah').val(nama);
        });
    });
</script>
@endpush