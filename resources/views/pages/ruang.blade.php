@extends('layouts.app', ['activePage' => 'ruang', 'title' => 'Daftar Ruang Pertemuan Perusahaan', 'activeButton' => 'kelola'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">

                    <div class="card-header">
                        <h4 class="card-title">Daftar ruangan</h4>
                        <a class="mr-0" href="/addruangan/{{{Auth::user()->id_perusahaan}}}" style="float:right;" class="btn  btn-primary btn-round">Tambahkan Event +</a>
                    </div>

                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Ruang</th>
                                <th>Lantai</th>
                                <th>Kapasitas</th>
                                <th>Luas Ruangan</th>
                                <th>Gedung</th>
                                <th>Fasilitas</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($ruang as $ruang)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$ruang->nama_ruang}}</td>
                                    <td>{{$ruang->lantai}}</td>
                                    <td>{{$ruang->kapasitas}} orang</td>
                                    <td>{{$ruang->luas}} m2</td>
                                    <td>{{$ruang->gedung}}</td>
                                    <td>
                                        @if ($ruang->ac==1)
                                        AC
                                        @endif
                                        @if ($ruang->infocus==1)
                                        @if ($ruang->ac==1)
                                        {{ ", Infocus"}}
                                        @else {{"Infocus"}}
                                        @endif
                                        @endif
                                        @if ($ruang->whiteboard==1)
                                        @if($ruang->infocus==1 || $ruang->ac ==1 )
                                        {{", Whiteboard (Papan Tulis)"}}
                                        @else {{"Whiteboard (Papan Tulis)"}}
                                        @endif
                                        @endif
                                        @if ($ruang->fasilitas != NULL)
                                        @if($ruang->infocus==1 || $ruang->ac ==1 || $ruang->whiteboard==1)

                                        , {{$ruang->fasilitas}}
                                        @else
                                        {{$ruang->fasilitas}}
                                        @endif
                                        @endif

                                    </td>

                                    <td><a class="btn  btn-danger btn-round" onclick="return confirm('Apakah yakin ingin menghapus data ruangan?')" href="/deleteruang/{{$ruang->id_ruang}}/{{{Auth::user()->id_perusahaan}}}" style=" margin-right:20;">Hapus</a>
                                        <div class="divider"></div>
                                        <a class="btn  btn-danger btn-round" href="/ubahruang/{{$ruang->id_ruang}}/{{{Auth::user()->id_perusahaan}}}">Ubah</a>
                                        @if ($ruang->approve==1)
                                        <div class="divider"></div>
                                        <button class="btn btn-round btn-primary" disabled>Perlu Disetujui</button>
                                        @endif
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