<?php

namespace App\Http\Controllers\Admin\Page\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index(){
        return view('admin.page.laporan.ulasan');
    }
}
