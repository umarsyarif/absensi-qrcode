<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kepsek;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\TU;
// use Illuminate\Support\Facades\Request;

class KepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('kepsek.dashboard');
    }

    public function DataTu()
    {
        // $data_tu = Kepsek::where('role_id',3)->get();
        $tu = TU::all();
        return view('kepsek.tu',compact('tu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah-tu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'identity' => 'required|numeric',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);


        $data = new Kepsek;
        $data->name = $request->name;
        $data->identity = $request->identity;
        $data->password = bcrypt($request->password) ;
        $data->role_id = 3;
        $data->save();
        return Redirect (route('tu'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
