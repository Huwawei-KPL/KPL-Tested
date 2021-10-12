@extends('layouts.user' ,['activePage' => 'bookruang' , 'activeButton' => 'pesanruang','title'=>'Pesan ruang'])
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
        @foreach($ruang as $ruang)
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/pesanruang">Pesan ruang</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="">{{$ruang->nama_ruang}}</a>

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
                        <form action="/userBook/{{$ruang->id_ruang}}/{{$ruang->approve}}" class="dev" id="formbook" method="POST" class="horizontal-form">
                            @csrf
                            <div class="form-body" style="margin-bottom:0px;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Ruang</label>
                                            <input type="text" value="{{$ruang->nama_ruang}}" readonly="readonly" class="form-control" name="tanggal" placeholder="dd/mm/yyyy">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Gedung</label>
                                            <input type="text" value="{{$ruang->gedung}}" readonly="readonly" class="form-control" name="tanggal" placeholder="dd/mm/yyyy">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Pemakaian</label>
                                            <input type="date" value="{{$tanggal}}" readonly="readonly" class="form-control" name="tanggal" placeholder="dd/mm/yyyy">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Waktu Pemakaian</label>
                                            <div class="input-group">
                                                @if ($asal =='book')
                                                <input type="time" value="{{$wktawal}}" readonly="readonly" name="wkt_awal" id="waktu" class="form-control display-inline-block">
                                                @else
                                                <input type="time" value="{{$wktawal}}" name="wkt_awal" id="waktu" class="form-control display-inline-block">
                                                @endif
                                            </div>
                                            <span class="help-block">
                                                *06.30 - 21.00 </span>
                                        </div>

                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Waktu Selesai</label>
                                            <div class="input-group">
                                                @if ($asal=='book')
                                                <input type="time" name="wkt_akhir" readonly="readonly" value="{{$wktakhir}}" id="waktuu" class="form-control display-inline-block">
                                                @else
                                                <input type="time" name="wkt_akhir" value="{{$wktakhir}}" id="waktuu" class="form-control display-inline-block">
                                                @endif

                                            </div>
                                            <span class="help-block">
                                                *06.30 - 21.00 </span>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Pesan Konsumsi</label>
                                            <select name="pesankonsumsi" style="min-height: 35px;" class="form-control pesankonsumsi">
                                                <option value="tidak">Tidak</option>
                                                <option value="ya">Ya</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="form-group">
                                            <label class="control-label center">Keperluan</label>
                                            <input class="form-control" type="text" id="keperluan" name="keperluan">
                                        </div>
                                        @if ($errors->get('keperluan'))
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="alert alert-danger">
                                                    <strong>Error!</strong> Harap isi terlebih dahulu keperluan pemakaian ruang pertemuan.
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                </div>
                                <!--/row-->

                                <!--/row-->

                                <!--/row-->


                                <h3 class="form-section total">Konsumsi</h3>
                                <div class="row">

                                    <div class="col-md-6" id="showMakanan">
                                        <div class="portlet">

                                            <div class="portlet-body">
                                                <div class="table-scrollable">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    No
                                                                </th>
                                                                <th class="hidden-xs">
                                                                    <i class="fa fa-cutlery"></i> Makanan
                                                                </th>
                                                                <th>
                                                                    Harga
                                                                </th>
                                                                <th><i class="fa fa-shopping-cart"></i> Jumlah
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($makanan as $makanan)
                                                            <tr>
                                                                <td class="centerr highlight">
                                                                    {{$loop->iteration}}
                                                                </td>
                                                                <td class="centerr hidden-xs">
                                                                    {{$makanan->konsumsi}}

                                                                </td>
                                                                <td class="centerr">
                                                                    {{number_format($makanan->harga,0)}}
                                                                </td>
                                                                <td>
                                                                    <input name="{{$makanan->id_konsumsi}}" id="{{$makanan->harga}}" style="width: 5em" value="0" type="number" min="0" step="1" class="form-control pesenan mx-auto" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6" id="showMinuman">
                                        <div class="portlet">

                                            <div class="portlet-body">
                                                <div class="table-scrollable">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    No
                                                                </th>
                                                                <th class=" hidden-xs">
                                                                    <i class="fa fa-beer"></i> Minuman
                                                                </th>
                                                                <th>
                                                                    Harga
                                                                </th>
                                                                <th><i class=" fa fa-shopping-cart"></i> Jumlah
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($minuman as $minuman)

                                                            <tr>
                                                                <td class="centerr highlight">
                                                                    {{$loop->iteration}}
                                                                </td>
                                                                <td class="centerr hidden-xs">
                                                                    {{$minuman->konsumsi}}
                                                                </td>
                                                                <td class="centerr">
                                                                    {{number_format($minuman->harga,0)}}

                                                                </td>
                                                                <td>
                                                                    <input name="{{$minuman->id_konsumsi}}" id="{{$minuman->harga}}" style="width: 5em" value="0" type="number" min="0" step="1" class="form-control pesenan mx-auto" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6  total">


                                        <h3>
                                            <i class="w3-xxlarge fa fa-money "></i> Total
                                        </h3>

                                        <input type="number" class="form-control" value="0" disabled id="total">


                                    </div>
                                </div></br>
                            </div>
                            <div class="form-actions left">
                                <a class="btn red text-white dev" href="{{url()->previous()}}">Kembali</a>
                                <a type="button" data-toggle="modal" data-target="#booking" class="dev btn red text-white"> Book Ruangan</a>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
            @endforeach
            <!-- END SAMPLE TABLE PORTLET-->

        </div>
        <!-- END PAGE CONTENT-->

    </div>

</div>
</div>
<div class="modal fade" id="booking" tabindex="-1" role="batalkan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            </div>
            <div class="modal-body center">
                Apakah anda yakin ingin memesan jadwal ruang pertemuan?
            </div>
            <div class="modal-footer text-center">



                <a onclick='document.getElementById("formbook").submit();' class="dev text-white btn btn-round btn-primary" style="margin-right:10px ;"> {{ __('Ya') }} </a>

                <button class="btn btn-round btn-danger" class="close" data-dismiss="modal">Tidak</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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