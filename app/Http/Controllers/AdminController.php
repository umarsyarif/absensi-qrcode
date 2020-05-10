<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use App\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showGuru()
    {
        $guru = Guru::all();
        return view('admin.data-guru', compact('guru'));
    }

    public function createGuru()
    {
        return view('admin.create-guru');
    }

    public function storeGuru(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'identity' => 'required|numeric|unique:users',
            'password' => 'required|string',
            'confirmation' => 'required|same:password',
            'jenis_kelamin' => 'required',
            'alamat'          => 'required',
            'no_hp'          => 'required|numeric',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->identity = $request->identity;
        $data->password = bcrypt($request->password);
        $data->role_id = 2;
        $data->save();

        $data->guru()->create([
            'user_id' => $data->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'          => $request->alamat,
            'no_hp'          => $request->no_hp,
        ]);

        return redirect()->route('data-guru.show')->withSuccess('Data berhasil disimpan!');
    }

    public function updateGuru(Request $request, $id)
    {
        //
    }

    public function destroyGuru($id)
    {
        $guru = Guru::findOrFail($id);
        $user = $guru->user;
        $guru->delete();
        $user->delete();

        return redirect()->route('data-guru.show')->withSuccess('Data berhasil dihapus!');
    }

    public function showSiswa()
    {
        $siswa = Siswa::all();
        return view('admin.data-siswa', compact('siswa'));
    }

    public function createSiswa()
    {
        //
    }

    public function storeSiswa(Request $request)
    {
        //
    }

    public function destroySiswa($id)
    {
        //
    }
}
