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
            <li class="nav-item @if($activePage == 'pegawai') active @endif">
                <a class="nav-link" href="/showPegawai/{{{Auth::user()->id_perusahaan}}}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __("User") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'laporan') active @endif">
                <a class="nav-link" href="/laporan/{{{Auth::user()->id_perusahaan}}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Laporan Harian") }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>