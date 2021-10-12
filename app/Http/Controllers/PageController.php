<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }
        return abort(404);
    }

    public function showGedung($id_perusahaan)
    {
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pages.gedung', ['gedung' => $gedung]);
    }

    public function showRuang($id_perusahaan)
    {
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where('gedung.id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pages.ruang', ['ruang' => $ruang]);
    }
    public function showFrek()
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = 'belum';
        $tanggal2 = 'belum';
        $gedungpilih = 'belum';
        $frek = 'belum';
        $ruang = 'belum';
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->get();

        return view('pages.frekuensiruangan', ['ruang' => $ruang, 'gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih, 'frek' => $frek]);
    }
    public function showDataFrek(Request $request)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = $request->input('tanggal1');
        $tanggal2 = $request->input('tanggal2');
        $gedungpilih = $request->input('gedung');
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->get();
        if ($gedungpilih == 'semua') {
            $frek = DB::table('frekuensipemakaian')
                ->select('ruangan.nama_ruang', DB::raw('SUM(frekuensipemakaian.menit) as menit'))
                ->join('ruangan', 'frekuensipemakaian.id_ruang', 'ruangan.id_ruang')
                ->whereBetween('frekuensipemakaian.tanggal', [$tanggal1, $tanggal2])
                ->groupBy('ruangan.nama_ruang')
                ->orderBy('menit', 'asc')
                ->get();

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->where('gedung.id_perusahaan', '=', Auth::user()->id_perusahaan)
                ->whereNotIn('nama_ruang', $frek->pluck('nama_ruang'))
                ->orderBy('gedung.gedung', 'asc')
                ->get();
        } else {
            $frek = DB::table('frekuensipemakaian')
                ->select('ruangan.nama_ruang', DB::raw('SUM(frekuensipemakaian.menit) as menit'))
                ->join('ruangan', 'frekuensipemakaian.id_ruang', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->where('gedung.id_gedung', $gedungpilih)
                ->whereBetween('frekuensipemakaian.tanggal', [$tanggal1, $tanggal2])
                ->groupBy('ruangan.nama_ruang')
                ->orderBy('menit', 'asc')
                ->get();

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->where('gedung.id_perusahaan', '=', Auth::user()->id_perusahaan)
                ->where('gedung.id_gedung', $gedungpilih)
                ->whereNotIn('nama_ruang', $frek->pluck('nama_ruang'))
                ->orderBy('gedung.gedung', 'asc')
                ->get();
        }



        return view('pages.frekuensiruangan', ['ruang' => $ruang, 'frek' => $frek, 'gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih]);
    }
    public function showDataFrekuensi($tanggal1, $tanggal2, $gedungpilih)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tabel = 'belum';
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->get();
        if ($gedungpilih == 'semua') {
            $frek = DB::table('frekuensipemakaian')
                ->select('ruangan.nama_ruang', DB::raw('SUM(frekuensipemakaian.menit) as menit'))
                ->join('ruangan', 'frekuensipemakaian.id_ruang', 'ruangan.id_ruang')
                ->whereBetween('frekuensipemakaian.tanggal', [$tanggal1, $tanggal2])
                ->groupBy('ruangan.nama_ruang')
                ->orderBy('menit', 'asc')
                ->get();

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->where('gedung.id_perusahaan', '=', Auth::user()->id_perusahaan)
                ->whereNotIn('nama_ruang', $frek->pluck('nama_ruang'))
                ->orderBy('gedung.gedung', 'asc')
                ->get();
        } else {
            $frek = DB::table('frekuensipemakaian')
                ->select('ruangan.nama_ruang', DB::raw('SUM(frekuensipemakaian.menit) as menit'))
                ->join('ruangan', 'frekuensipemakaian.id_ruang', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->where('gedung.id_gedung', $gedungpilih)
                ->whereBetween('frekuensipemakaian.tanggal', [$tanggal1, $tanggal2])
                ->groupBy('ruangan.nama_ruang')
                ->orderBy('menit', 'asc')
                ->get();

            $ruang = DB::table('ruangan')
                ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
                ->where('gedung.id_perusahaan', '=', Auth::user()->id_perusahaan)
                ->where('gedung.id_gedung', $gedungpilih)
                ->whereNotIn('nama_ruang', $frek->pluck('nama_ruang'))
                ->orderBy('gedung.gedung', 'asc')
                ->get();
        }



        return view('pages.laporanruangan', ['ruang' => $ruang, 'frek' => $frek, 'gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih, 'tabel' => $tabel]);
    }

    public function showPegawai($id_perusahaan)
    {
        $pegawai = DB::table('users')
            ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
            ->where('departemen.id_perusahaan', '=', $id_perusahaan)
            ->get();
        $admin = DB::table('users')
            ->where('users.id_perusahaan', '=', $id_perusahaan)
            ->whereNull('id_departemen')
            ->get();








        $departemen = DB::table('departemen')
            ->where('departemen.id_perusahaan', '=', $id_perusahaan)
            ->get();




        return view('pages.pegawai', ['pegawai' => $pegawai, 'departemen' => $departemen, 'admin' => $admin]);
    }
    public function showKonsumsi()
    {
        $konsumsi = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $minum = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('konsumsi.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();

        return view('pages.konsumsi', ['konsumsi' => $konsumsi, 'minum' => $minum]);
    }
    public function showJadwalKonsumsi()
    {
        $pinjam = DB::table('jadwalkonsumsi')
            ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
            ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->join('users', 'peminjaman.id_users', '=', 'users.id')
            ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
            ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->where('gedung.id_perusahaan', Auth::user()->id_perusahaan)
            ->get();
        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        return view('pages.jadwalkonsumsi', ['pinjam' => $pinjam, 'today' => $today]);
    }
    public function showPeminjaman($id_perusahaan)
    {
        $pinjam = DB::table('peminjaman')
            ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
            ->join('users', 'peminjaman.id_users', '=', 'users.id')
            ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
            ->where('users.id_perusahaan', '=', $id_perusahaan)
            ->get();
        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        return view('pages.jadwal', ['pinjam' => $pinjam, 'today' => $today]);
    }

    public function ubahGedung($id_gedung)
    {


        $gedung = DB::table('gedung')
            ->where('id_gedung', '=', $id_gedung)
            ->get();

        return view('pages.ubahgedung', ['gedung' => $gedung]);
    }

    public function addRuangPage($id_perusahaan)
    {
        $gedung = DB::table('gedung')
            ->where('gedung.id_perusahaan', '=', $id_perusahaan)
            ->get();

        $lantai = DB::table('gedung')
            ->where('gedung.id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pages.addruang', ['lantai' => $lantai, 'gedung' => $gedung]);
    }

    public function ajax($id_gedung)
    {


        $lantai = DB::table('gedung')
            ->where('id_gedung', $id_gedung)
            ->lists("jml_lantai");
        return json_encode($lantai);
    }

    public function addPegawai($id_perusahaan)
    {
        $departemen = DB::table('departemen')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pages.addpegawaiadmin', ['departemen' => $departemen]);
    }

    public function ubahPegawai($id, $id_perusahaan)
    {
        $users = DB::table('users')
            ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
            ->where('users.id', '=', $id)
            ->get();
        $departemen = DB::table('departemen')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();
        return view('pages.ubahpegawai', ['users' => $users, 'departemen' => $departemen]);
    }
    public function ubahAdmin($id, $id_perusahaan)
    {
        $users = DB::table('users')
            ->leftJoin('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
            ->where('users.id', '=', $id)
            ->get();
        $departemen = DB::table('departemen')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pages.ubahpegawai', ['users' => $users, 'departemen' => $departemen]);
    }

    public function ubahPasswordUser($id)
    {
        $users = DB::table('users')
            ->where('users.id', '=', $id)
            ->get();
        return view('pages.ubahpassworduser', ['users' => $users]);
    }

    public function ubahDepartemen($id_departemen)
    {
        $departemen = DB::table('departemen')
            ->where('departemen.id_departemen', '=', $id_departemen)
            ->get();

        $user = DB::table('users')
            ->where('users.id_departemen', '=', $id_departemen)
            ->get();

        return view('pages.ubahdepartemenpegawai', ['departemen' => $departemen, 'user' => $user]);
    }

    public function ubahRuangan($id_ruang, $id_perusahaan)
    {
        $ruangan = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where('id_ruang', '=', $id_ruang)
            ->get();

        $lantai = DB::table('gedung')
            ->where('gedung.id_perusahaan', '=', $id_perusahaan)
            ->get();
        return view('pages.ubahruangadmin', ['ruangan' => $ruangan, 'lantai' => $lantai]);
    }
}
