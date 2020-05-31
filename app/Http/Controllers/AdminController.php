<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use App\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Kelas;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('updateGuru');
    }

    public function index()
    {
        $id = Auth::user()->identity;
        $user = User::where('identity', $id)->get();
        return view('dashboard', compact('user'));
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
            'name'              => 'required',
            'identity'          => 'required|numeric|unique:users',
            'password'          => 'required|string',
            'confirmation'      => 'required|same:password',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'no_hp'             => 'required|numeric',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->identity = $request->identity;
        $data->password = bcrypt($request->password);
        $data->role_id = 2;
        $data->save();

        $data->guru()->create([
            // 'user_id' => $data->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'          => $request->alamat,
            'no_hp'          => $request->no_hp,
        ]);

        return redirect()->route('data-guru.show')->withSuccess('Data berhasil disimpan!');
    }

    public function editGuru(User $user)
    {
        return compact('user');
    }

    public function updateGuru(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->update([$request->name => $request->value]);
    }

    public function destroyGuru(Guru $guru)
    {
        $user = $guru->user;
        $guru->delete();
        $user->delete();

        return redirect()->route('data-guru.show')->with('sukses', 'Data berhasil dihapus!');
    }

    public function showSiswa()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('admin.data-siswa', compact('siswa', 'kelas'));
    }

    public function createSiswa()
    {
        return view('admin.tambah-data-siswa');
    }

    public function storeSiswa(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'identity'      => 'required|numeric|unique:users',
            'password'      => 'required|string',
            'confirmation'  => 'required|same:password',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'no_hp'         => 'required|numeric',
            'kelas_id'      => 'required',
            'nama_ibu'      => 'required',
            'no_hp_ibu'     => 'required',
            'nama_ayah'     => 'required',
            'no_hp_ayah'    => 'required'
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->identity = $request->identity;
        $data->password = bcrypt($request->password);
        $data->role_id = 3;
        $data->save();

        $data->siswa()->create([
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'nama_ibu'      => $request->nama_ibu,
            'no_hp_ibu'     => $request->no_hp_ibu,
            'nama_ayah'     => $request->nama_ayah,
            'no_hp_ayah'    => $request->no_hp_ayah
        ]);


        return redirect()->route('data-siswa.show')->withSuccess('Data berhasil disimpan!');
    }

    public function destroySiswa($id)
    {
        //
    }

    public function showAbsensi()
    {
        // $guru = Guru::findOrFail(Auth::user()->guru->id);
        // $kelas = $guru->kelas;

        //$id_kelas = $jadwal->kelas->id;
        //$siswa = Siswa::where('id_kelas', $id_kelas)->get();


        // $jadwal = new Jadwal;
        // $id = $jadwal->id;
        // $data ->jadwal->kelas->id;
        // $siswa = Siswa::where('id_kelas', $data)->get();
        //  $id -> user->guru->id;
        $id = Auth::user()->guru->id;
        $jadwal = Jadwal::where('guru_id', $id)->get();
        // dd($jadwal);
        return view('guru.absensi-siswa', compact('jadwal'));
    }

    public function storeAbsensi()
    { }
}
