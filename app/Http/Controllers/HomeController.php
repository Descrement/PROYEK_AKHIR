<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\buku;
use App\Models\pelanggan;
use Illuminate\Support\Facades\View;

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
         $peminjaman = peminjaman::count();
         $buku = buku::count();
         $pelanggan = pelanggan::count(); 

        // Pass the count to the dashboard view
        return view('home', [
            'peminjaman' => $peminjaman,
            'buku' => $buku,
            'pelanggan' => $pelanggan,
        ]);
        
    }
}
