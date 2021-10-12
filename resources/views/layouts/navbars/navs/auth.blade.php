<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">


            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
                <li class="nav-item">
                    <a class="dev nav-link" href=" {{route('profile.edit') }} ">
                        <span class="no-icon">Edit Profil</span>
                    </a>
                </li>

                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dev">
                        @csrf
                        <a class="text-danger dev" href="{{ route('logout') }}" data-toggle="modal" data-target="#logout"> Keluar Akun </a>

                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card-header card-header-primary">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title mt-2 " style="text-align: center;">Apakah anda ingin log out ?</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body text-center">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button class="btn btn-round btn-danger" style="margin-right:10px ;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Ya') }} </a>

                                        <button class="btn btn-round btn-primary" class="close" data-dismiss="modal">Tidak</button>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>