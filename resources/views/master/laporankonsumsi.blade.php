@extends('layouts.app', ['activePage' => 'laporank', 'title' => 'Laporan Pemakaian Ruangan', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="card-header">
        <h4>Laporan Harian Konsumsi</h4>

    </div>
    <div class="card-body mt-5">
        <form action="/showLaporanMasterKonsumsi" method="post">
            @csrf
            <div class="form-group">
                <span class="input-group-text" id="inputGroup-sizing-sm">Pilih Perusahaan</span>
                <select name="perusahaan" id="gedung" class="form-control">

                    <option value="semua">Semua Perusahaan</option>
                    @foreach($perusahaan as $perusahaan)

                    @if ($perusahaan->id_perusahaan == $perusahaanpilih)

                    <option selected value="{{$perusahaan->id_perusahaan}}">{{$perusahaan->nama_perusahaan}}</option>
                    @else
                    <option value="{{$perusahaan->id_perusahaan}}">{{$perusahaan->nama_perusahaan}}</option>
                    @endif

                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="label">Tanggal Awal</label>
                @if ($tanggal1=='belum')
                <input type="date" name="tanggal1" value="{{$tanggal}}" id="date_awal" class="form-control" required>
                @else
                <input type="date" name="tanggal1" value="{{$tanggal1}}" id="date_awal" class="form-control" required>
                @endif
            </div>
            <div class="form-group">
                <label for="label">Tanggal Akhir</label>
                @if ($tanggal2=='belum')
                <input type="date" name="tanggal2" value="{{$tanggal}}" id="date_akhir" class="form-control" required>
                @else
                <input type="date" name="tanggal2" value="{{$tanggal2}}" id="date_akhir" class="form-control" required>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Lihat Laporan</button>
            @if ($tanggal1!= 'belum')
            <a href="/cetak_konsumsi/{{$tanggal1}}/{{$tanggal2}}/{{$perusahaanpilih}}" target="_blank" class="btn btn-success animation-on-hover">Cetak</a>
            @else
            <a href="" onclick="this.href='/cetak_konsumsi/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('gedung').value" target="_blank" class="btn btn-success animation-on-hover dev">Cetak</a>
            @endif
        </form>
    </div>
    @if ($tabel != 'belum')
    <div class="row">
        <div class="col-md-12 mx-auto ">
            <div class="card strpied-tabled-with-hover">

                <div class="card-header ">
                    <h4 class="card-title">Laporan Konsumsi Ruangan</h4>

                </div>

                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Ruang</th>
                            <th>Gedung</th>
                            <th>Pesanan</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>User</th>
                        </thead>
                        <tbody>
                            @php $e=0; @endphp
                            @foreach ($tabel as $pinjam)
                            @php $e++; @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$pinjam->nama_perusahaan}}</td>
                                <td>{{$pinjam->nama_ruang}}</td>
                                <td>{{$pinjam->gedung}}</td>
                                <td>{{$pinjam->pesanan}}
                                    @if ($pinjam->harga >= 1)
                                    <br>
                                    Total = Rp {{number_format($pinjam->harga,0)}}
                                    @else($pinjam->harga == 0)
                                    -


                                    @endif
                                </td>
                                <td>{{$pinjam->waktupinjam }}</td>
                                <td>{{date('d-m-Y', strtotime($pinjam->tanggal))}}</td>
                                <td>{{$pinjam->nama_user }}</td>

                            </tr>
                            @endforeach
                            @if ($e==0)
                            <tr>

                                <td style="text-align: center;" colspan="8">Tidak ada pemesanan konsumsi ruang pertemuan pada tanggal yang dicari.</td>
                                <td style="width: 1px;"></td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endif
</div>
@endsection