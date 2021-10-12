@extends('layouts.app', ['activePage' => 'jadwal', 'title' => 'Jadwal Peminjaman Ruangan', 'navName' => 'Table List', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Pemakaian Ruangan</h4>

                        <p class="card-category"></p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Ruang</th>
                                <th>Tanggal</th>
                                <th>Waktu Pinjam</th>
                                <th>Waktu Selesai</th>

                                <th></th>
                            </thead>
                            <tbody>
                                @php $e=1; @endphp
                                @foreach($pinjam as $pinjam)
                                @if ($pinjam->approval == 0)
                                @if(\Carbon\Carbon::parse($pinjam->tanggal)->gte($today))
                                <tr>
                                    <td>{{$e}}</td> @php $e++; @endphp
                                    <td>{{$pinjam->nama_user}}</td>
                                    <td>{{$pinjam->departemen}}</td>
                                    <td>{{$pinjam->nama_ruang}}</td>

                                    <td>{{date('d-m-Y', strtotime($pinjam->tanggal))}}</td>
                                    <td>{{$pinjam->waktupinjam}}</td>
                                    <td>{{$pinjam->waktuselesai}}</td>

                                    <td><a class="btn  btn-success" onclick="return confirm('Apakah yakin ingin menerima izin booking?')" href="/terimabook/{{$pinjam->id_peminjaman}}">Terima</a>
                                        <div class=" divider">
                                        </div>
                                        <a class="btn  btn-danger" onclick="return confirm('Apakah yakin ingin menolak izin booking?')" href="/tolakbook/{{$pinjam->id_peminjaman}}">Tolak</a>
                                    </td>

                                </tr>

                                @endif




                                @elseif($pinjam->approval == 1 )
                                @if(\Carbon\Carbon::parse($pinjam->tanggal)->gte($today))
                                <tr>
                                    <td>{{$e}}</td>@php $e++; @endphp
                                    <td>{{$pinjam->nama_user}}</td>
                                    <td>{{$pinjam->departemen}}</td>
                                    <td>{{$pinjam->nama_ruang}}</td>

                                    <td>{{date('d-m-Y', strtotime($pinjam->tanggal))}}</td>
                                    <td>{{$pinjam->waktupinjam}}</td>
                                    <td>{{$pinjam->waktuselesai}}</td>

                                    <td><a class="btn  btn-danger" onclick="return confirm('Apakah yakin ingin menghapus booking?')" href="/deletejadwal/{{$pinjam->id_peminjaman}}/{{{Auth::user()->id_perusahaan}}}" style="color:red;">Hapus</a>

                                    </td>

                                </tr>
                                @endif
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
@endsection