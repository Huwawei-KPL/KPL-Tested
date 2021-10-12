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
                                                <input type="time" name="wkt_awal" id="waktu" class="form-control display-inline-block">

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
                                                <input type="time" name="wkt_akhir" id="waktuu" class="form-control display-inline-block">

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
                                            <input type="date" class="form-control" name="tanggal" placeholder="dd/mm/yyyy">
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
                                                <option value="">Pilih Gedung</option>
                                                @foreach($gedung as $gedung)
                                                <option value="{{$gedung->id_gedung}}">{{$gedung->gedung}}</option>
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
                                            <input type="number" name="kapasitas" step="1" min="1" class="form-control">
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
                                                        <input name="ac" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="ac">
                                                        <label class="form-check-label icheck" for="ac">
                                                            AC (Air Conditioner)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input name="infocus" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="infocus">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Infocus (Proyektor)
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input name="whiteboard" class="form-check-input icheck" data-checkbox="icheckbox_flat-red" type="checkbox" value="1" id="whiteboard">
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
                                        <div class="form-group"><label for="textarea-input">Lainnya </label><textarea class="form-control" id="textarea-input" name="fasilitas"></textarea></div>
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