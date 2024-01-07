<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\rombels;
use App\Models\rayons;
// use App\Models\Keterlambatan;

class DashboardController extends Controller
{
    public function index()
    {

        $jumlah_siswa = users::where('role', 'siswa')->count();
        $jumlah_administrator = users::where('role', 'admin')->count();
        $jumlah_pembimbing_siswa = users::where('role', 'ps')->count();
        $jumlah_rombel = rombels::count();
        $jumlah_rayon = rayons::count();
        // $jumlah_keterlambatan = Keterlambatan::count();
 
        return view('dashboard', compact('jumlah_siswa', 'jumlah_administrator', 'jumlah_pembimbing_siswa', 'jumlah_rombel', 'jumlah_rayon', ));
    }
}       
?>