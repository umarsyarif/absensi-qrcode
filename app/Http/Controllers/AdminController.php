<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use App\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Kelas;
use App\Mapel;
use PDF;

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

    public function updateProfil(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = $user->update([
            'name'  => $request->name,
        ]);

        return redirect()->route('dashboard')->with('sukses', 'Data Profil Berhasil Di Update');
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

        return redirect()->route('data-guru.show')->with('sukses', 'Data berhasil Di Tambah');
    }

    public function editGuru(User $user)
    {
        return compact('user');
    }

    public function updateGuru(Request $request, $id)
    {
        // $guru = Guru::findOrFail($id);
        // $guru->update([$request->name => $request->value]);
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
            'no_hp_ayah'    => 'required',
            // 'foto'          => 'mimes:jpg,png'
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

        return redirect()->route('data-siswa.show')->with('sukses', 'Data Berhasil Ditambah');
    }

    public function destroySiswa(Siswa $siswa)
    {
        $user = $siswa->user;
        $siswa->delete();
        $user->delete();

        return redirect()->route('data-siswa.show')->with('sukses', 'Data berhasil dihapus!');
    }

    public function showMapel(){
        $mapel = Mapel::all();
        return view('admin.data-mapel', compact('mapel'));
    }

    public function storeMapel(Request $request)
    {
        
        $this->validate($request, [
            'nama'      => 'required',
            'singkatan' => 'required'
        ]);

        $data = new Mapel;
        $data->nama = $request->nama;
        $data->singkatan = $request->singkatan;
        $data->save();

        return redirect()->route('data-mapel.show')->with('sukses', 'Data Mata Pelajaran Berhasil Ditambah');
    }

    public function destroyMapel(Mapel $mapel)
    {
        $mapel->delete($mapel);
        return redirect()->route('data-mapel.show')->with('sukses', 'Data berhasil dihapus!');
    }

    public function showAbsensi(Request $request)
    {
        $selectedMapel = optional($request)->mapel;
        $selectedKelas = optional($request)->kelas;
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $siswa = null;
        if (!is_null($selectedKelas) && !is_null($selectedMapel)) {
            $siswa = Siswa::where('kelas_id', $selectedKelas)->with(['user', 'absensi.jadwal' => function ($query) use ($selectedMapel) {
                $query->where('mapel_id', $selectedMapel);
            }])->get();
        }
        return view('admin.absensi', compact('kelas', 'mapel', 'siswa'));

    }

    public function storeAbsensi()
    { }
}
