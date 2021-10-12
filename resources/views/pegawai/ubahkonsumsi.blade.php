@extends('layouts.user' ,['activePage' => 'mybooking' , 'activeButton' => 'pesanruang','title'=>'Pesan ruang'])
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
            Ubah Konsumsi <small></small>
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
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="">Ubah Pesanan Konsumsi</a>

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
                            <span class="caption-subject font-red-sunglo bold uppercase">Daftar Konsumsi</span>

                        </div>

                    </div>
                    <form method="post" id="ubahkonsum" action="/ubahKonsum/{{$id_peminjaman}}/{{$tanggal}}/{{$id_ruang}}/{{$waktu}}">
                        @csrf
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <!--/row-->

                            <!--/row-->

                            <!--/row-->


                            <h3 class="form-section total">Konsumsi</h3>
                            <div class="row">

                                <div class="col-md-6">
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
                                                                @php $e=0; @endphp
                                                                @foreach ($pesan as $ps)
                                                                @if ($makanan->id_konsumsi == $ps->id_konsumsi)
                                                                @php $e=1; @endphp
                                                                <input name="{{$makanan->id_konsumsi}}" id="{{$makanan->harga}}" style="width: 5em" value="{{$ps->jumlahpesanan}}" type="number" min="0" step="1" class="form-control pesenan mx-auto" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                @endif
                                                                @endforeach
                                                                @if ($e==0)

                                                                <input name="{{$makanan->id_konsumsi}}" id="{{$makanan->harga}}" style="width: 5em" value="0" type="number" min="0" step="1" class="form-control pesenan mx-auto" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
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
                                                                @php $e=0; @endphp
                                                                @foreach ($pesan as $psn)
                                                                @if ($minuman->id_konsumsi == $psn->id_konsumsi)
                                                                @php $e=1; @endphp
                                                                <input name="{{$minuman->id_konsumsi}}" id="{{$minuman->harga}}" style="width: 5em" value="{{$psn->jumlahpesanan}}" type="number" min="0" step="1" class="form-control pesenan mx-auto" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                @endif
                                                                @endforeach
                                                                @if ($e==0)

                                                                <input name="{{$minuman->id_konsumsi}}" id="{{$minuman->harga}}" style="width: 5em" value="0" type="number" min="0" step="1" class="form-control pesenan mx-auto" integer aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6  ">


                                    <h3>
                                        <i class="w3-xxlarge fa fa-money "></i> Total
                                    </h3>
                                    @foreach($peminjaman as $peminjaman)
                                    <input type="number" class="form-control" value="{{$peminjaman->harga}}" disabled id="total">
                                    @endforeach


                                </div>
                            </div></br>
                        </div>
                        <div class="form-actions left">
                            <a type="button" data-toggle="modal" data-target="#booking" class="dev btn green text-white"> Ubah Konsumsi</a>
                            <a type="button" data-toggle="modal" data-target="#batalkonsum" class="dev btn yellow text-white"> Batalkan Pesanan</a>

                            <a class="btn red text-white dev" href="{{url()->previous()}}">Kembali</a>
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
<div class="modal fade" id="booking" tabindex="-1" role="batalkan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            </div>
            <div class="modal-body center">
                Apakah anda yakin ingin mengubah pesanan konsumsi?
            </div>
            <div class="modal-footer text-center">



                <a onclick='document.getElementById("ubahkonsum").submit();' class="dev text-white btn btn-round btn-primary" style="margin-right:10px ;"> {{ __('Ya') }} </a>

                <button class="btn btn-round btn-danger" class="close" data-dismiss="modal">Tidak</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="batalkonsum" tabindex="-1" role="batalkan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            </div>
            <div class="modal-body center">
                Apakah anda yakin ingin membatalkan semua konsumsi yang dipesan?
            </div>
            <div class="modal-footer text-center">



                <a href="/batalkonsum/{{$id_peminjaman}}/{{$id_ruang}}/{{$tanggal}}/{{$waktu}}" class="dev text-white btn btn-round btn-primary" style="margin-right:10px ;"> {{ __('Ya') }} </a>

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