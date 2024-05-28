<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{    
    use HasFactory;
    protected $fillable = [
        'judul',
        'id_kategori',
        'pengarang',
        'tentang_pengarang',
        'deskripsi',
        'halaman', 
        'sumber',
        'penerbit',
        'bahasa',
        'isbn',
        'tahun',
        'rekomendasi',
        'publish',
        'cover',
        'file', 
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}
