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
        DB::table('proyek')->where('id_proyek',$dec_nomor_surat)->delete();
        return redirect('/');
    }

    public function update(Request $request){
        DB::table('proyek')->where('id_proyek',$request->id)->update([
            'Nomor_Surat' => $request->nomor_surat,
            'Pekerjaan' => $request->pekerjaan,
            'Wilayah_Kerja' => $request->wilker,
            'Tanggal_Awal' => $request->tgl1,
            'Tanggal_Akhir' => $request->tgl2,
            'WBS' => $request->wbs,
            'Keterangan' => $request->ket
        ]);
        return redirect('/');
    }
}
