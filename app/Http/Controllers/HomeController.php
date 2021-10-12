<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_perusahaan = Auth::user()->id_perusahaan;
        $ruang = DB::table('ruangan')
            ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->count();
        $gedung = DB::table('gedung')
            ->where("gedung.id_perusahaan", '=', $id_perusahaan)
            ->count();
        $pegawai = DB::table('users')
            ->where("users.id_perusahaan", '=', $id_perusahaan)
            ->where('users.admin', '0')
            ->count();
        $departemen = DB::table('departemen')
            ->where("departemen.id_perusahaan", '=', $id_perusahaan)
            ->count();

        $dpt = DB::table('departemen')
            ->where("departemen.id_perusahaan", '=', $id_perusahaan)
            ->whereNull('departemen')
            ->count();

        $departemen = $departemen - $dpt;

        return view('dashboard', ['ruang' => $ruang, 'gedung' => $gedung, 'pegawai' => $pegawai, 'departemen' => $departemen]);
    }
    public function base()
    {
        return view('auth.login');
    }

    public function master()
    {

        $ruang = DB::table('ruangan')
            ->count();
        $gedung = DB::table('gedung')
            ->count();
        $pegawai = DB::table('users')
            ->where('users.admin', '!=', '3')
            ->count();
        $departemen = DB::table('departemen')
            ->whereNotNull('departemen')
            ->count();

        $perusahaan = DB::table('perusahaan')

            ->count();

        return view('dashboardmaster', ['ruang' => $ruang, 'gedung' => $gedung, 'pegawai' => $pegawai, 'departemen' => $departemen, 'perusahaan' => $perusahaan]);
    }
}
