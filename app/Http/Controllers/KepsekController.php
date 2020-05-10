<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kepsek;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\TU;
use App\Kurikulum;
// use Illuminate\Support\Facades\Request;

class KepsekController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('kepsek.dashboard');
    }

    public function ShowTu()
    {
        // $data_tu = Kepsek::where('role_id',3)->get();
        $tu = TU::all();
        return view('kepsek.tu',compact('tu'));
    }

    public function CreateTu()
    {
        return view('kepsek.tambah-tu');
    }

    public function StoreTu(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'identity' => 'required|numeric|min:10',
            'password' => 'required|string|min:6',
            'confirmation' => 'required|same:password',

            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'alamat'          => 'required',
            'no_hp'          => 'required|numeric',
            'nip'          => 'required|numeric|min:10',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->identity = $request->identity;
        $data->password = bcrypt($request->password) ;
        $data->role_id = 3;
        $data->save();

        $data->tu()->create([
            'nip'          => $request -> nip,
            'nama'          => $request -> nama,
            'jenis_kelamin' => $request -> jenis_kelamin,
            'alamat'          => $request -> alamat,
            'no_hp'          => $request -> no_hp,      
        ]);

        // $data = User::create($user);
        // $data->nip = $request->nip;
        // $data->name = $request->nama;
        // $data->alamat = $request->alamat;
        // $data->no_hp = $request->no_hp;
        // $data->tu()->save();
        return Redirect (route('kepsek.tu'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditTu($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateTu(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DestroyTu($id)
    {
        //
    }

    public function ShowKurikulum()
    {
        $kurikulum = Kurikulum::all();
        return view('kepsek.kurikulum',compact('kurikulum'));
    }

    public function CreateKurikulum()
    {
        return view('kepsek.tambah-kurikulum');
    }    

    public function StoreKurikulum(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'identity' => 'required|numeric|min:10',
            'password' => 'required|string|min:6',
            'confirmation' => 'required|same:password',

            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'alamat'          => 'required',
            'no_hp'          => 'required|numeric',
            'nip'          => 'required|numeric|min:10',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->identity = $request->identity;
        $data->password = bcrypt($request->password) ;
        $data->role_id = 2;
        $data->save();

        $data->kurikulum()->create([
            'nip'          => $request -> nip,
            'nama'          => $request -> nama,
            'jenis_kelamin' => $request -> jenis_kelamin,
            'alamat'          => $request -> alamat,
            'no_hp'          => $request -> no_hp,      
        ]);

        return Redirect (route('kepsek.kurikulum'));

    }
}
