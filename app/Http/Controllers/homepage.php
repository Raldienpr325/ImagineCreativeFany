<?php

namespace App\Http\Controllers;


class homepage extends Controller
{
    public function index()
    {
        return view('pegawai.login');
    }

    public function index2()
    {
        return view('admin.main');
    }

    public function registeruser()
    {
        return view('pegawai.register');
    }
}
