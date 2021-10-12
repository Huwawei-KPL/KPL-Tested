<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\perusahaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\IsFalse;
use App\Models\gedung;
use App\Models\ruang;
use App\Models\pegawai;
use App\Models\departemen;
use function PHPUnit\Framework\isFalse;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class DatamasterController extends Controller
{
    //
    function addPerusahaan(Request $request)
    {
        // $id_perusahaan = Auth::user()->id_perusahaan;
        $perusahaan = new perusahaan;
        $perusahaan->nama_perusahaan = $request->input('nama_perusahaan');
        $perusahaan->lokasi = $request->input('lokasi');
        $perusahaan->deskripsi = $request->input('deskripsi');



        $perusahaan->save();

        return redirect('/showPerusahaan');
    }

    public function deletePerusahaan($id_perusahaan)
    {
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan);
        $perusahaan->delete();
        return redirect('/showPerusahaan');
    }

    function ubahPerusahaan(Request $request, $id_perusahaan)
    {
        $today = Carbon::today();
        $today->format('d-m-Y');

        $perusahaan = DB::table('perusahaan')
            ->where('id_perusahaan', '=', $id_perusahaan)
            ->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'updated_at' => $today
            ]);

        return redirect('/showPerusahaan');
    }

    function addGedung(Request $request)
    {

        $request->validate([
            'gedung' => 'required',
            'jml_lantai' => 'required|integer',
            'jml_ruangan' => 'required|integer',
            'perusahaan' => 'required',
            'lokasi' => 'required',
        ]);
        // $id_perusahaan = Auth::user()->id_perusahaan;
        $gedung = new gedung;
        $gedung->gedung = $request->input('gedung');
        $gedung->jml_lantai = $request->input('jml_lantai');
        $gedung->jml_ruangan = $request->input('jml_ruangan');
        $gedung->lokasi = $request->input('lokasi');
        $gedung->id_perusahaan = $request->input('perusahaan');
        $gedung->save();
        return redirect('/showGedungMaster');
    }
    function addAdmin(Request $request)
    {
        // $id_perusahaan = Auth::user()->id_perusahaan;
        $pegawai = new pegawai;
        $pegawai->id_perusahaan = $request->input('id_perusahaan');
        $pegawai->admin = $request->input('role');
        $pegawai->nama_user = $request->input('nama_user');
        $pegawai->email = $request->input('email');
        $pegawai->password = Hash::make($request->input('password'));
        $pegawai->save();
        return back();
    }

    public function deleteGedung($id_gedung)
    {
        $gedung = DB::table('gedung')->where('id_gedung', $id_gedung);
        $gedung->delete();
        return redirect('/showGedungMaster');
    }
    public function deleteRuang($id)
    {
        $gedung = DB::table('ruangan')->where('id_ruang', $id);
        $gedung->delete();
        return redirect('/showRuangMaster');
    }
    public function deleteUser($id)
    {
        $gedung = DB::table('users')->where('id', $id);
        $gedung->delete();
        return redirect('/showPegawaiMaster');
    }
    public function deleteKonsumsi($id)
    {
        $konsumsi = DB::table('konsumsi')->where('id_konsumsi', $id);
        $konsumsi->delete();
        return redirect('/showKonsumsi');
    }

    function editGedung(Request $request, $id_gedung)
    {

        $gedung = DB::table('gedung')
            ->where('id_gedung', '=', $id_gedung)
            ->update([
                'gedung' => $request->gedung,
                'jml_lantai' => $request->jml_lantai,
                'jml_ruangan' => $request->jml_ruangan,
                'lokasi' => $request->lokasi,
                'id_perusahaan' => $request->perusahaan
            ]);
        return redirect('/showGedungMaster');
    }

    function editRuang(Request $request, $id_ruang)
    {
        $request->validate([

            'nama_ruang' => 'required',

            'kapasitas' => 'required|integer',
            'luas' => 'required',



        ]);
        $ac = $request->ac;
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

            DB::table('ruangan')
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
            DB::table('ruangan')
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

        return redirect('/showRuangMaster');
    }
}
