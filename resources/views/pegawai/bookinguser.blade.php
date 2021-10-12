@extends('layouts.user' ,['activePage' => 'mybooking' , 'activeButton' => 'pesanruang','title'=>'Pemesanan saya'])
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
                    <a href="/mybooking">Pemesanan saya</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->



        <div class="row">
            <div class="col-md-11 mx-auto">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-comments"></i>
                        </div>

                    </div>
                    <div class="portlet-body">
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
                                            Waktu Pakai
                                        </th>
                                        <th>
                                            Waktu Selesai
                                        </th>
                                        <th>Tanggal</th>
                                        <th class="center">*</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $e=0; @endphp
                                    @foreach($book as $book)
                                    @if(\Carbon\Carbon::parse($book->tanggal)->gte($today) && $book->approval != 2)
                                    @php $e++; @endphp
                                    <tr>
                                        <td class="centerr">
                                            {{$e}}
                                        </td>
                                        <td class="centerr">
                                            {{$book->nama_ruang}}
                                        </td>
                                        <td class="centerr">
                                            {{$book->gedung}}
                                        </td>
                                        <td class="centerr">
                                            {{$book->waktupinjam}}
                                        </td>
                                        <td class="centerr"> {{$book->waktuselesai}}</td>
                                        <td class="centerr">{{date('d-m-Y', strtotime($book->tanggal))}}</td>
                                        <td class="center">
                                            <a type="button" data-toggle="modal" data-target="#batalkan" data-id="{{$book->id_peminjaman}}" class="dev btn red text-white  batal-pinjam"><i class="fa fa-times "></i>Batalkan</a>
                                            @if ($book->approval==0)
                                            <button type="button" class="btn grey">Menunggu persetujuan</button>
                                            @endif
                                            @foreach($konsumsi as $k)
                                            @if ($k->id_peminjaman == $book->id_peminjaman)
                                            <a type="button" data-toggle="modal" data-jadwal="{{$k->id_peminjaman}}" data-target="#konsumsi" data-idruang="{{$book->id_ruangan}}" data-waktu="{{$book->waktupinjam}}" data-tanggal="{{$book->tanggal}}" data-harga="{{$k->harga}}" data-pesanan="{{$k->pesanan}}" class="dev btn yellow text-white modalkonsumsi"><i class="fa fa-cutlery "></i>Konsumsi</a>
                                            @endif
                                            @endforeach
                                        </td>

                                    </tr>
                                    @endif
                                    @endforeach

                                    @if ($e == 0)
                                    <tr>
                                        <td class="center" colspan="7"><b>Anda belum memesan ruang pertemuan</b> </td>
                                    </tr>
                                    @endif
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
<div class="modal fade" id="batalkan" tabindex="-1" role="batalkan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            </div>
            <div class="modal-body center">
                Apakah anda yakin ingin membatalkan peminjaman ruangan?
            </div>
            <div class="modal-footer text-center">
                <form id="batalkan-form" class="dev" action="" method="POST">
                    @csrf

                    <button class="btn btn-round btn-danger" type="submit" style="margin-right:10px ;"> {{ __('Ya') }} </a>

                        <button class="btn btn-round btn-primary" class="close" data-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="konsumsi" tabindex="-1" role="batalkan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            </div>


            <div class="modal-body center" id="pesanankonsumsi">



            </div>
            <div class="modal-footer text-center">

                <button class="btn btn-circle yellow" id="hargakonsumsi">



                </button>
                <a class="btn btn-circle red" href="" id="ubahkonsumsi">Ubah</a>
            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection