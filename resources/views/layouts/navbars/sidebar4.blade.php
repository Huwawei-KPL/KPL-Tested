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



            <li class="nav-item @if($activePage == 'konsumsi') active @endif">
                <a class="nav-link" href="/showKonsumsii">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __("Konsumsi") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'jadwalkonsumsi') active @endif">
                <a class="nav-link" href="/showJadwalKonsumsii">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>{{ __("Pemesanan Konsumsi") }}</p>
                </a>
            </li>


            <li class="nav-item @if($activePage == 'laporan') active @endif">
                <a class="nav-link" href="/laporanKonsumsi">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Laporan Konsumsi") }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>