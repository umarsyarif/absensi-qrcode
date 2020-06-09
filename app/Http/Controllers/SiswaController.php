<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jadwal;
use App\Mapel;
use App\Absensi;
use App\User;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.dashboard');
    }

    public function updateProfil(Request $request, User $user)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'              => 'required',
            'alamat'            => 'required',
            'no_hp'             => 'required|numeric',
            'nama_ibu'          => 'required',
            'no_hp_ibu'         => 'required',
            'nama_ayah'         => 'required',
            'no_hp_ayah'        => 'required',
            'foto'              => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $user->update([
            'name'  => $request->name 
        ]);

        $user->siswa()->update([
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'nama_ibu'      => $request->nama_ibu,
            'no_hp_ibu'     => $request->no_hp_ibu,
            'nama_ayah'     => $request->nama_ayah,
            'no_hp_ayah'    => $request->no_hp_ayah
        ]);

        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            
            $user->siswa()->update([
                'foto'  => $request->file('foto')->getClientOriginalName()
            ]);
        }

        return redirect()->route('dashboard')->with('sukses', 'Data Profil Berhasil Di Update');
    }

    public function showAbsensi(Request $request)
    {
        $mata_pelajaran = $request->mapel;

        $siswa = Auth::user()->siswa;
        $biodata = Auth::user();
        // $mapel = Mapel::all();
        $mapel_id = Jadwal::select('mapel_id')->where('kelas_id', $siswa->kelas_id)->distinct()->get();
        $mapel = [];
        foreach ($mapel_id as $row) {
            array_push($mapel, $row->mapel_id);
        }
        $mapel = Mapel::whereIn('id', $mapel)->get();

        $jadwal = Jadwal::where('mapel_id', $mata_pelajaran)->where('kelas_id', $siswa->kelas_id)->pluck('id');
        $jadwals = [];
        $data = [];
            foreach ($jadwal as $data) {
                $absensi = Absensi::where('jadwal_id',$data)
                    ->where('siswa_id',$siswa->id)->first();
                    array_push($jadwals, $absensi);
            }

        $absensi = [
            'nama' => $siswa->user->name,
            'nisn' => $siswa->user->identity,
            'status' => '"Hadir","Sakit","Alpha"'
            // 'absen' => $jadwals
            ];

        return view('siswa.absensi', compact('mapel','jadwals', 'biodata'));
            // foreach ($jadwals as $data) {
            //             $status = $data->status;
            //             $hadir=0;
            //             if($status == 'Hadir'){
            //                 // dump($hadir+1);
                            
            //                 echo $hadir+=1;
            //                 return $hadir->countBy(); 
            //             }elseif ($status == 'Tidak Hadir') {
            //                 echo 'bolos lu';
            //             }else {
            //                 echo 'hm';
            //             }
            //          }

            // dd($jadwals);
            
                // dd($absensi['status']);
                // $absens =[
                //     'data' => $jadwals
                // ];
               
                   
        
    }
    
    public function idcard()
    {
        $user = Auth::user();
        return view('siswa.idcard-siswa', compact('user'));
        // $pdf = \PDF::loadview('siswa.idcard-siswa', compact('user'));
        // return $pdf->stream();
    }
}
