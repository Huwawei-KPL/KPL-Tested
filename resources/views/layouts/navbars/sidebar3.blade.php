<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <h1 class="simple-text">
                {{ __("Pengelolaan pertemuan") }}
            </h1>
        </div>
        <ul class="nav">
            <li class="dev nav-item @if($activePage == 'dashboard') active @endif">
                <a class="dev nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'perusahaan') active @endif">
                <a class="nav-link" href="/showPerusahaan">
                    <i class="nc-icon nc-bag"></i>
                    <p>{{ __("Daftar Perusahaan") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="dev nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton=='laravel' ) aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Kelola gedung') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='kelola') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'gedung') active @endif">
                            <a class="nav-link" href="/showGedungMaster">
                                <i class="nc-icon nc-bank"></i>
                                <p>{{ __("Gedung") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'ruang') active @endif">
                            <a class="nav-link" href="/showRuangMaster">
                                <i class="nc-icon nc-layers-3"></i>
                                <p>{{ __("Ruang Pertemuan") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item @if($activePage == 'pegawai') active @endif">
                <a class="nav-link" href="/showPegawaiMaster">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __("Users") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'konsumsi') active @endif">
                <a class="nav-link" href="/showKonsumsi">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __("Konsumsi") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'jadwalkonsumsi') active @endif">
                <a class="nav-link" href="/showJadwalKonsumsi">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>{{ __("Pemesanan Konsumsi") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'jadwal') active @endif">
                <a class="nav-link" href="/showPeminjamanMaster">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Pemakaian Ruangan") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'laporan') active @endif">
                <a class="nav-link" href="/laporanMaster">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Laporan Harian") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'laporank') active @endif">
                <a class="nav-link" href="/laporanMasterKonsumsi">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Laporan  Konsumsi") }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>