@extends('layouts.user' ,['activePage' => 'dashboard' ,'activeButton' => 'dashboard','title'=>'Dashboard'])
@section('classbody')
page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid
@endsection
@section('content')



<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN STYLE CUSTOMIZER -->

        <!-- END STYLE CUSTOMIZER -->
        <!-- BEGIN PAGE HEADER-->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
            </ul>

        </div>
        <h3 class="page-title">
            Dashboard <small>reports & statistics</small>
        </h3>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-university"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{$gedung}}
                        </div>
                        <div class="desc">
                            Jumlah Gedung
                        </div>
                    </div>
                    <a class="more" href="/daftargedung">
                        Lihat <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{$ruang}}
                        </div>
                        <div class="desc">
                            Jumlah Ruangan
                        </div>
                    </div>
                    <a class="more" href="/daftarruangan/semua">
                        Lihat <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{$peminjaman}}
                        </div>
                        <div class="desc">
                            Total pemakaian ruangan pertemuan
                        </div>
                    </div>
                    <a class="more" href="/mybooking">
                        Lihat Milik saya <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>


</div>


@endsection