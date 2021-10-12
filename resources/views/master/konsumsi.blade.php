@extends('layouts.app', ['activePage' => 'konsumsi', 'title' => 'Daftar Konsumsi Perusahaan', 'activeButton' => 'konsumsi'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Makanan</h4>
                        <p class="card-category"></p>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Makanan</th>
                                <th>Perusahaan</th>
                                <th>Harga</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($konsumsi as $konsumsi)
                                @if ($konsumsi->jenis== "Makanan")
                                <tr>
                                    <td scope="row">{{$i}}</td>
                                    <td>{{$konsumsi->konsumsi}}</td>
                                    <td>{{$konsumsi->nama_perusahaan}}</td>
                                    <td>Rp. {{number_format($konsumsi->harga,0)}}</td>
                                    <td><a class="btn  btn-danger btn-round" style="color:red; margin-right:20;" href="/deletekonsumsimaster/{{$konsumsi->id_konsumsi}}" onclick="return confirm('Apakah anda yakin ingin menghapus data makanan milik {{$konsumsi->nama_perusahaan}}?')">Hapus</a>

                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Daftar Minuman</h4>
                        <p class="card-category"></p>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Makanan</th>
                                <th>Perusahaan</th>
                                <th>Harga</th>

                                <th></th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($minum as $minum)
                                @if ($minum->jenis== "Minuman")
                                <tr>
                                    <td scope="row">{{$i}}</td>
                                    <td>{{$minum->konsumsi}}</td>
                                    <td>{{$minum->nama_perusahaan}}</td>
                                    <td>Rp. {{number_format($minum->harga,0)}}</td>
                                    <td><a class="btn  btn-danger btn-round" style="color:red; margin-right:20;" href="/deletekonsumsimaster/{{$minum->id_konsumsi}}" onclick="return confirm('Apakah anda yakin ingin menghapus data minuman milik {{$minum->nama_perusahaan}}?')">Hapus</a>

                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection