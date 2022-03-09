<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi_detail;
use App\Models\User;

class LoginUser extends Controller
{
    public function index()
    {
        return view('pegawai.loginpegawai');
    }

    public function PegawaiRegister()
    {
        return view('pegawai.registerpegawai');
    }

    public function DashboardPegawai()
    {
        return view('pegawai.dashboardpegawai');
    }

    public function ListPresensi()
    {
        $datapresensi = Absensi_detail::paginate(10)->where('id', Auth::user()->id)->all();
        return view('pegawai.listpresensi',compact('datapresensi'));
    }

    public function UserRegister(Request $request)
    {   
        User::create([
            'nip' => $request['nip'],
            'nama_lengkap' => $request['nama_lengkap'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
        ]);
        return view('pegawai.loginpegawai');
    }

    public function CekLoginPegawai(Request $request){
        $nippegawai = User::where('nip', $request['nip'])->first();         
        $namapegawai = User::where('nama_lengkap', $request['nama_lengkap'])->first();
        
        if($namapegawai && $nippegawai){
            Auth::login($namapegawai);
            return view('pegawai.presensipegawai');
        }else{
            dd('Data Anda Salah, Silahkan Kembali ke Halaman Login');
        }   
    }

    public function DataPresensi(Request $request){
        $jam_masuk = strtotime($request->jam_masuk);
        $jam_pulang = strtotime($request->jam_pulang);
        $totaljamkerja = floor(($jam_pulang - $jam_masuk) / 3600);

        if((date('d', $jam_pulang) == 'Sun')){
            Absensi_detail::with('User')->create([
                'id_pegawai' => Auth::user()->id,
                'jam_masuk' => date('Y-m-d H:i:s', $jam_masuk),
                'jam_pulang' => date('Y-m-d H:i:s', $jam_pulang),
            ]);
            
        return view('pegawai.loginpegawai');
        }else{
            dd('Sekarang Hari Libur');
        }
    }
}
