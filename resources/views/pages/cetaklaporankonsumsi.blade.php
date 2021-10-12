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
    <h1 class="text-center">Laporan Konsumsi Harian</h1>
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
                                    <th>No</th>

                                    <th>User</th>
                                    <th>Ruang</th>
                                    <th>Gedung</th>
                                    <th>Pesanan</th>
                                    <th>Waktu</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($pinjam as $pinjam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$pinjam->nama_user }}</td>
                                    <td>{{$pinjam->nama_ruang}}</td>
                                    <td>{{$pinjam->gedung}}</td>
                                    <td>{{$pinjam->pesanan}}<br>
                                        @if ($pinjam->harga >= 1)
                                        <br>
                                        Total = Rp {{number_format($pinjam->harga,0)}}
                                        @else($pinjam->harga == 0)
                                        -


                                        @endif
                                    </td>
                                    <td>{{$pinjam->waktupinjam }}</td>
                                    <td>{{date('d-m-Y', strtotime($pinjam->tanggal))}}</td>

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