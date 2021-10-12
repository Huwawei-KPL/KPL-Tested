<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\gedung;
use App\Models\ruang;
use App\Models\pegawai;
use App\Models\departemen;
use App\Models\konsumsi;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\IsFalse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isFalse;
use Carbon\Carbon;
use App\Models\frekuensipemakaian;
// use App\Http\Controllers\Auth;


class DataController extends Controller
{ba
    //
    function addGedung(Request $request, $id_perusahaan)
    {
        $request->validate([
            'gedung' => 'required',
            'jml_lantai' => 'required|integer',
            'jml_ruangan' => 'required|integer',

            'lokasi' => 'required',
        ]);

        // $id_perusahaan = Auth::user()->id_perusahaan;
        $gedung = new gedung;
        $gedung->gedung = $request->input('gedung');
        $gedung->jml_lantai = $request->input('jml_lantai');
        $gedung->jml_ruangan = $request->input('jml_ruangan');
        $gedung->lokasi = $request->input('lokasi');
        $gedung->id_perusahaan = $id_perusahaan;
        $gedung->save();
        return redirect('/showGedung/' . $id_perusahaan);
    }

    public function deleteGedung($id_gedung, $id_perusahaan)
    {
        $gedung = DB::table('gedung')->where('id_gedung', $id_gedung);
        $gedung->delete();
        return redirect('/showGedung/' . $id_perusahaan);
    }
    public function deleteKonsumsi($id)
    {
        $konsumsi = DB::table('konsumsi')->where('id_konsumsi', $id);
        $konsumsi->delete();
        return redirect('/showKonsumsii');
    }

    function ubahGedung(Request $request, $id_gedung, $id_perusahaan)
    {
        $request->validate([
            'gedung' => 'required',
            'jml_lantai' => 'required|integer',
            'jml_ruangan' => 'required|integer',

            'lokasi' => 'required',
        ]);
        $gedung = DB::table('gedung')
            ->where('id_gedung', '=', $id_gedung)
            ->update([
                'gedung' => $request->gedung,
                'jml_lantai' => $request->jml_lantai,
                'jml_ruangan' => $request->jml_ruangan,
                'lokasi' => $request->lokasi
            ]);
        return redirect('/showGedung/' . $id_perusahaan);
    }

    function addRuang(Request $request, $id_perusahaan)
    {
        $request->validate([
            'gedung' => 'required',
            'nama_ruang' => 'required',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer',
            'luas' => 'required',
            'approve' => 'required',


        ]);

        // $id_perusahaan = Auth::user()->id_perusahaan;
        $ruang = new ruang;
        $ruang->nama_ruang = $request->input('nama_ruang');
        $ruang->id_gedung = $request->input('gedung');
        $ruang->kapasitas = $request->input('kapasitas');
        $ruang->lantai = $request->input('lantai');b
        if ($request->input('ac') != NULL) {

            $ruang->ac = $request->input('ac');
        }
        if ($request->input('infocus') != NULL) {

            $ruang->infocus = $request->input('infocus');
        }
        if ($request->input('whiteboard') != NULL) {

            $ruang->whiteboard = $request->input('whiteboard');
        }

        if ($request->file('avatar') != NULL) {

            $file = $request->file('avatar');

            $name = $file->getClientOriginalName();
            $file->storeAs('public/assets/img/perusahaan', $name);
            $ruang->foto = $name;
        }

        $ruang->fasilitas = $request->input('fasilitas');
        $ruang->luas = $request->input('luas');
        $ruang->approve = $request->input('approve');



        $ruang->save();
        return redirect('/showRuang/' . $id_perusahaan);
    }
    function editRuang(Request $request, $id_ruang, $id_perusahaan)
    {
        $request->validate([

            'nama_ruang' => 'required',

            'kapasitas' => 'required|integer',
            'luas' => 'required',



        ]);

        $ac = $request->input('ac');
        $infocus = $request->input('infocus');
        $whiteboard = $request->input('whiteboard');
        if ($ac != 1) {

            $ac = '0';
        }
        if ($infocus != 1) {

            $infocus = '0';
        }
        if ($whiteboard != 1) {

            $whiteboard = '0';
        }




        if ($request->file('avatar') != NULL) {




            $file = $request->file('avatar');


            $name = $file->getClientOriginalName();
            $file->storeAs('public/assets/img/perusahaan/ruangan', $name);
            $ruang = DB::table('ruangan')
                ->where('id_ruang', '=', $id_ruang)
                ->update([
                    'nama_ruang' => $request->nama_ruang,
                    'lantai' => $request->lantai,
                    'kapasitas' => $request->kapasitas,
                    'id_gedung' => $request->gedung,
                    'ac' => $ac,
                    'infocus' => $infocus,
                    'whiteboard' => $whiteboard,
                    'luas' => $request->luas,
                    'fasilitas' => $request->fasilitas,
                    'approve' => $request->approve,
                    'foto' => $name
                ]);
        } else {
            $ruang = DB::table('ruangan')
                ->where('id_ruang', '=', $id_ruang)
                ->update([
                    'nama_ruang' => $request->nama_ruang,
                    'lantai' => $request->lantai,
                    'kapasitas' => $request->kapasitas,
                    'id_gedung' => $request->gedung,
                    'ac' => $ac,
                    'infocus' => $infocus,
                    'whiteboard' => $whiteboard,
                    'luas' => $request->luas,
                    'fasilitas' => $request->fasilitas,
                    'approve' => $request->approve

                ]);
        }
        return redirect('/showRuang/' . $id_perusahaan);
    }



    function addPegawai(Request $request, $id_perusahaan)
    {
        // $id_perusahaan = Auth::user()->id_perusahaan;
        if ($request->input('role') != '0') {


            $request->validate([
                'nama_user' => 'required',
                'role' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
        } else {
            $request->validate([
                'nama_user' => 'required',
                'role' => 'required',
                'email' => 'required|email',
                'id_departemen' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
        }




        $pegawai = new pegawai;

        if ($request->input('role') != '0') {


            $pegawai->nama_user = $request->input('nama_user');
            $pegawai->email = $request->input('email');
            $pegawai->password = Hash::make($request->input('password'));
            $pegawai->id_perusahaan = $id_perusahaan;
            $pegawai->admin = $request->role;
            $pegawai->save();
            return redirect('/showPegawai/' . $id_perusahaan);
        } else {

            $pegawai->nama_user = $request->input('nama_user');
            $pegawai->email = $request->input('email');
            $pegawai->password = Hash::make($request->input('password'));
            $pegawai->id_perusahaan = $id_perusahaan;
            $pegawai->admin = 0;
            $pegawai->id_departemen = $request->input('id_departemen');
            $pegawai->save();
            // return redirect('/showPegawai/' . $id_perusahaan);
            return redirect('/showPegawai/' . $id_perusahaan);
        }
    }

    function ubahPegawai(Request $request, $id, $id_perusahaan)
    {
        $request->validate([
            'nama_user' => 'required',
            'role' => 'required',
            'email' => 'required|email',

        ]);
        if ($request->input('role') == '0') {

            $users = DB::table('users')
                ->where('id', '=', $id)

                ->update([
                    'nama_user' => $request->nama_user,
                    'email' => $request->email,
                    'id_departemen' => $request->id_departemen,
                    'admin' => $request->role
                ]);
        } else {
            $users = DB::table('users')

                ->where('id', '=', $id)

                ->update([
                    'nama_user' => $request->nama_user,
                    'email' => $request->email,
                    'id_departemen' => null,
                    'admin' => $request->role
                ]);
        }
        return redirect('/showPegawai/' . $id_perusahaan);
    }

    public function deletePegawai($id, $id_perusahaan)
    {
        $pegawai = DB::table('users')->where('id', $id);
        $pegawai->delete();
        return redirect('/showPegawai/' . $id_perusahaan);
    }

    function ubahAdmin(Request $request, $id, $id_perusahaan)
    {

        $users = DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'nama_user' => $request->nama_user,
                'email' => $request->email,
                'admin' => $request->admin
            ]);
        return redirect('/showPegawai/' . $id_perusahaan);
    }

    function addDepartemen(Request $request, $id_perusahaan)
    {
        // $id_perusahaan = Auth::user()->id_perusahaan;
        $departemen = new departemen;
        $departemen->departemen = $request->input('departemen');
        $departemen->id_perusahaan = $id_perusahaan;
        $departemen->save();
        return redirect('/showPegawai/' . $id_perusahaan);
    }

    function deleteDepartemen($id_departemen, $id_perusahaan)
    {

        $departemen = DB::table('departemen')
            ->where('id_departemen', '=', $id_departemen)
            ->update([
                'departemen' => NULL,
            ]);
        return redirect('/showPegawai/' . $id_perusahaan);
    }

    function editDepartemen(Request $request, $id_departemen, $id_perusahaan)
    {

        $departemen = DB::table('departemen')
            ->where('id_departemen', '=', $id_departemen)
            ->update([
                'departemen' => $request->input('departemen'),
            ]);
        return redirect('/showPegawai/' . $id_perusahaan);
    }

    public function deletejadwal($id_peminjaman, $id_perusahaan)
    {
        $jadwal = DB::table('peminjaman')->where('id_peminjaman', $id_peminjaman);
        $jadwal->delete();
        return redirect('/showPeminjaman/' . $id_perusahaan);
    }

    public function deleteRuang($id_ruang, $id_perusahaan)
    {
        $ruangan = DB::table('ruangan')->where('id_ruang', $id_ruang);
        $ruangan->delete();
        return redirect('/showRuang/' . $id_perusahaan);
    }

    function terimaBook($id)
    {

        $peminjaman = DB::table('peminjaman')
            ->where('id_peminjaman', '=', $id)
            ->update([
                'approval' => '1',
            ]);
        $getpeminjaman = DB::table('peminjaman')
            ->where('id_peminjaman', '=', $id)
            ->get();
        foreach ($getpeminjaman as $gt) {

            $wktawal = Carbon::parse($gt->waktupinjam);
            $wktakhir = Carbon::parse($gt->waktuselesai);
            $id_ruangan = $gt->id_ruangan;
            $tanggal = $gt->tanggal;
        }

        $frekuensi = $wktakhir->diffInMinutes($wktawal);
        $fp = new frekuensipemakaian;
        $fp->id_ruang = $id_ruangan;
        $fp->tanggal = $tanggal;
        $fp->waktu = $wktawal;
        $fp->menit = $frekuensi;
        $fp->save();

        return back();
    }
    function tolakBook($id)
    {

        $peminjaman = DB::table('peminjaman')
            ->where('id_peminjaman', '=', $id)
            ->update([
                'approval' => '2',
                'keperluan' => 'Izin Ditolak',
            ]);
        return back();
    }

    function tambahMakanan(Request $request)
    {

        $konsumsi = new konsumsi;
        $konsumsi->konsumsi = $request->input('konsumsi');
        $konsumsi->jenis = 'Makanan';
        $hrg = $request->input('harga');
        $konsumsi->harga = $hrg;
        $konsumsi->id_perusahaan = Auth::user()->id_perusahaan;
        $konsumsi->save();
        return back();
    }

    function tambahMinuman(Request $request)
    {

        $konsumsi = new konsumsi;
        $konsumsi->konsumsi = $request->input('konsumsi');
        $konsumsi->jenis = 'Minuman';
        $hrg = $request->input('harga');
        $konsumsi->harga = $hrg;
        $konsumsi->id_perusahaan = Auth::user()->id_perusahaan;
        $konsumsi->save();
        return back();
    }
    function ubahKonsumsi(Request $request, $id)
    {
        $harga = $request->harga;
        DB::table('konsumsi')
            ->where('id_konsumsi', '=', $id)
            ->update([
                'konsumsi' => $request->konsumsi,
                'harga' => $harga

            ]);
        return back();
    }
}
