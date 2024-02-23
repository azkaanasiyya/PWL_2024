<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return 'NIM: 2241720157 <br> Nama: Azka Anasiyya Haris';
    }

    public function articles($id) {
        return 'Halaman Artikel dengan ID '.$id;
    }
}
