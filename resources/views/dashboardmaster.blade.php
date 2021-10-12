@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3" style="margin:auto; ">
                <div class="card card-stats" style="border:2px solid purple;">
                    <div class="card-header  card-header-warning card-header-icon">
                        <div class="card-icon text-center">
                            <i class="nc-icon nc-bank x3" style="-webkit-text-stroke: 1px purple;"></i>
                        </div>
                        <p class="card-category text-center"> Gedung </p>
                        <h4 class="card-title text-center">{{ $gedung }}</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3" style="margin:auto;">
                <div class="card card-stats" style="border:2px solid purple;">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon text-center">
                            <i class="nc-icon nc-vector x3" style="-webkit-text-stroke: 1px purple;"></i>
                        </div>
                        <p class="card-category text-center">Ruangan</p>
                        <h4 class="card-title text-center">{{ $ruang }}</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3" style="margin:auto;">
                <div class="card card-stats" style="border:2px solid purple;">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon text-center">
                            <i class="nc-icon nc-badge x3" style="-webkit-text-stroke: 1px purple;"></i>
                        </div>
                        <p class="card-category text-center">Departemen</p>
                        <h4 class="card-title text-center">{{ $departemen }}</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-3" style="margin:auto;">
                <div class="card card-stats" style="border:2px solid purple;">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon text-center">
                            <i class="nc-icon nc-single-02 x3" style="-webkit-text-stroke: 1px purple;"></i>
                        </div>
                        <p class="card-category text-center">User</p>
                        <h4 class="card-title text-center">{{ $pegawai }}</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3" style="margin:auto;">
                <div class="card card-stats" style="border:2px solid purple;">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon text-center">
                            <i class="nc-icon nc-bag x3" style="-webkit-text-stroke: 1px purple;"></i>
                        </div>
                        <p class="card-category text-center">Perusahaan</p>
                        <h4 class="card-title text-center">{{ $perusahaan }}</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
    });
</script>
@endpush