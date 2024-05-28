<?php

namespace App\Http\Controllers\Pembaca;

use App\Models\Ebook;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class DetailEbookController extends Controller
{
    public function index($id)
    {
        $id_detail = Crypt::decrypt($id);
        $detailebook = Ebook::where('id', $id_detail)->first();
        // @dd($detailebook);
        $ulasan = Ulasan::select('ulasans.id_user', 'ulasans.id_ebook', 'ulasans.komentar', 'ulasans.penilaian', 'users.nama')
            ->join('users', 'users.id', '=', 'ulasans.id_user')
            ->where('ulasans.id_ebook', $id_detail)
            ->get();
        // @dd($ulasan);

        $averageRating = $ulasan->avg('penilaian');
        return view('pembaca.detailebook', compact('detailebook', 'ulasan', 'averageRating'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'komentar' => 'required',
            'penilaian' => 'required',
            'id_ebook' => 'required'
        ], [
            'komentar.required' => 'Isien bor',
            'penilaian.required' => 'Isen bro',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        Ulasan::create([
            'id_user' => Auth::user()->id,
            'id_ebook' => $request->id_ebook,
            'komentar' => $request->komentar,
            'penilaian' => $request->penilaian,
        ]);

        // Mengembalikan respons JSON jika berhasil
        return response()->json(['status' => true]);
    }
}
