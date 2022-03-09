<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginAdmin extends Controller
{
    public function AdminLogin(){
        return view('admin.login');
    }

    public function AdminRegister(){
        return view('admin.register');
    }

    public function ListAdmin(){
        $dataadmin = Admin::paginate(10);
        return view('admin.listadmin', compact('dataadmin'));
    }

    public function EditPegawai(){
        $datapegawai = User::paginate(10);
        return view('admin.listpegawai', compact('datapegawai'));
    }

    public function UpdatePegawai($id){
        $datapegawai = User::paginate(10)->where('id', $id);
        return view('admin.editpegawai', compact('datapegawai'));
    }

    public function DeleteAdmin($id){
        $dataadmin = Admin::where('id', $id)->first();
        $dataadmin->delete();
        return view('admin.login');
    }

    public function DeletePegawai($id){
        $datapegawai1 = User::where('id', $id)->first();
        $datapegawai1->delete();
        $datapegawai = User::paginate(10);
        return view('admin.listpegawai', compact('datapegawai'));
    }

    public function EditAdmin($id){
        // $dataadmin = Admin::where('id', $id)->first()
        $dataadmin = Admin::paginate(10)->where('id', $id);
        // dd($dataadmin);
        return view('admin.edit',compact('dataadmin'));
    }

    public function UpdateAdmin(Request $request){
        DB::table('admins')
        ->where('id', $request->id)
        ->update([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return view('admin.login');
    }

    public function UpdatePegawaiFix(Request $request){
        DB::table('users')
        ->where('id', $request->id)
        ->update([
            'nip' => $request->nip,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $datapegawai = User::paginate(10);
        return view('admin.listpegawai', compact('datapegawai'));
    }

    public function DashboardAdmin(){
        return view('admin.dashboardadmin',[
            'title' => 'active'
        ]);
    }

    public function DataAdminRegister(Request $request){
        Admin::create([
            'email' => $request['email'],
            'password' => $request['password'],
            'nama_lengkap' => $request['nama_lengkap'],
        ]);
        return view('admin.login');
    }

    public function DataLoginAdmin(Request $request){
        $email = Admin::where('email', $request['email'])->first();         
        $password = Admin::where('password', $request['password'])->first();
        
        if($email && $password){
            $dataadmin = Admin::paginate(10);
            Auth::guard('admin');
            return view('admin.listadmin',compact('dataadmin'));
        }else{
            dd('Data Anda Salah, Silahkan Kembali ke Halaman Login');
        }
    }
}
