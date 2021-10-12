@extends('layouts.app', ['activePage' => 'gedung', 'title' => 'Daftar Gedung Perusahaan', 'activeButton' => 'kelola'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar gedung</h4>
                        <p class="card-category"></p>
                        <a href="/addgedung" class="btn  btn-primary btn-round" style="margin-top:20px; margin-bottom:10px;">Tambahkan gedung +</a>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Gedung</th>
                                <th>Jumlah Lantai</th>
                                <th>Jumlah Ruangan</th>
                                <th>Lokasi</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($gedung as $gedung)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$gedung->gedung}}</td>
                                    <td>{{$gedung->jml_lantai}}</td>
                                    <td>{{$gedung->jml_ruangan}}</td>
                                    <td>{{$gedung->lokasi}}</td>
                                    <td><a class="btn  btn-danger btn-round" style=" margin-right:20;" href="/deletegedung/{{$gedung->id_gedung}}/{{{Auth::user()->id_perusahaan}}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahgedung/{{$gedung->id_gedung}}">Ubah</a>
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
@endsection