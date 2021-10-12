@extends('layouts.app', ['activePage' => 'laporan', 'title' => 'Laporan Pemakaian Ruangan', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="card-header">
        <h4>Laporan Harian</h4>

    </div>
    <div class="card-body mt-5">
        <form action="/laporanshow" method="post">
            @csrf
            <div class="form-group">
                <span class="input-group-text" id="inputGroup-sizing-sm">Pilih Gedung</span>
                <select name="gedung" id="gedung" class="form-control">

                    <option value="semua">Semua Gedung</option>
                    @foreach($gedung as $gedung)

                    @if ($gedung->id_gedung == $gedungpilih)

                    <option selected value="{{$gedung->id_gedung}}">{{$gedung->gedung}}</option>
                    @else
                    <option value="{{$gedung->id_gedung}}">{{$gedung->gedung}}</option>
                    @endif

                    @endforeach
                </select>

            </div>
            <div class="form-group">
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
                @if ($tanggal1 !='belum')
                <a href="/showDataFrekuensi/{{$tanggal1}}/{{$tanggal2}}/{{$gedungpilih}}" class="btn btn-primary animation-on-hover">Frekuensi Pemakaian Ruangan</a>
                @else
                <a href="" onclick="this.href='/showDataFrekuensi/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('gedung').value" class="btn btn-primary animation-on-hover dev">Frekuensi Pemakaian Ruangan</a>
                @endif
                @if ($tanggal1 !='belum')
                <a href="/cetak_pdf_tgl/{{$tanggal1}}/{{$tanggal2}}/{{$gedungpilih}}" target="_blank" class="btn btn-success animation-on-hover">Cetak Laporan</a>
                @else
                <a href="" onclick="this.href='/cetak_pdf_tgl/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('gedung').value" target="_blank" class="btn btn-success animation-on-hover dev">Cetak Laporan</a>
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
                            @php $e=0; @endphp
                            @foreach ($tabel as $peminjaman)
                            @php $e++; @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$peminjaman->nama_ruang}}</td>
                                <td>{{$peminjaman->gedung}}</td>
                                <td>{{$peminjaman->tanggal }}</td>
                                <td>{{$peminjaman->waktupinjam }}</td>
                                <td>{{$peminjaman->waktuselesai }}</td>
                                <td>{{$peminjaman->nama_user }}</td>
                                <td>{{$peminjaman->departemen }}</td>
                                <td>{{$peminjaman->keperluan}}</td>
                            </tr>
                            @endforeach
                            @if ($e==0)
                            <tr>

                                <td style="text-align: center;" colspan="9">Tidak ada pemakaian ruang pertemuan pada tanggal yang dicari.</td>
                                <td style="width: 1px;"></td>
                            </tr>@endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endif
    @if ($frek != 'belum')
    <div class="row">
        <div class="col-md-5 mx-auto ">
            <div class="card strpied-tabled-with-hover">

                <div class="card-header ">
                    <h4 class="card-title">Data Pemakaian Ruangan</h4>

                </div>

                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Ruang</th>

                            <th>Lama Dipakai (menit)</th>

                        </thead>
                        <tbody>
                            @php $e=1; @endphp
                            @foreach ($frek as $frek)
                            <tr>
                                <td>{{ $e }}</td>
                                @php $e++; @endphp
                                <td>{{$frek->nama_ruang}}</td>

                                <td>{{$frek->menit}}</td>

                            </tr>
                            @endforeach
                            @foreach ($ruang as $ruang)
                            <tr>
                                <td>{{ $e }}</td>
                                @php $e++; @endphp
                                <td>{{$ruang->nama_ruang}}</td>

                                <td>0</td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endif
</div>
</div>
@endsection