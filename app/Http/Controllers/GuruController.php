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
use Carbon\Carbon;
use PDF;

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
                'mapel'  => 'required',
                'kelas'  => 'required',
                'jam_masuk' => 'required',
                'jam_keluar' => 'required'
            ]
        );
        $id = Auth::user()->guru->id;

        // $masuk = Carbon::createFromTime('H:i:s',$request->jam_masuk);

        $data = new Jadwal;
        $data->mapel_id = $request->mapel;
        $data->guru_id  = $id;
        $data->kelas_id = $request->kelas;
        $data->jam_masuk = $request->jam_masuk;
        $data->jam_keluar = $request->jam_keluar;
        $data->save();

        $siswa = Siswa::where('kelas_id', $data->kelas_id)->pluck('id');

        foreach ($siswa as $id) {
            $data->absensi()->create([
                'siswa_id'  => $id,
                'jadwal_id' => $data->id,
                'status'    => 'Tidak Hadir'
            ]);
        }

        return redirect()->route('absensi-siswa.edit', $data)->withSuccess('Data berhasil disimpan!');
    }

    public function destroyJadwal(Jadwal $jadwal)
    {
        $absensi = $jadwal->absensi();
        
        $jadwal->delete();
        $absensi->delete();
        // var_dump($absensi);
        // dump($absensi);
        return redirect()->route('absensi-siswa.show')->with('sukses','Data Berhasil Di Hapus');
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
            $data['status'] = false;
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

    public function updateStatus(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update([$request->name => $request->value]);
    }

    public function showRekap(Request $request)
    {
        $selectedMapel = optional($request)->mapel;
        $selectedKelas = optional($request)->kelas;
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        // get mapel and class with guru_id
        $guru = Auth::user()->guru;
        $jadwal = Jadwal::select('kelas_id', 'mapel_id')->where('guru_id', $guru->id)->distinct()->get();
        $kelas = [];
        $mapel = [];
        foreach ($jadwal as $row) {
            array_push($kelas, $row->kelas_id);
            array_push($mapel, $row->mapel_id);
        }
        $mapel = Mapel::whereIn('id', $mapel)->get();
        $kelas = Kelas::whereIn('id', $kelas)->get();
        // get absensi from selected mapel and class
        $siswa = null;
        if (!is_null($selectedKelas) && !is_null($selectedMapel)) {
            $siswa = Siswa::where('kelas_id', $selectedKelas)->with(['user', 'absensi.jadwal' => function ($query) use ($selectedMapel) {
                $query->where('mapel_id', $selectedMapel);
            }])->get();
            $siswa = Siswa::where('kelas_id', $selectedKelas)->with(['user'])->whereHas('absensi.jadwal', function ($query) use ($selectedMapel) {
                return $query->where('jadwal.mapel_id', $selectedMapel);
            })->get();
        }
        return view('guru.rekap-absensi', compact('kelas', 'mapel', 'siswa'));

    }

    public function showLaporan(Request $request)
    {
        $selectedMapel = optional($request)->mapel;
        $selectedKelas = optional($request)->kelas;
        // get mapel and class with guru_id
        $guru = Auth::user()->guru;
        $jadwal = Jadwal::select('kelas_id', 'mapel_id')->where('guru_id', $guru->id)->distinct()->get();
        $kelas = [];
        $mapel = [];
        foreach ($jadwal as $row) {
            array_push($kelas, $row->kelas_id);
            array_push($mapel, $row->mapel_id);
        }
        $mapel = Mapel::whereIn('id', $mapel)->get();
        $kelas = Kelas::whereIn('id', $kelas)->get();
        // get absensi from selected mapel and class
        $siswa = null;
        if (!is_null($selectedKelas) && !is_null($selectedMapel)) {
            $siswa = Siswa::where('kelas_id', $selectedKelas)->with(['user'])->whereHas('absensi.jadwal', function ($query) use ($selectedMapel) {
                return $query->where('jadwal.mapel_id', $selectedMapel);
            })->get();
        }
        $pdf = \PDF::loadview('guru.laporan-absensi', compact('siswa'));
        return $pdf->stream();
    }


}
