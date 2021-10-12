@extends('layouts.app', ['activePage' => 'jadwalkonsumsi', 'title' => 'Jadwal Peminjaman Ruangan', 'navName' => 'Table List', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Pemesanan Konsumsi Ruang Pertemuan</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Ruang</th>
                                <th>Gedung</th>
                                <th>Pesanan</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>User</th>




                            </thead>
                            <tbody>
                                @php $e=0 @endphp
                                @foreach($pinjam as $pinjam)

                                @if ($pinjam->approval == 1 )
                                @if(\Carbon\Carbon::parse($pinjam->tanggal)->gte($today))
                                @php $e++; @endphp
                                <tr>
                                    <td>{{$e}}</td>
                                    <td>{{$pinjam->nama_ruang}}</td>
                                    <td>{{$pinjam->gedung}}</td>

                                    <td>{{$pinjam->pesanan}}<br>
                                        Total =
                                        Rp {{number_format($pinjam->harga,0)}}
                                    </td>
                                    <td>{{$pinjam->waktupinjam}}</td>
                                    <td>{{date('d-m-Y', strtotime($pinjam->tanggal))}}</td>
                                    <td>{{$pinjam->nama_user}}</td>
                                    <td></td>

                                </tr>

                                @endif
                                @endif

                                @endforeach
                                @if ($e==0)
                                <tr>
                                    <td style="text-align:center;" colspan="7">Tidak ada jadwal untuk pesanan konsumsi</td>
                                    <td></td>



                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection