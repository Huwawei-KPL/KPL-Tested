@extends('layouts.user' ,['activePage' => 'rekapruang' , 'activeButton' => 'ruangpertemuan','title'=> 'Rekap ruang pertemuan'])
@section('classbody')
page-quick-sidebar-over-content
@endsection
<!--buat page content, dipaling bawah tambah </div> -->
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">
            Rekap Ruangan <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/rekapruang">Jadwal Ruangan</a>
                </li>
            </ul>

        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">

                <div class="portlet box yellow ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-university"></i>Set Tanggal dan Gedung
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" method="POST" role="form" action="/showRekap" id="formjadwalruang">
                            @csrf
                            <div class="form-body">


                                <div class="form-group">
                                    <label class="col-md-3  control-label">Gedung</label>
                                    <div class="col-md-9" style="margin-bottom: 10px;">
                                        <select style="vertical-align:middle; min-height:35px; max-width:70%" class="form-control" name="gedung" id="gedung">
                                            <option value="semua">Semua Gedung</option>
                                            @foreach($gedung as $gedung)

                                            @if ($gedung->id_gedung == $id_gedung)

                                            <option selected value="{{$gedung->id_gedung}}">{{$gedung->gedung}}</option>
                                            @else
                                            <option value="{{$gedung->id_gedung}}">{{$gedung->gedung}}</option>
                                            @endif

                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Awal</label>
                                    <div class="col-md-9" style="margin-bottom: 10px;">

                                        @if ($tanggal1=='belum')
                                        <input type="date" name="tanggal1" value="{{$tanggal}}" id="date_awal" class="form-control" required style="max-width:305px;">
                                        @else
                                        <input type="date" name="tanggal1" value="{{$tanggal1}}" id="date_awal" class="form-control" required style="max-width:305px;">
                                        @endif

                                    </div>


                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Akhir</label>
                                    <div class="col-md-9" style="margin-bottom: 10px;">

                                        @if ($tanggal1=='belum')
                                        <input type="date" name="tanggal2" value="{{$tanggal}}" id="date_akhir" class="form-control" style="max-width:305px;" required>
                                        @else
                                        <input type="date" name="tanggal2" value="{{$tanggal2}}" id="date_akhir" class="form-control" style="max-width:305px;" required>
                                        @endif

                                    </div>


                                </div>
                            </div>
                            <div class="form-actions right1">

                                <button type="submit" class="btn green">Lihat Rekap</button>
                                @if ($tanggal1 !='belum')
                                <a href="/cetak_pdf_user/{{$tanggal1}}/{{$tanggal2}}/{{$id_gedung}}" target="_blank" class="btn btn-success animation-on-hover yellow">Cetak</a>
                                @else
                                <a href="" onclick="this.href='/cetak_pdf_user/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('gedung').value" target="_blank" class="btn btn-success animation-on-hover dev yellow">Cetak</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ($tabel !='belum')
            <div class="col-md-8 mx-auto">
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-university"></i>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>

                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Ruang</th>
                                        <th scope="col">Gedung</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu Pakai</th>
                                        <th scope="col">Waktu Selesai</th>
                                        <th>
                                            Keperluan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $e=0; @endphp
                                    @foreach ($tabel as $peminjaman)
                                    @php $e++; @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$peminjaman->nama_ruang}}</td>
                                        <td>{{$peminjaman->gedung}}</td>
                                        <td>{{date('d-m-Y', strtotime($peminjaman->tanggal))}}</td>
                                        <td>{{$peminjaman->waktupinjam }}</td>
                                        <td>{{$peminjaman->waktuselesai }}</td>
                                        <td>{{$peminjaman->keperluan}}</td>

                                    </tr>
                                    @endforeach
                                    @if ($e==0)
                                    <tr>

                                        <td style="text-align: center;" colspan="7"><b>Tidak ada pemakaian ruang pertemuan pada tanggal yang dicari.</b></td>

                                    </tr>@endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            @endif


        </div>
    </div>
</div>
@endsection