@extends('layouts.app', ['activePage' => 'ruang', 'title' => 'Daftar Perusahaan', 'activeButton' => 'perusahaan'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">

                    <div class="card-header ">
                        <h4 class="card-title">Daftar Perusahaan</h4>
                        <a href="/addruangan/{{{Auth::user()->id_perusahaan}}}" class="btn  btn-primary btn-round" style="margin-top:20px; margin-bottom:10px;">Tambahkan Perusahaan +</a>
                    </div>

                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Deskripsi</th>
                                <th>Logo</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($perusahaan as $perusahaan)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$perusahaan->nama_perusahaan}}</td>
                                    <td>{{$perusahaan->lokasi}}</td>
                                    <td>{{$perusahaan->deskripsi}} </td>
                                    <td>-</td>
                                    <td><a class="btn  btn-danger btn-round" onclick="return confirm('Apakah yakin ingin menghapus data ruangan?')" href="/deleteruang/{{$ruang->id_ruang}}/{{{Auth::user()->id_perusahaan}}}" style=" margin-right:20;">Hapus</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahruang/{{$ruang->id_ruang}}/{{{Auth::user()->id_perusahaan}}}">Ubah</a>
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