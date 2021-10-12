@extends('layouts.user' ,['activePage' => 'bookruang' , 'activeButton' => 'pesanruang','title'=>'Pesan ruangan'])
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
            Peminjaman ruang <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/pesanruang">Pesan ruang</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->



        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-equalizer font-red-sunglo"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">Kriteria Ruang Pertemuan</span>

                        </div>

                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="/cariRuangan" method="GET" class="horizontal-form">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Waktu Pemakaian</label>
                                            <div class="input-group">
                                                <input type="time" value="{{$wktawal}}" name="wkt_awal" id="waktu" class="form-control display-inline-block">

                                            </div>
                                            <span class="help-block">
                                                *06.30 - 21.00 </span>
                                        </div>
                                        @if ($errors->get('wkt_awal'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Harap isi waktu awal pemakaian ruangan.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Waktu Selesai</label>
                                            <div class="input-group">
                                                <input type="time" name="wkt_akhir" value="{{$wktakhir}}" id="waktuu" class="form-control display-inline-block">

                                            </div>
                                            <span class="help-block">
                                                *06.30 - 21.00 </span>
                                        </div>
                                        @if ($errors->get('wkt_akhir'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Harap isi waktu akhir dari pemakaian ruangan.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">

                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Pemakaian</label>
                                            <input type="date" value="{{$tanggal}}" class="form-control" name="tanggal" placeholder="dd/mm/yyyy">
                                        </div>
                                        @if ($errors->get('tanggal'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Harap pilih tanggal terlebih dahulu / Tanggal yang dipilih tidak boleh sebelum hari ini.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>

                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Gedung</label>
                                            <select class="form-control " name="gedung" style="min-height: 35px;">

                                                @foreach($gdg as $gdg)
                                                @if ($gdg->id_gedung == $gedung)
                                                <option selected value="{{$gdg->id_gedung}}">{{$gdg->gedung}}</option>
                                                @else
                                                <option value="{{$gdg->id_gedung}}">{{$gdg->gedung}}</option>
                                                @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        @if ($errors->get('gedung'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Harap pilih preferensi gedung untuk ruang pertemuan.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Kapasitas (orang)</label>
                                            <input type="number" value="{{$kapasitas}}" name="kapasitas" step="1" min="1" class="form-control">
                                        </div>
                                        @if ($errors->get('kapasitas'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Harap isi preferensi kapasitas ruang pertemuan.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mx-auto">Fasilitas</label>
                                            <div class="row">



                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        @if ($ac ==1 )
                                                        <input checked name="ac" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="ac">
                                                        @else
                                                        <input name="ac" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="ac">
                                                        @endif
                                                        <label class="form-check-label icheck" for="ac">
                                                            AC (Air Conditioner)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        @if ($infocus==1)
                                                        <input checked name="infocus" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="infocus">
                                                        @else
                                                        <input name="infocus" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="infocus">
                                                        @endif
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Infocus (Proyektor)
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        @if ($whiteboard ==1)
                                                        <input checked name="whiteboard" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="whiteboard">
                                                        @else
                                                        <input name="whiteboard" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="whiteboard">
                                                        @endif
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Whiteboard
                                                        </label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <!--/span-->
                                </div>
                                <!--/row-->

                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group"><label for="textarea-input">Lainnya </label><textarea value="{{$fasilitas}}" class="form-control" id="textarea-input" name="fasilitas"></textarea></div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions left">

                                <button type="submit" class="btn red"> Cari Ruangan</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

            <!-- END SAMPLE TABLE PORTLET-->

        </div>
        <!-- END PAGE CONTENT-->

    </div>
    <div class="page-content">
        <div class="col-md-12 mx-auto">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-comments"></i>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="col-md-4">

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
                                @php $e = 0; $x=0; @endphp
                                @foreach($ruang as $ruang)
                                @php $x=0; @endphp
                                @foreach($filter1 as $filter)
                                @if ($filter->id_ruang == $ruang->id_ruang)
                                @php $x=1; @endphp
                                @endif

                                @endforeach
                                @foreach($filter2 as $filter)
                                @if ($filter->id_ruang == $ruang->id_ruang)
                                @php $x=1; @endphp
                                @endif
                                @endforeach
                                @foreach($filter3 as $filter)
                                @if ($filter->id_ruang == $ruang->id_ruang)
                                @php $x=1; @endphp
                                @endif
                                @endforeach
                                @foreach($filter4 as $filter)
                                @if ($filter->id_ruang == $ruang->id_ruang)
                                @php $x=1; @endphp
                                @endif
                                @endforeach


                                @if ($x==0)
                                @php $e++; @endphp
                                <tr>
                                    <td>
                                        {{$e}}
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
                                    <td class="center">
                                        @if ($ruang->approve==1)

                                        <button type="button" class="btn grey">Perlu disetujui</button>
                                        @endif
                                        <a type="button" href="/prosespesan/{{$ruang->id_ruang}}/{{$wktawal}}/{{$wktakhir}}/{{$tanggal}}" class="btn red">Pesan ruangan</a>
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                                @if ($e==0)
                                <tr>
                                    <td class="center alert-warning" colspan="10">
                                        <b>
                                            Tidak ditemukan ruangan sesuai kriteria yang diinginkan
                                        </b>
                                    </td>
                                </tr>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>


    </div>
</div>
</div>
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        ComponentsPickers.init();
    });
</script>
@endsection