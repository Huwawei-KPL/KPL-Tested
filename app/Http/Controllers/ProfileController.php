<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $perusahaan = DB::table('perusahaan')
            ->get();
        return view('profile.edit', ['perusahaan' => $perusahaan]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());
        $users = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->update([
                'nama_user' => $request->name,
                'email' => $request->email

            ]);
        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function passwordpegawai(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password berhasil diperbarui.'));
    }
    public function ubahpassworduser(Request $request)
    {
        $request->validate([
            'password'         => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        DB::table('users')
            ->where('id', '=', $request->get('iduser'))
            ->update(['password' => Hash::make($request->get('password'))]);
        if (Auth::user()->id_perusahaan == '') {

            return redirect('/showPegawaiMaster');
        }
        return redirect('/showPegawai/' . Auth::user()->id_perusahaan);
    }
}
