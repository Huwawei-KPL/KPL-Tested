<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CetakController extends Controller
{
    //

    public function usercetakRuangan($tglawal, $tglakhir, $gedung)
    {
        $id_perusahaan = Auth::user()->id_perusahaan;
        if ($gedung != "semua") {
            $peminjaman = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('users.id_perusahaan', '=', $id_perusahaan)
                ->where('gedung.id_gedung', '=', $gedung)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $peminjaman = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('users.id_perusahaan', '=', $id_perusahaan)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('pegawai.cetak_pdf_user', compact('peminjaman'));
        //dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
    }

    public function cetakRuangan($tglawal, $tglakhir, $gedung)
    {
        $id_perusahaan = Auth::user()->id_perusahaan;
        if ($gedung != "semua") {
            $peminjaman = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('users.id_perusahaan', '=', $id_perusahaan)
                ->where('gedung.id_gedung', '=', $gedung)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $peminjaman = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('users.id_perusahaan', '=', $id_perusahaan)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('pages.cetak_pdf_tgl', compact('peminjaman'));
        //dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
    }
    public function cetakRuanganMaster($tglawal, $tglakhir, $perusahaan)
    {


        if ($perusahaan != "semua") {
            $peminjaman = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('perusahaan.id_perusahaan', '=', $perusahaan)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $peminjaman = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('master.cetaklaporan', compact('peminjaman'));
        //dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
    }
    public function cetakKonsumsiMaster($tglawal, $tglakhir, $perusahaan)
    {
        if ($perusahaan != "semua") {
            $pinjam = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('perusahaan.id_perusahaan', '=', $perusahaan)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $pinjam = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('master.cetaklaporankonsumsi', compact('pinjam'));
        //dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
    }
    public function cetakKonsumsi($tglawal, $tglakhir, $id)
    {
        if ($id != "semua") {
            $pinjam = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->where('gedung.id_gedung', '=', $id)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $pinjam = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('pages.cetaklaporankonsumsi', compact('pinjam'));
        //dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
    }

    public function filterlaporan($id_perusahaan)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = 'belum';
        $tanggal2 = 'belum';
        $gedungpilih = 'belum';
        $tabel = 'belum';
        $frek = "belum";
        $ruang = "belum";

        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->get();

        return view('pages.laporanruangan', ['ruang' => $ruang, 'frek' => $frek, 'gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih, 'tabel' => $tabel]);
    }
    public function filterlaporanshow(Request $request)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = $request->input('tanggal1');
        $tanggal2 = $request->input('tanggal2');
        $gedungpilih = $request->input('gedung');
        $frek = "belum";
        $ruang = "belum";
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', '=', Auth::user()->id_perusahaaan)
            ->get();
        $id_perusahaan = Auth::user()->id_perusahaan;
        if ($gedungpilih != "semua") {
            $tabel = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->where('users.id_perusahaan', '=', $id_perusahaan)
                ->where('gedung.id_gedung', '=', $gedungpilih)
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
                ->where('users.id_perusahaan', '=', $id_perusahaan)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('pages.laporanruangan', ['ruang' => $ruang, 'frek' => $frek, 'gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih, 'tabel' => $tabel]);
    }

    public function filterlaporanmaster()
    {
        $tanggal1 = 'belum';
        $tanggal2 = 'belum';
        $perusahaanpilih = 'belum';
        $tabel = 'belum';
        $tanggal = Carbon::today()->format('Y-m-d');
        $perusahaan = DB::table('perusahaan')

            ->get();

        return view('master.laporan', ['perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'perusahaanpilih' => $perusahaanpilih, 'tabel' => $tabel]);
    }
    public function filterlaporanmastershow(Request $request)
    {
        $tanggal1 = $request->input('tanggal1');
        $tanggal2 = $request->input('tanggal2');
        $perusahaanpilih = $request->input('perusahaan');
        $tanggal = Carbon::today()->format('Y-m-d');
        $perusahaan = DB::table('perusahaan')
            ->get();
        if ($perusahaanpilih != "semua") {
            $tabel = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->where('perusahaan.id_perusahaan', '=', $perusahaanpilih)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $tabel = DB::table('peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }


        return view('master.laporan', ['perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'perusahaanpilih' => $perusahaanpilih, 'tabel' => $tabel]);
    }
    public function filterlaporankonsumsi()
    {
        $tanggal1 = 'belum';
        $tanggal2 = 'belum';
        $perusahaanpilih = 'belum';
        $tabel = 'belum';
        $tanggal = Carbon::today()->format('Y-m-d');
        $perusahaan = DB::table('perusahaan')
            ->get();
        return view('master.laporankonsumsi', ['perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'perusahaanpilih' => $perusahaanpilih, 'tabel' => $tabel]);
    }
    public function filterlaporankonsumsishow(Request $request)
    {
        $tanggal1 = $request->input('tanggal1');
        $tanggal2 = $request->input('tanggal2');
        $perusahaanpilih = $request->input('perusahaan');
        $tanggal = Carbon::today()->format('Y-m-d');
        $perusahaan = DB::table('perusahaan')

            ->get();

        if ($perusahaanpilih != "semua") {
            $tabel = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->where('gedung.id_gedung', '=', $perusahaanpilih)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $tabel = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }

        return view('master.laporankonsumsi', ['perusahaan' => $perusahaan, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'perusahaanpilih' => $perusahaanpilih, 'tabel' => $tabel]);
    }
    public function filterlaporankonsumsii()
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = 'belum';
        $tanggal2 = 'belum';
        $gedungpilih = 'belum';
        $tabel = 'belum';
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)

            ->get();

        return view('pages.laporankonsumsi', ['gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih, 'tabel' => $tabel]);
    }
    public function filterlaporankonsumsiishow(Request $request)
    {
        $tanggal = Carbon::today()->format('Y-m-d');
        $tanggal1 = $request->input('tanggal1');
        $tanggal2 = $request->input('tanggal2');
        $gedungpilih = $request->input('gedung');
        $gedung = DB::table('gedung')
            ->where('id_perusahaan', Auth::user()->id_perusahaan)

            ->get();
        if ($gedungpilih != "semua") {
            $tabel = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->where('gedung.id_gedung', '=', $gedungpilih)
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        } else {
            $tabel = DB::table('jadwalkonsumsi')
                ->join('peminjaman', 'jadwalkonsumsi.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                ->join('ruangan', 'peminjaman.id_ruangan', '=', 'ruangan.id_ruang')
                ->join('gedung', 'ruangan.id_gedung', '=', 'gedung.id_gedung')
                ->join('users', 'peminjaman.id_users', '=', 'users.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id_departemen')
                ->join('perusahaan', 'departemen.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                ->whereBetween('peminjaman.tanggal', [$tanggal1, $tanggal2])
                ->orderBy('tanggal')
                ->orderBy('waktupinjam')
                ->get();
        }
        return view('pages.laporankonsumsi', ['gedung' => $gedung, 'tanggal' => $tanggal, 'tanggal1' => $tanggal1, 'tanggal2' => $tanggal2, 'gedungpilih' => $gedungpilih, 'tabel' => $tabel]);
    }
}
