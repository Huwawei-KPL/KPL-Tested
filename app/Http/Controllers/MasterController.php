<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\perusahaan;

class MasterController extends Controller
{
    public function index($page)
    {
        if (view()->exists("master.{$page}")) {
            return view("master.{$page}");
        }
        return abort(404);
    }
    public function showPerusahaan()
    {
        $perusahaan = DB::table('perusahaan')

            ->get();

        return view('master.perusahaan', ['perusahaan' => $perusahaan]);
    }
    public function ubahPerusahaan($id)
    {
        $perusahaan = DB::table('perusahaan')
            ->where('id_perusahaan', '=', $id)
            ->get();

        return view('master.changeperusahaan', ['perusahaan' => $perusahaan]);
    }
    public function showGedung()
    {
        $gedung = DB::table('gedung')
            ->join('perusahaan', 'gedung.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->get();

        return view('master.gedung', ['gedung' => $gedung]);
    }
    public function showKonsumsi()
    {
        $konsumsi = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->get();
        $minum = DB::table('konsumsi')
            ->join('perusahaan', 'konsumsi.id_perusahaan', 'perusahaan.id_perusahaan')
            ->get();

        return view('master.konsumsi', ['konsumsi' => $konsumsi, 'minum' => $minum]);
    }
    public function showRuang()
    {
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->join('perusahaan', 'gedung.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->get();

        return view('master.ruang', ['ruang' => $ruang]);
    }
    public function showPegawai()
    {
        $pegawai = DB::table('users')
            ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
            ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->get();
        $admin = DB::table('users')
            ->join('perusahaan', 'users.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->where('users.admin', '!=', '3')
            ->whereNull('users.id_departemen')
            ->get();
        $departemen = DB::table('departemen')
            ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->get();
        $dpt = DB::table('departemen')
            ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->get();
        $perusahaan = DB::table('perusahaan')
            ->get();
        return view('master.pegawai', ['pegawai' => $pegawai, 'departemen' => $departemen, 'admin' => $admin, 'dpt' => $dpt, 'perusahaan' => $perusahaan]);
    }

    public function showPeminjaman()
    {
        $pinjam = DB::table('peminjaman')

            ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->join('users', 'peminjaman.id_users', '=', 'users.id')
            ->join('departemen', 'users.id_departemen', 'departemen.id_departemen')
            ->join('perusahaan', 'users.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->get();
        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        return view('master.jadwal', ['pinjam' => $pinjam, 'today' => $today]);
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
            ->get();
        $today = Carbon::today();
        $today->format('d-m-Y');
        date('d-m-Y', strtotime($today));
        return view('master.jadwalkonsumsi', ['pinjam' => $pinjam, 'today' => $today]);
    }

    public function addGedung()
    {
        $perusahaan = DB::table('perusahaan')
            ->get();


        return view('master.addgedung', ['perusahaan' => $perusahaan]);
    }
    public function addRuangan()
    {
        $perusahaan = DB::table('perusahaan')
            ->get();


        return view('master.addruangan', ['perusahaan' => $perusahaan]);
    }

    public function ubahGedung($id_gedung)
    {


        $gedung = DB::table('gedung')
            ->join('perusahaan', 'gedung.id_perusahaan', 'perusahaan.id_perusahaan')
            ->where('id_gedung', '=', $id_gedung)
            ->get();
        $perusahaan = DB::table('perusahaan')
            ->get();

        return view('master.ubahgedung', ['gedung' => $gedung, 'perusahaan' => $perusahaan]);
    }
    public function ubahRuangan($id_ruang, $id_perusahaan)
    {


        $ruangan = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', 'gedung.id_gedung')
            ->where('id_ruang', '=', $id_ruang)
            ->get();
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();






        return view('master.ubahruang', ['ruangan' => $ruangan, 'gedung' => $gedung]);
    }
}
