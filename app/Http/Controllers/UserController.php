<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\pesankonsumsi;
use App\Models\jadwalkonsumsi;
use Carbon\Carbon;
use App\Models\frekuensipemakaian;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function hapusKonsumsi($id_peminjaman, $id_ruang, $tanggal, $waktu)
    {
        $jadwal = DB::table('jadwalkonsumsi')
            ->where('id_peminjaman', $id_peminjaman);
        $jadwal->delete();

        $kons = DB::table('pesankonsumsi')
            ->where('tanggal', $tanggal)
            ->where('id_ruang', $id_ruang)
            ->where('waktu', $waktu);
        $kons->delete();

        return redirect('/mybooking');
    }

    public function formUbahKonsumsi($id_ruang, $tanggal, $waktu, $id_peminjaman)
    {
        $minuman = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('jenis', 'Minuman')
            ->get();
        $makanan = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('jenis', 'Makanan')
            ->get();

        $pesan = DB::table('pesankonsumsi')
            ->where('tanggal', $tanggal)
            ->where('id_ruang', $id_ruang)
            ->where('waktu', $waktu)
            ->get();
        $peminjaman = DB::table('jadwalkonsumsi')
            ->where('id_peminjaman', $id_peminjaman)
            ->get();

        return view('pegawai.ubahkonsumsi', ['waktu' => $waktu, 'peminjaman' => $peminjaman, 'id_peminjaman' => $id_peminjaman, 'pesan' => $pesan, 'minuman' => $minuman, 'makanan' => $makanan, 'id_ruang' => $id_ruang, 'tanggal' => $tanggal]);
    }

    public function filterRekap()
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = "belum";
        $tanggal2 = "belum";
        $tabel = "belum";
        $id_gedung = "semua";
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        return view('pegawai.rekapruangan', ['tanggal' => $tanggal, 'id_gedung' => $id_gedung, 'gedung' => $gedung, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'tabel' => $tabel]);
    }

    public function showRekap(Request $request)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = request()->input('tanggal1');
        $tanggal2 = request()->input('tanggal2');;
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $id_gedung = request()->input('gedung');;
        if ($id_gedung != "semua") {
            $tabel = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->where('users.id_perusahaan', '=', Auth::user()->id_perusahaan)
                ->where('gedung.id_gedung', '=', $id_gedung)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $tabel = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->where('users.id_perusahaan', '=', Auth::user()->id_perusahaan)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('pegawai.rekapruangan', ['tanggal' => $tanggal, 'id_gedung' => $id_gedung, 'gedung' => $gedung, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'tabel' => $tabel]);
    }

    public function showGedung()
    {
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->get();

        return view('pegawai.gedung', ['gedung' => $gedung]);
    }
    public function editProfile()
    {
        $profile = DB::table('users')
            ->join('departemen', 'users.id_departemen', 'departemen.id_departemen')
            ->where('users.id', Auth::user()->id)
            ->get();
        return view('pegawai.editprofile', ['profile' => $profile]);
    }
    public function homeUser()
    {
        $gedung = DB::table('gedung')
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->count();
        $pegawai = DB::table('users')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('admin', '0')
            ->count();
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->count();
        $peminjaman = DB::table('peminjaman')
            ->join('users', 'peminjaman.id_users', 'users.id')
            ->where('users.id_perusahaan', Auth::user()->id_perusahaan)
            ->count();
        return view('pegawai.home', ['gedung' => $gedung, 'ruang' => $ruang, 'pegawai' => $pegawai, 'peminjaman' => $peminjaman]);
    }
    public function ubahKonsumsi(Request $request, $id_peminjaman, $tanggal, $id_ruang, $waktu)
    {

        $ceklama = DB::table('pesankonsumsi')
            ->where('tanggal', $tanggal)
            ->where('id_ruang', $id_ruang)
            ->where('waktu', $waktu)
            ->join('konsumsi', 'pesankonsumsi.id_konsumsi', 'konsumsi.id_konsumsi')
            ->get();
        $kons = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->whereNotIn('id_konsumsi', $ceklama->pluck('id_konsumsi'))
            ->get();
        $sum = 0;
        $e = 0;
        $pesanan = '';
        foreach ($ceklama as $ck) {
            if ($request->input($ck->id_konsumsi) != 0) {

                //Ngubah yang udah ada, ke jumlah lain
                DB::table('pesankonsumsi')
                    ->where('tanggal', $tanggal)
                    ->where('id_ruang', $id_ruang)
                    ->where('waktu', $waktu)
                    ->where('id_konsumsi', $ck->id_konsumsi)
                    ->update([
                        'jumlahpesanan' => $request->input($ck->id_konsumsi)
                    ]);

                //Ngitung harga
                $sum = $sum + ($ck->harga * $request->input($ck->id_konsumsi));
                //Nulis Pesenan
                if ($e == 0) {
                    $pesanan = $request->input($ck->id_konsumsi) . " " . $ck->konsumsi;
                } else {

                    $pesanan = $pesanan . ", " . $request->input($ck->id_konsumsi) . " " . $ck->konsumsi;
                }
                $e++;
            } else {
                //Ngapus kalo di 0 in
                $fp = DB::table('pesankonsumsi')
                    ->where('tanggal', $tanggal)
                    ->where('id_ruang', $id_ruang)
                    ->where('waktu', $waktu)
                    ->where('id_konsumsi', $ck->id_konsumsi);
                $fp->delete();
            }
        }

        foreach ($kons as $kons) {
            //Kalo dari 0 terus jadi nambah belinya
            if ($request->input($kons->id_konsumsi) != 0) {
                $jadwal = new pesankonsumsi();
                $jadwal->id_konsumsi = $kons->id_konsumsi;
                $jadwal->id_ruang = $id_ruang;
                $jadwal->waktu = $waktu;
                $jadwal->tanggal = $tanggal;
                $jadwal->jumlahpesanan = $request->input($kons->id_konsumsi);
                $jadwal->save();

                $sum = $sum + ($ck->harga * $request->input($ck->id_konsumsi));
                if ($e == 0) {
                    $pesanan = $request->input($ck->id_konsumsi) . " " . $ck->konsumsi;
                } else {

                    $pesanan = $pesanan . ", " . $request->input($ck->id_konsumsi) . " " . $ck->konsumsi;
                }
                $e++;
            }
        }

        DB::table('jadwalkonsumsi')
            ->where('id_peminjaman', $id_peminjaman)
            ->update([
                'harga' => $sum,
                'pesanan' => $pesanan
            ]);
        return redirect()->to('/mybooking');
    }

    function bookRuang(Request $request, $id_ruangan, $approve)
    {
        // $id_perusahaan = Auth::user()->id_perusahaan;
        $request->validate([
            'keperluan' => 'required',

        ]);

        if ($request->input('pesankonsumsi') == 'tidak') {
            $peminjaman = new peminjaman;
            $peminjaman->id_ruangan = $id_ruangan;
            $peminjaman->id_users = Auth::user()->id;
            $peminjaman->tanggal = $request->input('tanggal');
            $peminjaman->waktupinjam = $request->input('wkt_awal');
            $peminjaman->waktuselesai = $request->input('wkt_akhir');
            $peminjaman->keperluan = $request->input('keperluan');
            if ($approve == 0) {
                $peminjaman->approval = 1;
                $wktawal = Carbon::parse($request->input('wkt_awal'));
                $wktakhir = Carbon::parse($request->input('wkt_akhir'));
                $frekuensi = $wktakhir->diffInMinutes($wktawal);
                $fp = new frekuensipemakaian;
                $fp->id_ruang = $id_ruangan;
                $fp->waktu = $request->input('wkt_awal');
                $fp->tanggal = $request->input('tanggal');
                $fp->menit = $frekuensi;
                $fp->save();
            } else {
                $peminjaman->approval = 0;
            }
            $peminjaman->save();
        } else {
            $peminjaman = new peminjaman;
            $peminjaman->id_ruangan = $id_ruangan;
            $peminjaman->id_users = Auth::user()->id;
            $peminjaman->tanggal = $request->input('tanggal');
            $peminjaman->waktupinjam = $request->input('wkt_awal');
            $peminjaman->waktuselesai = $request->input('wkt_akhir');
            $peminjaman->keperluan = $request->input('keperluan');
            if ($approve == 0) {
                $peminjaman->approval = 1;
            } else {
                $peminjaman->approval = 0;
            }
            $peminjaman->save();


            $cek = DB::table('konsumsi')
                ->where('id_perusahaan', Auth::user()->id_perusahaan)
                ->get();

            foreach ($cek as $cek) {
                if ($request->input($cek->id_konsumsi) != 0) {
                    $pesen = new pesankonsumsi;
                    $pesen->id_ruang = $id_ruangan;
                    $pesen->id_konsumsi = $cek->id_konsumsi;
                    $pesen->jumlahpesanan = $request->input($cek->id_konsumsi);

                    $pesen->tanggal = $request->input('tanggal');
                    $pesen->waktu = $request->input('wkt_awal');
                    $pesen->save();
                }
            }

            $id_peminjaman = DB::table('peminjaman')
                ->where('waktupinjam', $request->input('wkt_awal'))
                ->where('id_ruangan', $id_ruangan)
                ->where('tanggal', $request->input('tanggal'))
                ->get();

            $cekharga = DB::table('pesankonsumsi')
                ->join('konsumsi', 'pesankonsumsi.id_konsumsi', 'konsumsi.id_konsumsi')
                ->where('waktu', $request->input('wkt_awal'))
                ->where('id_ruang', $id_ruangan)
                ->where('tanggal', $request->input('tanggal'))
                ->get();

            $jadwal = new jadwalkonsumsi;
            $test = "";
            foreach ($id_peminjaman as $id_peminjaman) {


                $jadwal->id_peminjaman = $id_peminjaman->id_peminjaman;
            }
            $jadwal->waktu =  $request->input('wkt_awal');
            $sum = 0;

            $e = 0;
            foreach ($cekharga as $cekharga) {
                $hrg = $cekharga->jumlahpesanan * $cekharga->harga;
                $sum = $sum + $hrg;
                if ($e == 0) {
                    $test = $test . $cekharga->jumlahpesanan . " " . $cekharga->konsumsi;
                } else {

                    $test = $test . ", " . $cekharga->jumlahpesanan . " " . $cekharga->konsumsi;
                }
                $e++;
            }

            strval($test);
            $jadwal->pesanan = $test;

            $jadwal->harga = $sum;

            $jadwal->save();
        }

        return redirect()->to('/mybooking');
    }

    public function konsumsiForm($id_ruang, $wktawal, $wktakhir, $tanggal)
    {
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.id_ruang', $id_ruang)
            ->get();

        $makanan = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('jenis', 'makanan')
            ->get();
        $minuman = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('jenis', 'minuman')
            ->get();

        $asal = "book";
        return view('pegawai.prosesbooking', ['asal' => $asal, 'ruang' => $ruang, 'makanan' => $makanan, 'minuman' => $minuman, 'wktawal' => $wktawal, 'wktakhir' => $wktakhir, 'tanggal' => $tanggal]);
    }

    public function jadwalForm($id_ruang, $wktawal, $wktakhir, $tanggal)
    {
        $asal = "jadwal";
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.id_ruang', $id_ruang)
            ->get();

        $makanan = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('jenis', 'makanan')
            ->get();
        $minuman = DB::table('konsumsi')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->where('jenis', 'minuman')
            ->get();

        return view('pegawai.prosesbooking', ['asal' => $asal, 'ruang' => $ruang, 'makanan' => $makanan, 'minuman' => $minuman, 'wktawal' => $wktawal, 'wktakhir' => $wktakhir, 'tanggal' => $tanggal]);
    }

    public function findRoom(Request $request)
    {

        $request->validate([
            'wkt_awal' => 'required',
            'wkt_akhir' => 'required',
            'tanggal' => 'required|date|after:yesterday',
            'gedung' => 'required',
            'kapasitas' => 'required|integer|gt:0',
        ]);

        $wktawal = $request->input('wkt_awal');
        $wktakhir = $request->input('wkt_akhir');
        $tanggal = $request->input('tanggal');
        $gedung = $request->input('gedung');
        $kapasitas = $request->input('kapasitas');
        $ac = $request->input('ac');
        $infocus = $request->input('infocus');
        $whiteboard = $request->input('whiteboard');
        $fasilitas = $request->input('fasilitas');

        if ($ac != 1) {
            $ac = '0';
        }
        if ($infocus != 1) {
            $infocus = '0';
        }
        if ($whiteboard != 1) {
            $whiteboard = '0';
        }

        $filter1 = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.ac', $ac)
            ->where('ruangan.infocus', $infocus)
            ->where('ruangan.whiteboard', $whiteboard)
            ->where('ruangan.id_gedung', $gedung)
            ->where('ruangan.kapasitas', '>=', $kapasitas)
            ->where('peminjaman.tanggal', '=', $tanggal)
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->where('waktupinjam', '<=', $wktawal)

            ->where('waktuselesai', '>=', $wktakhir)
            ->distinct('ruangan.id_ruang')

            ->get();

        $filter2 = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.ac', $ac)
            ->where('ruangan.infocus', $infocus)
            ->where('ruangan.whiteboard', $whiteboard)
            ->where('ruangan.id_gedung', $gedung)
            ->where('ruangan.kapasitas', '>=', $kapasitas)
            ->where('peminjaman.tanggal', '=', $tanggal)
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->where('waktupinjam', '<=', $wktawal)
            ->where('waktuselesai', '>=', $wktawal)
            ->where('waktuselesai', '<=', $wktakhir)
            ->distinct('ruangan.id_ruang')
            ->get();
        $filter3 = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.ac', $ac)
            ->where('ruangan.infocus', $infocus)
            ->where('ruangan.whiteboard', $whiteboard)
            ->where('ruangan.id_gedung', $gedung)
            ->where('ruangan.kapasitas', '>=', $kapasitas)
            ->where('peminjaman.tanggal', '=', $tanggal)
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->where('waktupinjam', '>=', $wktawal)
            ->where('waktupinjam', '<=', $wktakhir)
            ->where('waktuselesai', '>=', $wktakhir)
            ->distinct('ruangan.id_ruang')
            ->get();
        $filter4 = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.ac', $ac)
            ->where('ruangan.infocus', $infocus)
            ->where('ruangan.whiteboard', $whiteboard)
            ->where('ruangan.id_gedung', $gedung)
            ->where('ruangan.kapasitas', '>=', $kapasitas)
            ->where('peminjaman.tanggal', '=', $tanggal)
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->where('waktupinjam', '>=', $wktawal)
            ->where('waktupinjam', '<=', $wktakhir)
            ->where('waktuselesai', '>=', $wktawal)
            ->where('waktuselesai', '<=', $wktakhir)

            ->distinct('ruangan.id_ruang')

            ->get();

        if ($fasilitas != null) {


            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')

                ->where('ruangan.id_gedung', $gedung)
                ->where('ruangan.ac', $ac)
                ->where('ruangan.infocus', $infocus)
                ->where('ruangan.whiteboard', $whiteboard)
                ->where('ruangan.kapasitas', '>=', $kapasitas)
                ->where('ruangan.fasilitas', 'like', '%' . $fasilitas . '%')
                ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)

                ->get();
        } else {

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')


                ->where('ruangan.id_gedung', $gedung)
                ->where('ruangan.ac', $ac)
                ->where('ruangan.infocus', $infocus)
                ->where('ruangan.whiteboard', $whiteboard)
                ->where('ruangan.kapasitas', '>=', $kapasitas)
                ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
                ->get();
        }
        $id_perusahaan = Auth::user()->id_perusahaan;
        $gdg = DB::table('gedung')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pegawai.bookruanganresult', ['filter3' => $filter3, 'filter1' => $filter1, 'filter2' => $filter2, 'filter4' => $filter4, 'wktawal' => $wktawal, 'wktakhir' => $wktakhir, 'tanggal' => $tanggal, 'ac' => $ac, 'infocus' => $infocus, 'whiteboard' => $whiteboard, 'fasilitas' => $fasilitas, 'ruang' => $ruang, 'kapasitas' => $kapasitas, 'gedung' => $gedung, 'gdg' => $gdg]);
    }

    public function bookForm()
    {
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        return view('pegawai.bookruangan', ['gedung' => $gedung]);
    }

    public function showBooking()
    {
        $today = Carbon::today();
        $konsumsi = DB::table('jadwalkonsumsi')
            ->get();
        $book = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'gedung.id_gedung', 'ruangan.id_gedung')

            ->where("peminjaman.id_users", Auth::user()->id)
            ->get();
        return view('pegawai.bookinguser', ['konsumsi' => $konsumsi, 'today' => $today, 'book' => $book]);
    }

    public function showRuang($gedungfilter)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        if ($gedungfilter == 'semua') {

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->where("gedung.id_perusahaan", '=', Auth::user()->id_perusahaan)
                ->get();
        } else {
            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->where("gedung.id_perusahaan", '=', Auth::user()->id_perusahaan)
                ->where("ruangan.id_gedung", $gedungfilter)

                ->get();
        }
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        return view('pegawai.ruang', ['tanggal' => $tanggal, 'ruang' => $ruang, 'gedungfilter' => $gedungfilter, 'gedung' => $gedung]);
    }
    public function showJadwal()
    {
        $tanggal = Carbon::today()->format('Y-m-d');

        $id_ruang = null;
        $jdwl = DB::table('peminjaman')
            ->where('id_ruangan', $id_ruang)
            ->where('tanggal', $tanggal)
            ->get();
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', Auth::user()->id_perusahaan)
            ->orderBy('gedung.gedung', 'asc')
            ->get();
        return view('pegawai.jadwalruanguser', ['tanggal' => $tanggal, 'id_ruang' => $id_ruang, 'ruang' => $ruang, 'jdwl' => $jdwl]);
    }
    public function showJadwalFilter($id_ruang, $tanggal)
    {

        $jdwl = DB::table('peminjaman')
            ->join('users', 'peminjaman.id_users', 'users.id')
            ->join('departemen', 'departemen.id_departemen', 'users.id_departemen')
            ->where('peminjaman.id_ruangan', $id_ruang)
            ->where('peminjaman.tanggal', $tanggal)
            ->get();
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', Auth::user()->id_perusahaan)
            ->orderBy('gedung.gedung', 'asc')
            ->get();
        return view('pegawai.jadwalruanguser', ['tanggal' => $tanggal, 'ruang' => $ruang, 'jdwl' => $jdwl, 'id_ruang' => $id_ruang]);
    }
    public function validateJadwal(Request $request)
    {
        $validated = $request->validate([
            'tanggaljadwalruang' => 'required|date|after:yesterday',
            'jadwalruang' => 'required',
        ]);
        $id_ruang = $request->input('jadwalruang');
        $tanggal = $request->input('tanggaljadwalruang');

        return redirect('/jadwalruang/' . $id_ruang . '/' . $tanggal);
    }

    function bookRuangan(Request $request, $id_ruangan, $approve)
    {
        // $id_perusahaan = Auth::user()->id_perusahaan;
        if ($request->input('pesankonsumsi') == 'no') {
            $peminjaman = new peminjaman;
            $peminjaman->id_ruangan = $id_ruangan;
            $peminjaman->id_users = Auth::user()->id;
            $peminjaman->tanggal = $request->input('tanggal');
            $peminjaman->waktupinjam = $request->input('wkt_awal');
            $peminjaman->waktuselesai = $request->input('wkt_akhir');
            if ($approve == 0) {
                $peminjaman->approval = 1;
            } else {
                $peminjaman->approval = 0;
            }


            $peminjaman->save();
        } else {
            $peminjaman = new peminjaman;
            $peminjaman->id_ruangan = $id_ruangan;
            $peminjaman->id_users = Auth::user()->id;
            $peminjaman->tanggal = $request->input('tanggal');
            $peminjaman->waktupinjam = $request->input('wkt_awal');
            $peminjaman->waktuselesai = $request->input('wkt_akhir');
            if ($approve == 0) {
                $peminjaman->approval = 1;
            } else {
                $peminjaman->approval = 0;
            }
            $peminjaman->save();


            $cek = DB::table('konsumsi')
                ->where('id_perusahaan', Auth::user()->id_perusahaan)
                ->get();

            foreach ($cek as $cek) {
                if ($request->input($cek->id_konsumsi) != 0) {
                    $pesen = new pesankonsumsi;
                    $pesen->id_ruang = $id_ruangan;
                    $pesen->id_konsumsi = $cek->id_konsumsi;
                    $pesen->jumlahpesanan = $request->input($cek->id_konsumsi);

                    $pesen->tanggal = $request->input('tanggal');
                    $pesen->waktu = $request->input('wkt_awal');
                    $pesen->save();
                }
            }

            $id_peminjaman = DB::table('peminjaman')
                ->where('waktupinjam', $request->input('wkt_awal'))
                ->where('id_ruangan', $id_ruangan)
                ->where('tanggal', $request->input('tanggal'))
                ->get();

            $cekharga = DB::table('pesankonsumsi')
                ->join('konsumsi', 'pesankonsumsi.id_konsumsi', 'konsumsi.id_konsumsi')
                ->where('waktu', $request->input('wkt_awal'))
                ->where('id_ruang', $id_ruangan)
                ->where('tanggal', $request->input('tanggal'))
                ->get();

            $jadwal = new jadwalkonsumsi;
            $test = "";
            foreach ($id_peminjaman as $id_peminjaman) {


                $jadwal->id_peminjaman = $id_peminjaman->id_peminjaman;
            }
            $jadwal->waktu =  $request->input('wkt_awal');
            $sum = 0;
            $jadwal->pesanan = $test;
            foreach ($cekharga as $cekharga) {
                $hrg = $cekharga->jumlahpesanan * $cekharga->harga;
                $sum = $sum + $hrg;
                $test = $test . "||" . $cekharga->jumlahpesanan . " " . $cekharga->konsumsi . " ";
            }
            $test = $test . "||";
            strval($test);
            $jadwal->pesanan = $test;

            $jadwal->harga = $sum;

            $jadwal->save();
        }

        return redirect()->to('/afterlogin' . '#mybook');
    }
    public function home()
    {
        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        $tanggal = Carbon::today();
        $jdwl = null;
        $idjadwal = 'belumpilih';
        $tanggaljadwal = Carbon::today();
        $jumlah = '6';
        $id_gedung = 'semua';
        $id_perusahaan = Auth::user()->id_perusahaan;

        $konsumsiuser  = DB::table('jadwalkonsumsi')
            ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', 'peminjaman.id_peminjaman')
            ->join('ruangan', 'peminjaman.id_ruangan', 'ruangan.id_ruang')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('peminjaman.id_users', Auth::user()->id)
            ->get();

        $perusahaan = DB::table('perusahaan')
            ->where('perusahaan.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $ruangjadwal = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $gedung = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $gdg = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $peminjaman = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'gedung.id_gedung', 'ruangan.id_gedung')
            ->where("peminjaman.id_users", Auth::user()->id)
            ->get();
        $konsumsi = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $minum = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();

        return view('pegawai.index', ['konsumsiuser' => $konsumsiuser, 'ruangjadwal' => $ruangjadwal, 'tanggaljadwal' => $tanggaljadwal, 'idjadwal' => $idjadwal, 'jdwl' => $jdwl, 'tanggal' => $tanggal, 'today' => $today, 'perusahaan' => $perusahaan, 'gedung' => $gedung, 'ruang' => $ruang, 'gdg' => $gdg, 'konsumsi' => $konsumsi, 'minum' => $minum, 'peminjaman' => $peminjaman, 'id_gedung' => $id_gedung, 'jumlah' => $jumlah]);
    }
    public function homejadwal($idjadwal, $tanggaljadwal)
    {

        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        $tanggal = Carbon::today();
        $jdwl = DB::table('peminjaman')
            ->where('id_ruangan', $idjadwal)
            ->where('tanggal', $tanggaljadwal)
            ->get();
        $jumlah = '6';
        $id_gedung = 'semua';
        $id_perusahaan = Auth::user()->id_perusahaan;
        $konsumsiuser  = DB::table('jadwalkonsumsi')
            ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', 'peminjaman.id_peminjaman')
            ->join('ruangan', 'peminjaman.id_ruangan', 'ruangan.id_ruang')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('peminjaman.id_users', Auth::user()->id)
            ->get();
        $perusahaan = DB::table('perusahaan')
            ->where('perusahaan.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $ruangjadwal = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $gedung = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $gdg = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $peminjaman = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'gedung.id_gedung', 'ruangan.id_gedung')
            ->where("peminjaman.id_users", Auth::user()->id)
            ->get();
        $konsumsi = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $minum = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        return view('pegawai.index', ['konsumsiuser' => $konsumsiuser, 'ruangjadwal' => $ruangjadwal, 'tanggaljadwal' => $tanggaljadwal, 'idjadwal' => $idjadwal, 'jdwl' => $jdwl, 'tanggal' => $tanggal, 'today' => $today, 'perusahaan' => $perusahaan, 'gedung' => $gedung, 'ruang' => $ruang, 'gdg' => $gdg, 'konsumsi' => $konsumsi, 'minum' => $minum, 'peminjaman' => $peminjaman, 'id_gedung' => $id_gedung, 'jumlah' => $jumlah]);
    }

    public function homee($id_gedung, $jumlah, $tanggal)
    {
        $jdwl = null;
        $id_perusahaan = Auth::user()->id_perusahaan;
        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        $idjadwal = "belumpilih";
        $konsumsiuser  = DB::table('jadwalkonsumsi')
            ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', 'peminjaman.id_peminjaman')
            ->join('ruangan', 'peminjaman.id_ruangan', 'ruangan.id_ruang')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('peminjaman.id_users', Auth::user()->id)
            ->get();
        $ruangjadwal = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        if ($id_gedung == 'semua') {
            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->where("gedung.id_perusahaan", '=', $id_perusahaan)

                ->get();
        } else {

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->where("gedung.id_perusahaan", '=', $id_perusahaan)
                ->where("gedung.id_gedung", $id_gedung)
                ->get();
        }
        $perusahaan = DB::table('perusahaan')
            ->where('perusahaan.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();

        $gedung = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $gdg = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->get();
        $peminjaman = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'gedung.id_gedung', 'ruangan.id_gedung')
            ->where("peminjaman.id_users", Auth::user()->id)
            ->get();

        $konsumsi = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $minum = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();

        return view('pegawai.index', ['konsumsiuser' => $konsumsiuser, 'jdwl' => $jdwl, 'ruangjadwal' => $ruangjadwal, 'idjadwal' => $idjadwal, 'tanggal' => $tanggal, 'today' => $today, 'perusahaan' => $perusahaan, 'gedung' => $gedung, 'ruang' => $ruang, 'gdg' => $gdg, 'konsumsi' => $konsumsi, 'minum' => $minum, 'peminjaman' => $peminjaman, 'id_gedung' => $id_gedung, 'jumlah' => $jumlah]);
    }
    public function filterroom(Request $request)
    {

        $id = $request->input('gedungfilter');
        $jumlah = $request->input('jumlah');
        $tanggal = $request->input('tanggall');

        return redirect('afterloginn/' . $id . '/' . $jumlah . '/' . $tanggal . '#ruangan');
    }
    public function cekjadwal(Request $request)
    {
        $validated = $request->validate([
            'tanggaljadwal' => 'required|date|after:yesterday',

        ]);


        $id = $request->input('idjadwal');
        $tanggal = $request->input('tanggaljadwal');

        return redirect('afterlogins/' . $id . '/' . $tanggal . '#jadwal');
    }

    public function batalPinjam($id)
    {
        $pj = DB::table('peminjaman')
            ->where('id_peminjaman', $id)
            ->get();
        foreach ($pj as $pj) {
            $waktu = $pj->waktupinjam;
            $tanggal = $pj->tanggal;
        }
        $fp = DB::table('frekuensipemakaian')
            ->where('waktu', $waktu)
            ->where('tanggal', $tanggal);
        $fp->delete();
        $pegawai = DB::table('peminjaman')->where('id_peminjaman', $id);
        $pegawai->delete();
        $konsumsi = DB::table('jadwalkonsumsi')->where('id_peminjaman', $id);
        $konsumsi->delete();

        return redirect()->to('/mybooking');
    }
    public function lihatRuangan($wktawal, $wktakhir, $tanggal, $gedung, $kapasitas, $ac, $infocus, $whiteboard, $fasilitas)
    {
        $book = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->leftJoin('peminjaman', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->where('ruang.id_gedung', $gedung)
            ->where('ruang.kapasitas', '>=', $kapasitas)
            ->get();
        return view('pegawai.book', ['wktawal' => $wktawal, 'wktakhir' => $wktakhir, 'tanggal' => $tanggal, 'ac' => $ac, 'infocus' => $infocus, 'whiteboard' => $whiteboard, 'fasilitas' => $fasilitas, 'book' => $book]);
    }

    public function formBooking($id_ruang, $wktawal, $wktakhir, $tanggal)
    {
        $konsumsi = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $minum = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();

        $book = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.id_ruang', $id_ruang)
            ->get();

        return view('pegawai.pemesanan', ['wktawal' => $wktawal, 'wktakhir' => $wktakhir, 'tanggal' => $tanggal, 'konsumsi' => $konsumsi, 'minum' => $minum, 'book' => $book]);
    }
    function cariRuangan(Request $request)
    {
        $wktawal = $request->input('wkt_awal');
        $wktakhir = $request->input('wkt_akhir');
        $tanggal = $request->input('tanggal');
        $gedung = $request->input('gedung');
        $kapasitas = $request->input('kapasitas');
        $ac = $request->input('ac');
        $infocus = $request->input('infocus');
        $whiteboard = $request->input('whiteboard');
        $fasilitas = $request->input('fasilitas');
        $validated = $request->validate([
            'tanggal' => 'required|date|after:yesterday',

        ]);
        if ($ac != 1) {
            $ac = '0';
        }
        if ($infocus != 1) {
            $infocus = '0';
        }
        if ($whiteboard != 1) {
            $whiteboard = '0';
        }
        $gg = DB::table('peminjaman')
            ->where('tanggal', '=', $tanggal)
            ->get();

        if ($fasilitas != null) {
            $book = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->whereNotIn('id_ruang', $gg->pluck('id_ruangan'))
                ->where('ruangan.id_gedung', $gedung)
                ->where('ruangan.ac', $ac)
                ->where('ruangan.infocus', $infocus)
                ->where('ruangan.whiteboard', $whiteboard)
                ->where('ruangan.kapasitas', '>=', $kapasitas)
                ->where('ruangan.fasilitas', 'like', '%' . $fasilitas . '%')
                ->get();
        } else {

            $book = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->whereNotIn('id_ruang', $gg->pluck('id_ruangan'))
                ->where('ruangan.id_gedung', $gedung)
                ->where('ruangan.ac', $ac)
                ->where('ruangan.infocus', $infocus)
                ->where('ruangan.whiteboard', $whiteboard)
                ->where('ruangan.kapasitas', '>=', $kapasitas)

                ->get();
        }
        $id_perusahaan = Auth::user()->id_perusahaan;
        $gdg = DB::table('gedung')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();
        $peminjaman = DB::table('peminjaman')
            ->join('ruangan', 'ruangan.id_ruang', 'peminjaman.id_ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('ruangan.ac', $ac)
            ->where('ruangan.infocus', $infocus)
            ->where('ruangan.whiteboard', $whiteboard)
            ->where('ruangan.id_gedung', $gedung)
            ->where('ruangan.kapasitas', '>=', $kapasitas)
            ->where('peminjaman.tanggal', '=', $tanggal)
            ->whereIn(
                'ruangan.id_ruang',
                DB::table('peminjaman')
                    ->pluck('id_ruangan')
                    ->where([
                        ['waktupinjam', '>=', $wktawal],
                        ['waktupinjam', '>=', $wktakhir],
                    ])
            )
            ->orWhereIn(
                'ruangan.id_ruang',
                DB::table('peminjaman')
                    ->pluck('id_ruangan')
                    ->where([
                        ['waktuselesai', '<=', $wktawal],
                        ['waktuselesia', '<=', $wktakhir],
                    ])
            )
            ->distinct('ruangan.id_ruang')
            ->get();

        return view('pegawai.book', ['wktawal' => $wktawal, 'wktakhir' => $wktakhir, 'tanggal' => $tanggal, 'ac' => $ac, 'infocus' => $infocus, 'whiteboard' => $whiteboard, 'fasilitas' => $fasilitas, 'book' => $book, 'peminjaman' => $peminjaman, 'kapasitas' => $kapasitas, 'gedung' => $gedung, 'gdg' => $gdg]);
    }
}
