<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jadwal;
use App\Mapel;
use App\Kelas;
use App\Absensi;
use App\User;
use App\Siswa;


class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dashboard');
    }

    public function showAbsensi()
    {
        $mapel = Mapel::all();
        $siswa = Kelas::all();

        $id = Auth::user()->guru->id;
        $jadwal = Jadwal::where('guru_id', $id)->get();
        return view('guru.absensi-siswa', compact('jadwal', 'siswa', 'mapel'));
    }

    public function storeJadwal(Request $request)
    {
        $this->validate(
            $request,
            [
                'mapel_id' => 'required',
                'kelas_id' => 'required'
            ]
        );
        $id = Auth::user()->guru->id;

        $data = new Jadwal;
        $data->mapel_id = $request->mapel_id;
        $data->guru_id  = $id;
        $data->kelas_id = $request->kelas_id;
        $data->save();

        $siswa = Siswa::where('kelas_id', $data->kelas_id)->pluck('id');

        foreach ($siswa as $id) {
            $data->absensi()->create([
                'siswa_id'  => $id,
                'jadwal_id' => $data->id,
                'status'    => false
            ]);
        }

        return redirect()->route('absensi-siswa.edit', $data)->withSuccess('Data berhasil disimpan!');
    }

    public function editAbsensi(Jadwal $jadwal)
    {
        $absensi = Absensi::where('jadwal_id', $jadwal->id)->get();
        return view('guru.scan-absensi', compact('absensi', 'jadwal'));
    }

    public function updateAbsensi(Request $request, Jadwal $jadwal)
    {
        $user = User::where('identity', $request->id)->first();
        $siswa = Siswa::where('user_id', $user->id)->first();
        if (is_null($siswa)) {
            $data['message'] = "Tidak Ditemukan!";
            return $data;
        }
        $absensi = Absensi::where('jadwal_id', $jadwal->id)->where('siswa_id', $siswa->id)->first();
        $absensi->setKehadiran();

        $data = [
            'status' => true,
            'message' => 'Siswa ' . $user->name . ' hadir!',
            'data' => $absensi
        ];
        return $data;
    }
}
