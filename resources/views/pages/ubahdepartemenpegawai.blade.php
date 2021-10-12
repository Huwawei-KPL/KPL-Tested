@extends('layouts.app', ['activePage' => 'pegawai', 'title' => 'Daftar pegawai dan departemen', 'activeButton' => ''])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title mt-2" style="text-align:center;">Pengubahan Departemen</h4>
                            </div>
                            </br></br></br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    @foreach($departemen as $departemen)
                                    <form method="POST" action="/editdepartemen/{{$departemen->id_departemen}}/{{{Auth::user()->id_perusahaan}}}">
                                        @csrf

                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Departemen</span>
                                            </div>
                                            <input name="departemen" id="departemen" value="{{$departemen->departemen}}" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                        </div>

                                        @endforeach
                                </div>

                                <button type="submit" onclick="return confirm('Apakah yakin ingin  mengubah nama departemen?')" class="btn btn-primary">Ubah</button>
                                <a href="/showPegawai/{{{Auth::user()->id_perusahaan}}}" class="btn btn-primary">Kembali</a>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class=" strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h5 class="card-title" style="text-align:center;">Daftar Pegawai Departemen</h5>
                                    <p class="card-category"></p>

                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>

                                            <th>Email</th>


                                        </thead>
                                        <tbody>
                                            @foreach($user as $user)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$user->nama_user}}</td>

                                                <td>{{$user->email}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection