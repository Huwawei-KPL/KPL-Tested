@extends('layouts.user' ,['activePage' => 'daftargedung' , 'activeButton' => 'ruangpertemuan','title'=>'Daftar gedung perusahaan'])
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
            Daftar Gedung <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/daftargedung">Daftar Gedung</a>
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
                            <i class="fa fa-university"></i>
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
                                            Gedung
                                        </th>
                                        <th>
                                            Lokasi
                                        </th>
                                        <th>
                                            Jumlah Lantai
                                        </th>
                                        <th>
                                            Jumlah Ruangan
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($gedung as $gedung)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$gedung->gedung}}</td>
                                        <td>{{$gedung->lokasi}}</td>
                                        <td>{{$gedung->jml_lantai}} Lantai</td>
                                        <td>{{$gedung->jml_ruangan}} Ruangan</td>
                                    </tr>
                                    @endforeach
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