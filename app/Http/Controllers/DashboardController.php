<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Gelombang;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    
    public function select_gelombang($id)
    {
        $user = User::findOrFail(Auth::id());
        $gelombang = Gelombang::findOrFail($id);
        
        $user->gelombang_id = $id;
        $user->save();
        
		session()->flash('primary', 'Selamat kamu telah terdaftar di '.$gelombang->name.'. Silahkan isi Data Identitas!');
		
        return redirect()->back();
    }
}
