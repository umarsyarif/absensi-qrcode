<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jadwal;
use App\Mapel;
use App\Kelas;
use App\Absensi;
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
        return view('guru.absensi-siswa', compact('jadwal','siswa' ,'mapel'));
    }

    public function storeJadwal(Request $request)
    {
        $this->validate($request, 
        [
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);
        $id = Auth::user()->guru->id; 

        $data = new Jadwal;
        $data->mapel_id = $request->mapel_id;
        $data->guru_id  = $id ;
        $data->kelas_id = $request->kelas_id;
        $data->save();

        $siswa = Siswa::where('kelas_id', $data->kelas_id)->pluck('id');
        
        foreach ($siswa as $id){
            $data->absensi()->create([
                'siswa_id'  => $id,
                'jadwal_id' => $data->id,
                'status'    => false
            ]);
        }

        return redirect()->route('absensi-siswa.show-scan', $data)->withSuccess('Data berhasil disimpan!');
    }

    public function showScanabsen(Jadwal $jadwal)
    {
        $absensi = Absensi::where('jadwal_id',$jadwal->id)->get();
        return view('guru.scan-absensi', compact('absensi'));
    }

}
