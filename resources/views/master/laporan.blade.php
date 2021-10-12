@extends('layouts.app', ['activePage' => 'laporan', 'title' => 'Laporan Pemakaian Ruangan', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="card-header">
        <h4>Laporan Harian</h4>

    </div>
    <div class="card-body mt-5">
        <form method="POST" action="/showLaporanMaster">
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
            <a href="/cetak_pdf_tgl_master/{{$tanggal1}}/{{$tanggal2}}/{{$perusahaanpilih}}" target="_blank" class="btn btn-success animation-on-hover">Cetak</a>
            @else
            <a href="" onclick="this.href='/cetak_pdf_tgl_master/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('gedung').value" target="_blank" class="btn btn-success animation-on-hover dev">Cetak</a>
            @endif
        </form>
    </div>
    @if ($tabel != 'belum')
    <div class="row">
        <div class="col-md-12 mx-auto ">
            <div class="card strpied-tabled-with-hover">

                <div class="card-header ">
                    <h4 class="card-title">Laporan Pemakaian Ruangan</h4>

                </div>

                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th scope="col">No.</th>
                            <th scope="col">Perusahaan</th>

                            <th scope="col">Ruang</th>
                            <th scope="col">Gedung</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu Pakai</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Departemen</th>
                            <th>Keperluan</th>
                        </thead>
                        <tbody>
                            @php $e=0;@endphp
                            @foreach ($tabel as $peminjaman)
                            @php $e++; @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$peminjaman->nama_perusahaan}}</td>
                                <td>{{$peminjaman->nama_ruang}}</td>
                                <td>{{$peminjaman->gedung}}</td>
                                <td>{{date('d-m-Y', strtotime($peminjaman->tanggal))}}</td>
                                <td>{{$peminjaman->waktupinjam }}</td>
                                <td>{{$peminjaman->waktuselesai }}</td>
                                <td>{{$peminjaman->nama_user }}</td>
                                <td>{{$peminjaman->departemen }}</td>
                                <td>{{$peminjaman->keperluan}}</td>
                            </tr>
                            @endforeach
                            @if ($e==0)
                            <tr>

                                <td style="text-align: center;" colspan="10">Tidak ada pemakaian ruang pertemuan pada tanggal yang dicari.</td>
                                <td style="width: 1px;"></td>
                            </tr>@endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endif
</div>
@endsection