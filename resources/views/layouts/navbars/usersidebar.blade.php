<div class="page-container">
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper" style="margin-bottom: 10px;">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                <li class="start @if ($activePage=='dashboard') active @endif">
                    <a href="/homeuser">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>

                    </a>

                </li>
                <li class="@if ($activeButton=='ruangpertemuan') active open @endif">
                    <a href="javascript:;">
                        <i class="fa fa-bars"></i>
                        <span class="title">Ruang Pertemuan</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class=" @if ($activePage=='daftargedung') active @endif">
                            <a href="/daftargedung">
                                <i class="fa fa-university"></i>
                                Daftar Gedung</a>
                        </li>
                        <li class=" @if ($activePage=='daftarruang') active @endif">
                            <a href="/daftarruangan/semua">
                                <i class="fa fa-building"></i>
                                Daftar Ruang</a>
                        </li>
                        <li class="@if ($activePage=='jadwalruang') active @endif ">
                            <a href="/jadwalruang">
                                <i class="fa fa-calendar-o"></i>
                                Jadwal Ruang</a>
                        </li>
                        <li class="@if ($activePage=='rekapruang') active @endif ">
                            <a href="/rekapruang">
                                <i class="fa fa-file-pdf-o"></i>
                                Rekap Ruangan</a>
                        </li>

                    </ul>
                </li>
                <li class="@if ($activeButton=='pesanruang') active open @endif">
                    <a href="javascript:;">
                        <i class="fa fa-tags"></i>
                        <span class="title">Pemakaian Ruang </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="@if ($activePage=='mybooking') active @endif">
                            <a href="/mybooking">
                                <i class="fa fa-folder-open-o"></i>
                                Pemesanan saya</a>
                        </li>
                        <li class="@if ($activePage=='bookruang') active @endif">
                            <a href="/pesanruang">
                                <i class="fa fa-sliders"></i>
                                Pesan ruang</a>
                        </li>
                        

                    </ul>
                </li>
                <li class="@if ($activeButton=='profile') active open @endif">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span class="title">Akun </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="@if ($activePage=='editprofile') active @endif">
                            <a href="/myprofile">
                                <i class="fa fa-user"></i> Edit Profile</a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#logout"><i class="icon-key "></i> Keluar akun</a>
                        </li>

                    </ul>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>

    <div class="modal fade" id="logout" tabindex="-1" role="batalkan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body center">
                    Apakah anda yakin ingin keluar dari akun??
                </div>
                <div class="modal-footer text-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dev">
                        @csrf

                        <a href="" class="btn red" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Ya</a>

                        <button class="btn btn-round btn-primary" class="close" data-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>