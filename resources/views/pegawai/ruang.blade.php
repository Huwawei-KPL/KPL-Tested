@extends('layouts.user' ,['activePage' => 'daftarruang' , 'activeButton' => 'ruangpertemuan','title'=>'Daftar ruang pertemuan'])
@section('classbody')
page-quick-sidebar-over-content
@endsection
<!--buat page content, dipaling bawah tambah </div> -->

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN STYLE CUSTOMIZER -->
        <!-- END STYLE CUSTOMIZER -->
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Daftar Ruangan <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/daftarruangan/semua">Daftar Ruangan</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->



        <div class="row">
            <div class="col-md-11 mx-auto">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box purple">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-building"></i>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="col-md-4">
                            <div class="form-group">

                                <form method="POST" action="" id="filterroomform">
                                    @csrf
                                    <div class="col-md-4 form-group">
                                        <select class="form-control input-medium " style="min-height: 35px; margin-bottom:10px;" id="filterroom" data-placeholder="Select...">
                                            @if ($gedungfilter == 'semua')
                                            <option value="semua" selected>Semua Gedung</option>
                                            @else
                                            <option value="semua">Semua Gedung</option>
                                            @endif
                                            @foreach($gedung as $gedung)
                                            @if ($gedung->id_gedung == $gedungfilter)
                                            <option selected value="{{$gedung->id_gedung}}">Gedung {{$gedung->gedung}}</option>
                                            @else
                                            <option value="{{$gedung->id_gedung}}">Gedung {{$gedung->gedung}}</option>
                                            @endif
                                            @endforeach


                                        </select>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Ruangan
                                        </th>
                                        <th>
                                            Gedung
                                        </th>
                                        <th>
                                            Kapasitas
                                        </th>
                                        <th>
                                            Luas
                                        </th>
                                        <th style="text-align: center;">
                                            AC
                                        </th>
                                        <th style="text-align: center;">Infocus</th>
                                        <th style="text-align: center;">Whiteboard</th>
                                        <th>Lainnya</th>
                                        <th style="text-align: center;">Foto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ruang as $ruang)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$ruang->nama_ruang}}
                                        </td>
                                        <td>
                                            {{$ruang->gedung}}
                                        </td>
                                        <td>
                                            {{$ruang->kapasitas}} Orang
                                        </td>
                                        <td>
                                            {{$ruang->luas}}&#x33A1;
                                        </td>
                                        @if ($ruang->ac ==1 )
                                        <td style="text-align: center;"><i class="fa fa-check"></i></td>
                                        @else
                                        <td style="text-align: center;"><i class="fa fa-times-circle"></td>
                                        @endif
                                        @if ($ruang->infocus ==1 )
                                        <td style="text-align: center;"><i class="fa fa-check"></i></td>
                                        @else
                                        <td style="text-align: center;"><i class="fa fa-times-circle"></td>
                                        @endif
                                        @if ($ruang->whiteboard ==1 )
                                        <td style="text-align: center;"><i class="fa fa-check"></i></td>
                                        @else
                                        <td style="text-align: center;"><i class="fa fa-times-circle"></td>
                                        @endif
                                        @if ($ruang->fasilitas == null)
                                        <td>
                                            -
                                        </td>
                                        @else
                                        <td>{{$ruang->fasilitas}}</td>
                                        @endif
                                        @if ($ruang->foto != null)
                                        <td style="text-align: center;">
                                            <img style="max-height:125px;" class="showfoto" id="{{$ruang->id_ruang}}" onclick="fotoTutup({{$ruang->id_ruang}});" src="{{ asset('storage/assets/img/perusahaan/ruangan/'.$ruang->foto) }}">

                                            <button type="button" class="btn purple " id="buttons{{$ruang->id_ruang}}" onclick="fotoShow({{$ruang->id_ruang}});"><i class="fa fa-search"></i>Lihat Foto</button>



                                        </td>   
                                        @else
                                        <td style="text-align: center;"> <button type="button" class="btn grey disabled">Tidak ada</button></td>
                                        @endif
                                        <td><a href="/jadwalruang/{{$ruang->id_ruang}}/{{$tanggal}}" class="btn green text-white">
                                                <i class="fa fa-calendar"></i> Jadwal </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" style="text-align: center;">
                                            Tidak ada ruang pertemuan di gedung ini
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

            <!-- END SAMPLE TABLE PORTLET-->

        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
</div>
@endsection