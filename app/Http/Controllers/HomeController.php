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
                return view('siswa.dashboard');
                break;
            case 'kurikulum':
                return view('siswa.dashboard');
                break;
            case 'tu':
                return view('siswa.dashboard');
                break;
            case 'guru':
                return view('siswa.dashboard');
                break;
            case 'siswa':
                return view('siswa.dashboard');
                break;
        }
    }
}
