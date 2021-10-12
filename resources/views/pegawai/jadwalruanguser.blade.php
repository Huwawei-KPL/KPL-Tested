@extends('layouts.user' ,['activePage' => 'jadwalruang' , 'activeButton' => 'ruangpertemuan','title'=> 'Jadwal Ruangan'])
@section('classbody')
page-quick-sidebar-over-content
@endsection
<!--buat page content, dipaling bawah tambah </div> -->
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">
            Jadwal Ruangan <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/homeuser">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="/jadwalruang">Jadwal Ruangan</a>
                </li>
            </ul>

        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">

                <div class="portlet box green-meadow ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar-o"></i>Set Tanggal
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" method="POST" role="form" action="/validatejadwalruang" id="formjadwalruang">
                            @csrf
                            <div class="form-body">


                                <div class="form-group">
                                    <label class="col-md-3  control-label">Ruang</label>
                                    <div class="col-md-9" style="margin-bottom: 10px;">
                                        <select style="vertical-align:middle; min-height:35px; max-width:70%" class="form-control" name="jadwalruang" id="jadwalruang">
                                            @if ($id_ruang == null)
                                            <option value="">Pilih Ruangan</option>
                                            @foreach($ruang as $ruang)
                                            <option value="{{$ruang->id_ruang}}">Gedung {{$ruang->gedung}} - {{$ruang->nama_ruang}} </option>
                                            @endforeach
                                            @else
                                            @foreach($ruang as $ruang)
                                            @if ($id_ruang == $ruang->id_ruang)
                                            <option selected value="{{$ruang->id_ruang}}">Gedung {{$ruang->gedung}} - {{$ruang->nama_ruang}} </option>
                                            @else
                                            <option value="{{$ruang->id_ruang}}">Gedung {{$ruang->gedung}} - {{$ruang->nama_ruang}} </option>
                                            @endif
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    @if ($errors->get('jadwalruang'))
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 mx-auto">
                                        <div class="alert alert-danger">
                                            <strong>Error!</strong> Harap pilih ruangan terlebih dahulu.
                                        </div>
                                    </div>

                                    @endif

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal</label>
                                    <div class="col-md-9" style="margin-bottom: 10px;">

                                        <input value="{{$tanggal}}" style="min-width:305px;" class="form-control form-control-inline input-medium " size="16" type="date" name="tanggaljadwalruang" id="tanggaljadwalruang" />

                                    </div>

                                    @if ($errors->get('tanggaljadwalruang'))
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 mx-auto">
                                        <div class="alert alert-danger">
                                            <strong>Error!</strong> Tanggal yang dipilih tidak boleh sebelum hari ini.
                                        </div>
                                    </div>

                                    @endif
                                </div>
                            </div>
                            <div class="form-actions right1">

                                <button type="submit" class="btn green"><i class="fa fa-clock-o"></i> Lihat Jadwal</button>
                                <span class="help-block">
                                    *Klik jam untuk memesan ruangan </span>
                                <span class="help-block">
                                    *Klik tulisan yang terisi untuk melihat pemesan </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        @if ($id_ruang != null)
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">

                    <div class="col-md-6">
                        <div class="portlet  green-meadow">

                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr class="center">
                                                <th style="text-align: center;">
                                                    Jam
                                                </th>
                                                <th style="text-align: center;">
                                                    Status
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="center" style="max-width: 200px;">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/06:00/06:30/{{$tanggal}}" id="06" class="btn default dev btn-circle green">
                                                        06:00 - 06:30 </a></td>
                                                <td id="6am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/06:30/07:00/{{$tanggal}}" id="063" class="btn default dev btn-circle green">
                                                        06:30 - 07:00 </a></td>
                                                <td id="63am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/07:00/07:30/{{$tanggal}}" id="07" class="btn default dev btn-circle green">
                                                        07:00 - 07:30 </a></td>
                                                <td id="7am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/07:30/08:00/{{$tanggal}}" id="073" class="btn default dev btn-circle green">
                                                        07:30 - 08:00 </a></td>
                                                <td id="73am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/08:00/08:30/{{$tanggal}}" id="08" class="btn default dev btn-circle green">
                                                        08:00 - 08:30 </a></td>
                                                <td id="8am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/08:30/9:00/{{$tanggal}}" id="083" class="btn default dev btn-circle green">
                                                        08:30 - 09:00 </a></td>
                                                <td id="83am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/09:00/09:30/{{$tanggal}}" id="09" class="btn default dev btn-circle green">
                                                        09:00 - 09:30 </a></td>
                                                <td id="9am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/09:30/10:00/{{$tanggal}}" id="093" class="btn default dev btn-circle green">
                                                        09:30 - 10:00 </a></td>
                                                <td id="93am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/10:00/10:30/{{$tanggal}}" id="10" class="btn default dev btn-circle green">
                                                        10:00 - 10:30 </a></td>
                                                <td id="10am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/10:30/11:00/{{$tanggal}}" id="103" class="btn default dev btn-circle green">
                                                        10:30 - 11:00 </a></td>
                                                <td id="103am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/11:00/11:30/{{$tanggal}}" id="11" class="btn default dev btn-circle green">
                                                        11:00 - 11:30 </a></td>
                                                <td id="11am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/11:30/12:00/{{$tanggal}}" id="113" class="btn default dev btn-circle green">
                                                        11:30 - 12:00 </a></td>
                                                <td id="113am">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/12:00/12:30/{{$tanggal}}" id="12" class="btn default dev btn-circle green">
                                                        12:00 - 12:30 </a></td>
                                                <td id="12pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/12:30/13:00/{{$tanggal}}" id="123" class="btn default dev btn-circle green">
                                                        12:30 - 13:00 </a></td>
                                                <td id="03pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/13:00/13:30/{{$tanggal}}" id="13" class="btn default dev btn-circle green">
                                                        13:00 - 13:30 </a></td>
                                                <td id="1pm">KOSONG</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="portlet  green-meadow">

                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr class="center">
                                                <th style="text-align: center;">
                                                    Jam
                                                </th>
                                                <th style="text-align: center;">
                                                    Status
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="center">

                                                <td><a href="/pesanjadwal/{{$id_ruang}}/13:30/14:00/{{$tanggal}}" id="133" class="btn default dev btn-circle green">
                                                        13:30 - 14:00 </a></td>
                                                <td id="13pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/14:00/14:30/{{$tanggal}}" id="14" class="btn default dev btn-circle green">
                                                        14:00 - 14:30 </a></td>
                                                <td id="2pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/14:30/15:00/{{$tanggal}}" id="143" class="btn default dev btn-circle green">
                                                        14:30 - 15:00 </a></td>
                                                <td id="23pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/15:00/15:30/{{$tanggal}}" id="15" class="btn default dev btn-circle green">
                                                        15:00 - 15:30 </a></td>
                                                <td id="3pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/15:30/16:00/{{$tanggal}}" id="153" class="btn default dev btn-circle green">
                                                        15:30 - 16:00 </a></td>
                                                <td id="33pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/16:00/16:30/{{$tanggal}}" id="16" class="btn default dev btn-circle green">
                                                        16:00 - 16:30 </a></td>
                                                <td id="4pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/16:30/17:00/{{$tanggal}}" id="163" class="btn default dev btn-circle green">
                                                        16:30 - 17:00 </a></td>
                                                <td id="43pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/17:00/17:30/{{$tanggal}}" id="17" class="btn default dev btn-circle green">
                                                        17:00 - 17:30 </a></td>
                                                <td id="5pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/17:30/18:00/{{$tanggal}}" id="173" class="btn default dev btn-circle green">
                                                        17:30 - 18:00 </a></td>
                                                <td id="53pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/18:00/18:30/{{$tanggal}}" id="18" class="btn default dev btn-circle green">
                                                        18:00 - 18:30 </a></td>
                                                <td id="6pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/18:30/19:00/{{$tanggal}}" id="183" class="btn default dev btn-circle green">
                                                        18:30 - 19:00 </a></td>
                                                <td id="63pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/19:00/19:30/{{$tanggal}}" id="19" class="btn default dev btn-circle green">
                                                        19:00 - 19:30 </a></td>
                                                <td id="7pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/19:30/20:00/{{$tanggal}}" id="193" class="btn default dev btn-circle green">
                                                        19:30 - 20:00 </a></td>
                                                <td id="73pm">KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/20:00/20:30/{{$tanggal}}" id="20" class="btn default dev btn-circle green">
                                                        20:00 - 20:30 </a></td>
                                                <td id="8pm"> KOSONG</td>
                                            </tr>
                                            <tr class="center">
                                                <td><a href="/pesanjadwal/{{$id_ruang}}/20:30/21:00/{{$tanggal}}" id="203" class="btn default dev btn-circle green">
                                                        20:30 - 21:00 </a></td>
                                                <td id="83pm">KOSONG</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>
        @endif
        @foreach($jdwl as $jdwl)

        @php $bandingwaktu1 =\Carbon\Carbon::parse("06:00"); $bandingwaktu2= \Carbon\Carbon::parse("06:30"); @endphp
        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))

                @else <script>
                    document.getElementById('6am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                    document.getElementById("6am").style.color = "red";
                    document.getElementById("06").href = "{{url()->current()}}";


                    document.getElementById("06").classList.remove('green');
                    document.getElementById("06").classList.add('red');
                </script>
                @endif

                @php $bandingwaktu1 = \Carbon\Carbon::parse("06:30"); $bandingwaktu2= \Carbon\Carbon::parse("07:00"); @endphp
                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                        @else <script>
                            document.getElementById('63am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                            document.getElementById("63am").style.color = "red";
                            document.getElementById("063").href = "{{url()->current()}}";
                            document.getElementById("063").classList.remove('green');
                            document.getElementById("063").classList.add('red');
                        </script>
                        @endif
                        @php $bandingwaktu1 = \Carbon\Carbon::parse("07:00"); $bandingwaktu2= \Carbon\Carbon::parse("07:30"); @endphp
                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                @else <script>
                                    document.getElementById('7am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                    document.getElementById("7am").style.color = "red";
                                    document.getElementById("07").href = "{{url()->current()}}";
                                    document.getElementById("07").classList.remove('green');
                                    document.getElementById("07").classList.add('red');
                                </script>
                                @endif
                                @php $bandingwaktu1 = \Carbon\Carbon::parse("07:30"); $bandingwaktu2= \Carbon\Carbon::parse("08:00"); @endphp
                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                        @else <script>
                                            document.getElementById('73am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                            document.getElementById("73am").style.color = "red";
                                            document.getElementById("073").href = "{{url()->current()}}";
                                            document.getElementById("073").classList.remove('green');
                                            document.getElementById("073").classList.add('red');
                                        </script>
                                        @endif
                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("08:00"); $bandingwaktu2= \Carbon\Carbon::parse("08:30"); @endphp
                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                @else <script>
                                                    document.getElementById('8am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                    document.getElementById("8am").style.color = "red";
                                                    document.getElementById("08").href = "{{url()->current()}}";
                                                    document.getElementById("08").classList.remove('green');
                                                    document.getElementById("08").classList.add('red');
                                                </script>
                                                @endif

                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("08:30"); $bandingwaktu2= \Carbon\Carbon::parse("09:00"); @endphp
                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                        @else <script>
                                                            document.getElementById('83am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                            document.getElementById("83am").style.color = "red";
                                                            document.getElementById("083").href = "{{url()->current()}}";
                                                            document.getElementById("083").classList.remove('green');
                                                            document.getElementById("083").classList.add('red');
                                                        </script>
                                                        @endif
                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("09:00"); $bandingwaktu2= \Carbon\Carbon::parse("09:30"); @endphp
                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                @else <script>
                                                                    document.getElementById('9am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                    document.getElementById("9am").style.color = "red";
                                                                    document.getElementById("09").href = "{{url()->current()}}";
                                                                    document.getElementById("09").classList.remove('green');
                                                                    document.getElementById("09").classList.add('red');
                                                                </script>
                                                                @endif
                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("09:30"); $bandingwaktu2= \Carbon\Carbon::parse("10:00"); @endphp
                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                        @else <script>
                                                                            document.getElementById('93am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                            document.getElementById("93am").style.color = "red";
                                                                            document.getElementById("093").href = "{{url()->current()}}";
                                                                            document.getElementById("093").classList.remove('green');
                                                                            document.getElementById("093").classList.add('red');
                                                                        </script>
                                                                        @endif
                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("10:00"); $bandingwaktu2= \Carbon\Carbon::parse("10:30"); @endphp
                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                @else <script>
                                                                                    document.getElementById('10am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                    document.getElementById("10am").style.color = "red";
                                                                                    document.getElementById("10").href = "{{url()->current()}}";
                                                                                    document.getElementById("10").classList.remove('green');
                                                                                    document.getElementById("10").classList.add('red');
                                                                                </script>
                                                                                @endif
                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("10:30"); $bandingwaktu2= \Carbon\Carbon::parse("11:00"); @endphp
                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                        @else <script>
                                                                                            document.getElementById('103am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                            document.getElementById("103am").style.color = "red";
                                                                                            document.getElementById("103").href = "{{url()->current()}}";
                                                                                            document.getElementById("103").classList.remove('green');
                                                                                            document.getElementById("103").classList.add('red');
                                                                                        </script>
                                                                                        @endif
                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("11:00"); $bandingwaktu2= \Carbon\Carbon::parse("11:30"); @endphp
                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                @else <script>
                                                                                                    document.getElementById('11am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                    document.getElementById("11am").style.color = "red";
                                                                                                    document.getElementById("11").href = "{{url()->current()}}";
                                                                                                    document.getElementById("11").classList.remove('green');
                                                                                                    document.getElementById("11").classList.add('red');
                                                                                                </script>
                                                                                                @endif
                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("11:30"); $bandingwaktu2= \Carbon\Carbon::parse("12:00"); @endphp
                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                        @else <script>
                                                                                                            document.getElementById('113am').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                            document.getElementById("113am").style.color = "red";
                                                                                                            document.getElementById("113").href = "{{url()->current()}}";
                                                                                                            document.getElementById("113").classList.remove('green');
                                                                                                            document.getElementById("113").classList.add('red');
                                                                                                        </script>
                                                                                                        @endif
                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("12:00"); $bandingwaktu2= \Carbon\Carbon::parse("12:30"); @endphp
                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                @else <script>
                                                                                                                    document.getElementById('12pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                    document.getElementById("12pm").style.color = "red";
                                                                                                                    document.getElementById("12").href = "{{url()->current()}}";
                                                                                                                    document.getElementById("12").classList.remove('green');
                                                                                                                    document.getElementById("12").classList.add('red');
                                                                                                                </script>
                                                                                                                @endif
                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("12:30"); $bandingwaktu2= \Carbon\Carbon::parse("13:00"); @endphp
                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                        @else <script>
                                                                                                                            document.getElementById('03pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                            document.getElementById("03pm").style.color = "red";
                                                                                                                            document.getElementById("123").href = "{{url()->current()}}";
                                                                                                                            document.getElementById("123").classList.remove('green');
                                                                                                                            document.getElementById("123").classList.add('red');
                                                                                                                        </script>
                                                                                                                        @endif
                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("13:00"); $bandingwaktu2= \Carbon\Carbon::parse("13:30"); @endphp
                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                @else <script>
                                                                                                                                    document.getElementById('1pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                    document.getElementById("1pm").style.color = "red";
                                                                                                                                    document.getElementById("13").href = "{{url()->current()}}";
                                                                                                                                    document.getElementById("13").classList.remove('green');
                                                                                                                                    document.getElementById("13").classList.add('red');
                                                                                                                                </script>
                                                                                                                                @endif
                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("13:30"); $bandingwaktu2= \Carbon\Carbon::parse("14:00"); @endphp
                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                        @else <script>
                                                                                                                                            document.getElementById('13pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                            document.getElementById("13pm").style.color = "red";
                                                                                                                                            document.getElementById("133").href = "{{url()->current()}}";

                                                                                                                                            document.getElementById("133").classList.remove('green');
                                                                                                                                            document.getElementById("133").classList.add('red');
                                                                                                                                        </script>
                                                                                                                                        @endif

                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("14:00"); $bandingwaktu2= \Carbon\Carbon::parse("14:30"); @endphp
                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                @else <script>
                                                                                                                                                    document.getElementById('2pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                    document.getElementById("2pm").style.color = "red";
                                                                                                                                                    document.getElementById("14").href = "{{url()->current()}}";
                                                                                                                                                    document.getElementById("14").classList.remove('green');
                                                                                                                                                    document.getElementById("14").classList.add('red');
                                                                                                                                                </script>
                                                                                                                                                @endif
                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("14:30"); $bandingwaktu2= \Carbon\Carbon::parse("15:00"); @endphp
                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                        @else <script>
                                                                                                                                                            document.getElementById('23pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                            document.getElementById("23pm").style.color = "red";
                                                                                                                                                            document.getElementById("143").href = "{{url()->current()}}";
                                                                                                                                                            document.getElementById("143").classList.remove('green');
                                                                                                                                                            document.getElementById("143").classList.add('red');
                                                                                                                                                        </script>
                                                                                                                                                        @endif
                                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("15:00"); $bandingwaktu2= \Carbon\Carbon::parse("15:30"); @endphp
                                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                @else <script>
                                                                                                                                                                    document.getElementById('3pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                    document.getElementById("3pm").style.color = "red";
                                                                                                                                                                    document.getElementById("15").href = "{{url()->current()}}";
                                                                                                                                                                    document.getElementById("15").classList.remove('green');
                                                                                                                                                                    document.getElementById("15").classList.add('red');
                                                                                                                                                                </script>
                                                                                                                                                                @endif
                                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("15:30"); $bandingwaktu2= \Carbon\Carbon::parse("16:00"); @endphp
                                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                        @else <script>
                                                                                                                                                                            document.getElementById('33pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                            document.getElementById("33pm").style.color = "red";
                                                                                                                                                                            document.getElementById("153").href = "{{url()->current()}}";
                                                                                                                                                                            document.getElementById("153").classList.remove('green');
                                                                                                                                                                            document.getElementById("153").classList.add('red');
                                                                                                                                                                        </script>
                                                                                                                                                                        @endif
                                                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("16:00"); $bandingwaktu2= \Carbon\Carbon::parse("16:30"); @endphp
                                                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                @else <script>
                                                                                                                                                                                    document.getElementById('4pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                    document.getElementById("4pm").style.color = "red";
                                                                                                                                                                                    document.getElementById("16").href = "{{url()->current()}}";
                                                                                                                                                                                    document.getElementById("16").classList.remove('green');
                                                                                                                                                                                    document.getElementById("16").classList.add('red');
                                                                                                                                                                                </script>
                                                                                                                                                                                @endif

                                                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("16:30"); $bandingwaktu2= \Carbon\Carbon::parse("17:00"); @endphp
                                                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                        @else <script>
                                                                                                                                                                                            document.getElementById('43pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                            document.getElementById("43pm").style.color = "red";
                                                                                                                                                                                            document.getElementById("163").href = "{{url()->current()}}";
                                                                                                                                                                                            document.getElementById("163").classList.remove('green');
                                                                                                                                                                                            document.getElementById("163").classList.add('red');
                                                                                                                                                                                        </script>
                                                                                                                                                                                        @endif

                                                                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("17:00"); $bandingwaktu2= \Carbon\Carbon::parse("17:30"); @endphp
                                                                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                @else <script>
                                                                                                                                                                                                    document.getElementById('5pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                    document.getElementById("5pm").style.color = "red";
                                                                                                                                                                                                    document.getElementById("17").href = "{{url()->current()}}";
                                                                                                                                                                                                    document.getElementById("17").classList.remove('green');
                                                                                                                                                                                                    document.getElementById("17").classList.add('red');
                                                                                                                                                                                                </script>
                                                                                                                                                                                                @endif

                                                                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("17:30"); $bandingwaktu2= \Carbon\Carbon::parse("18:00"); @endphp
                                                                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                        @else <script>
                                                                                                                                                                                                            document.getElementById('53pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                            document.getElementById("53pm").style.color = "red";
                                                                                                                                                                                                            document.getElementById("173").href = "{{url()->current()}}";
                                                                                                                                                                                                            document.getElementById("173").classList.remove('green');
                                                                                                                                                                                                            document.getElementById("173").classList.add('red');
                                                                                                                                                                                                        </script>
                                                                                                                                                                                                        @endif
                                                                                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("18:00"); $bandingwaktu2= \Carbon\Carbon::parse("18:30"); @endphp
                                                                                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                                @else <script>
                                                                                                                                                                                                                    document.getElementById('6pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                                    document.getElementById("6pm").style.color = "red";
                                                                                                                                                                                                                    document.getElementById("18").href = "{{url()->current()}}";
                                                                                                                                                                                                                    document.getElementById("18").classList.remove('green');
                                                                                                                                                                                                                    document.getElementById("18").classList.add('red');
                                                                                                                                                                                                                </script>
                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("18:30"); $bandingwaktu2= \Carbon\Carbon::parse("19:00"); @endphp
                                                                                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                                        @else <script>
                                                                                                                                                                                                                            document.getElementById('63pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                                            document.getElementById("63pm").style.color = "red";
                                                                                                                                                                                                                            document.getElementById("183").href = "{{url()->current()}}";
                                                                                                                                                                                                                            document.getElementById("183").classList.remove('green');
                                                                                                                                                                                                                            document.getElementById("183").classList.add('red');
                                                                                                                                                                                                                        </script>
                                                                                                                                                                                                                        @endif
                                                                                                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("19:00"); $bandingwaktu2= \Carbon\Carbon::parse("19:30"); @endphp
                                                                                                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                                                @else <script>
                                                                                                                                                                                                                                    document.getElementById('7pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                                                    document.getElementById("7pm").style.color = "red";
                                                                                                                                                                                                                                    document.getElementById("19").href = "{{url()->current()}}";
                                                                                                                                                                                                                                    document.getElementById("19").classList.remove('green');
                                                                                                                                                                                                                                    document.getElementById("19").classList.add('red');
                                                                                                                                                                                                                                </script>
                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("19:30"); $bandingwaktu2= \Carbon\Carbon::parse("20:00"); @endphp
                                                                                                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                                                        @else <script>
                                                                                                                                                                                                                                            document.getElementById('73pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                                                            document.getElementById("73pm").style.color = "red";
                                                                                                                                                                                                                                            document.getElementById("193").href = "{{url()->current()}}";
                                                                                                                                                                                                                                            document.getElementById("193").classList.remove('green');
                                                                                                                                                                                                                                            document.getElementById("193").classList.add('red');
                                                                                                                                                                                                                                        </script>
                                                                                                                                                                                                                                        @endif
                                                                                                                                                                                                                                        @php $bandingwaktu1 = \Carbon\Carbon::parse("20:00"); $bandingwaktu2= \Carbon\Carbon::parse("20:30"); @endphp
                                                                                                                                                                                                                                        @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                                                                @else <script>
                                                                                                                                                                                                                                                    document.getElementById('8pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                                                                    document.getElementById("8pm").style.color = "red";
                                                                                                                                                                                                                                                    document.getElementById("20").href = "{{url()->current()}}";
                                                                                                                                                                                                                                                    document.getElementById("20").classList.remove('green');
                                                                                                                                                                                                                                                    document.getElementById("20").classList.add('red');
                                                                                                                                                                                                                                                </script>
                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                @php $bandingwaktu1 = \Carbon\Carbon::parse("20:30"); $bandingwaktu2= \Carbon\Carbon::parse("21:00"); @endphp
                                                                                                                                                                                                                                                @if ((($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu1 >= \Carbon\Carbon::parse($jdwl->waktuselesai ))) || (($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktupinjam )) && ($bandingwaktu2 <= \Carbon\Carbon::parse($jdwl->waktuselesai ))))
                                                                                                                                                                                                                                                        @else <script>
                                                                                                                                                                                                                                                            document.getElementById('83pm').innerHTML = '<button  class="btn btn-md primary btn-circle btn-primary-outline" href="#" data-toggle="popover" style="color:red;" data-html="true" data-content="{{$jdwl->keperluan}}"data-title="Di booking oleh: {{$jdwl->nama_user}}<br>Departemen: {{$jdwl->departemen}}"><b>TERISI</b></button>';
                                                                                                                                                                                                                                                            document.getElementById("83pm").style.color = "red";
                                                                                                                                                                                                                                                            document.getElementById("203").href = "{{url()->current()}}";
                                                                                                                                                                                                                                                            document.getElementById("203").classList.remove('green');
                                                                                                                                                                                                                                                            document.getElementById("203").classList.add('red');
                                                                                                                                                                                                                                                        </script>
                                                                                                                                                                                                                                                        @endif
                                                                                                                                                                                                                                                        @endforeach
    </div>
</div>
</div>
@endsection('content')