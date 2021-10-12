<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Print</title>
</head>

<body>
    <h1 class="text-center">Laporan Pemakaian Ruangan</h1>
    <div class="text-center">
        <p id="demo"></p>
        <script>
            var d = new Date();
            document.getElementById("demo").innerHTML = d;
        </script>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Perusahaan</th>

                                    <th scope="col">Ruang</th>
                                    <th scope="col">Gedung</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu Pakai</th>
                                    <th scope="col">Waktu Selesai</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Departemen</th>
                                    <th>Keperluan</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($peminjaman as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$peminjaman->nama_perusahaan}}</td>
                                    <td>{{$peminjaman->nama_ruang}}</td>
                                    <td>{{$peminjaman->gedung}}</td>
                                    <td>{{date('d-m-Y', strtotime($peminjaman->tanggal))}}</td>
                                    <td>{{$peminjaman->waktupinjam }}</td>
                                    <td>{{$peminjaman->waktuselesai }}</td>
                                    <td>{{$peminjaman->nama_user }}</td>
                                    <td>{{$peminjaman->departemen }}</td>
                                    <td>{{$peminjaman->keperluan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>