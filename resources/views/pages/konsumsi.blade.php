@extends('layouts.app', ['activePage' => 'konsumsi', 'title' => 'Daftar Konsumsi Perusahaan', 'activeButton' => 'konsumsi'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Makanan</h4>
                        <p class="card-category"><button type="button" class="btn btn-primary btn-md btn-modal btn-round" data-toggle="modal" data-target="#myModal" style="margin-top:20px; margin-bottom:10px;">Tambahkan Makanan +</button></p>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Makanan</th>

                                <th>Harga</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($konsumsi as $konsumsi)
                                @if ($konsumsi->jenis== "Makanan")
                                <tr>
                                    <td scope="row">{{$i}}</td>
                                    <td>{{$konsumsi->konsumsi}}</td>


                                    <td>Rp. {{number_format($konsumsi->harga,0)}}</td>

                                    <td><a class="btn  btn-danger btn-round" href="/deletekonsumsi/{{$konsumsi->id_konsumsi}}" onclick="return confirm('Apakah anda yakin ingin menghapus data makanan ?')">Hapus</a>
                                        <div class="divider"></div>
                                        <button type="button" class="btn btn-success btn-md btn-modal btn-round ubah-konsumsi" data-id="{{$konsumsi->id_konsumsi}}" data-harga="{{$konsumsi->harga}}" data-nama="{{$konsumsi->konsumsi}}" data-toggle="modal" data-target="#ubah">Ubah</button>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Minuman</h4>
                        <p class="card-category"><button type="button" class="btn btn-primary btn-md btn-modal btn-round" data-toggle="modal" data-target="#myModalMinuman" style="margin-top:20px; margin-bottom:10px;">Tambahkan Minuman +</button></p>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Makanan</th>

                                <th>Harga</th>

                                <th></th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($minum as $minum)
                                @if ($minum->jenis== "Minuman")
                                <tr>
                                    <td scope="row">{{$i}}</td>
                                    <td>{{$minum->konsumsi}}</td>

                                    <td>Rp. {{number_format($minum->harga,0)}}</td>
                                    <td><a class="btn  btn-danger btn-round" href="/deletekonsumsi/{{$minum->id_konsumsi}}" onclick="return confirm('Apakah anda yakin ingin menghapus data minuman ?')">Hapus</a>
                                        <div class="divider"></div>
                                        <button type="button" class="btn btn-success btn-md btn-modal btn-round ubah-konsumsi" data-id="{{$minum->id_konsumsi}}" data-harga="{{$minum->harga}}" data-nama="{{$minum->konsumsi}}" data-toggle="modal" data-target="#ubah">Ubah</button>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endif
                                @endforeach
                            </tbody>
                        </table>
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
                                        <h4 class="card-title mt-2">Penambahan Makanan</h4>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">

                                    <form method="POST" action="/tambahmakanan">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Makanan</span>
                                            </div>
                                            <input name="konsumsi" id="konsumsi" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Harga (Rp)</span>
                                            </div>
                                            <input name="harga" id="harga" type="number" min="500" step="500" class="form-control form-inline" width="20%;" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>

                                        </div>

                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data konsumsi makanan?')" class="btn btn-primary btn-round">Tambah</button>
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
<div class="modal fade" id="myModalMinuman" role="dialog">
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
                                        <h4 class="card-title mt-2">Penambahan Minuman</h4>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">

                                    <form method="POST" action="/tambahminuman">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Minuman</span>
                                            </div>
                                            <input name="konsumsi" id="konsumsi" type="text"  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Harga (Rp)</span>
                                            </div>
                                            <input name="harga" id="harga" type="number" min="500" step="500" class="form-control form-inline" width="20%;" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>

                                        </div>

                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data konsumsi minuman?')" class="btn btn-primary btn-round">Tambah</button>
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
<div class="modal fade" id="ubah" role="dialog">
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
                                        <h4 class="card-title mt-2">Pengubahan Data Konsumsi</h4>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">

                                    <form method="POST" action="" id="ubahKonsumsi">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Minuman</span>
                                            </div>
                                            <input name="konsumsi" id="konsumsiubah" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Harga (Rp)</span>
                                            </div>
                                            <input name="harga" id="hargaubah" type="number" min="500" step="500" class="form-control form-inline" width="20%;" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>

                                        </div>

                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin mengubah data konsumsi ?')" class="btn btn-primary btn-round">Ubah</button>
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
    $(document).ready(function() {
        // For A Delete Record Popup
        $('.ubah-konsumsi').click(function() {
            var id = $(this).attr('data-id');
            var harga = $(this).attr('data-harga') ;
            var nama = $(this).attr('data-nama');


            $("#ubahKonsumsi").attr('action', 'ubahkonsumsi/' + id);
            $('#konsumsiubah').val(nama);
            $('#hargaubah').val(harga);
        });
    });
</script>
@endpush