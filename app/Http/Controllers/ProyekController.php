<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    public function index(){
        $proyek = DB::table('proyek')->get();       
        return view('beranda', ['proyek' => $proyek]);
    }

    public function hapus($nomor_surat){
        $dec_nomor_surat = urldecode($nomor_surat);
        DB::table('proyek')->where('Nomor_Surat',$dec_nomor_surat)->delete();
        return view('beranda');
    }
}
