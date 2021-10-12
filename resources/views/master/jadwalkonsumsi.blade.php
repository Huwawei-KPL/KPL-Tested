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
                                <th>User</th>
                                <th>Tanggal</th>

                                <th>Perusahaan</th>


                            </thead>
                            <tbody>
                                @php $e=0; @endphp
                                @foreach($pinjam as $pinjam)
                                @if ($pinjam->approval == 1 )
                                @if(\Carbon\Carbon::parse($pinjam->tanggal)->gte($today))
                                @php $e++; @endphp
                                <tr>
                                    <td>{{$e}}</td>
                                    <td>{{$pinjam->nama_ruang}}</td>
                                    <td>{{$pinjam->gedung}}</td>
                                    <td>{{$pinjam->pesanan}}<br>
                                        Total = @if ($pinjam->harga != 0)

                                        Rp {{number_format($pinjam->harga,0)}}
                                        @else ($pinjam->harga == 0)
                                        -

                                        @endif</td>
                                    <td>{{$pinjam->waktupinjam}}</td>
                                    <td style="vertical-align:middle;">{{$pinjam->nama_user}}</td>
                                    <td>{{date('d-m-Y', strtotime($pinjam->tanggal))}}</td>
                                    <td>{{$pinjam->nama_perusahaan}}</td>
                                    <td></td>




                                    <!-- <td><a class="btn  btn-danger" onclick="return confirm('Apakah yakin ingin menghapus booking?')" href="/deletejadwal/{{$pinjam->id_peminjaman}}/{{{Auth::user()->id_perusahaan}}}" style="color:red;">Hapus</a></td> -->
                                </tr>

                                @endif
                                @endif
                                @endforeach
                                @if ($e==0)
                                <tr>
                                    <td style="text-align:center;" colspan="8">
                                        Tidak ada pesanan konsumsi terjadwal.
                                    </td>
                                    <td>

                                    </td>
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