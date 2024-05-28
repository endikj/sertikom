<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PembacaEbookController extends Controller
{
    // public function index(){
    //     return view('index');
    // }
    public function index()
    {
        $today = Carbon::now()->translatedFormat('l,j F Y');
        // @dd($today);
        $banner = Banner::select('foto')->get();
        // @dd($banner);
        $ebook = Ebook::select('id', 'cover', 'judul', 'deskripsi')->where('rekomendasi', 0)->where('publish', 1)->latest()->paginate(8);
        $ebookterbaru = Ebook::select('id', 'cover', 'judul', 'deskripsi')->where('rekomendasi', 1)->where('publish', 1)->latest()->paginate(8);

        return view('pembaca.home', compact('today', 'banner', 'ebook', 'ebookterbaru'));
    }

    public function __invoke()
    {
        return view('pembaca.home');
    }
}
