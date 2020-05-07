<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        switch ($role->name) {
            case 'kepsek':
                return view('kepsek.dashboard');
                break;
            case 'kurikulum':
                return view('kurikulum.dashboard');
                break;
            case 'tu':
                return view('tu.dashboard');
                break;
            case 'guru':
                return view('guru.dashboard');
                break;
            case 'siswa':
                return view('siswa.dashboard');
                break;
        }
    }
}
