@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        /* Tambahkan CSS untuk mengatur tinggi banner carousel */
        .carousel-item img {
            width: 100%;
            height: 100vh;
            /* Sesuaikan dengan tinggi yang diinginkan */
            object-fit: cover;
            /* Untuk memastikan gambar terisi penuh pada tinggi yang ditentukan */
        }

        .card {
            width:
        }

        .card .foto {
            width: 100%;
            padding: 30px;
            height: 300px;
        }

        .btn-primary {
            border-radius: 50px;
            width: 80px;
        }

        .btn-primary:hover {
            background-color: black;
        }

        .btn-success {
            border-radius: 50px;
            width: 130px;
        }

        .btn-success:hover {
            background-color: black;
        }

        .card {
            margin-top: 20px;
        }

        #button1 {
            width: 120px;
        }

        .carousel {
            height: 100%;
            min-height: 100%;
        }

        .carousel-inner {
            width: 100%;
            height: 100%;
        }

        h5 {
            text-align: center;
        }

        .card-body .card-text {
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>
</head>
{{-- program carousel --}}
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 0"></button>
        @foreach($banner as $b)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration }}"
            aria-label="Slide {{ $loop->iteration }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="4000">
            <img src="{{ asset('uploads/banners/default.jpg') }}" class="d-block w-100" alt="slide 0">
        </div>
        @foreach($banner as $b)
        <div class="carousel-item" data-bs-interval="4000">
            <img src="{{ asset('uploads/banners/'.$b->foto) }}" class="d-block w-100"
                alt="slide {{ $loop->iteration }}">
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- program card cover buku --}}
{{-- rekomendasi e-book --}}
<div class="container py-5">
    <h2 class="text-center">Rekomendasi E-Book</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($ebook as $c)
        <div class="col col-sm-3">
            <div class="card">
                <img src="{{ asset('uploads/covers/'.$c->cover) }}" class="card-img foto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $c->judul }}</h5>
                    <p class="card-text">{{ Str::limit($c->deskripsi,100) }}</p>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <a href="{{ route('detailebook', Crypt::encrypt($c->id)) }}"><button class="btn btn-success">Detail
                            E-Book</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- e-book terbaru --}}
<div class="container py-5">
    <h2 class="text-center">E-Book Terbaru</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($ebookterbaru as $d)
        <div class="col col-sm-3">
            <div class="card">
                <img src="{{ asset('uploads/covers/'.$d->cover) }}" class="card-img foto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $d->judul }}</h5>
                    <p class="card-text">{{ Str::limit($d->deskripsi,100) }}</p>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <a href="{{ route('detailebook', Crypt::encrypt($d->id)) }}"><button class="btn btn-success">Detail
                            E-Book</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- E-Book Terpopuler --}}
<div class="container py-5">
    <h2 class="text-center">E-Book Terpopuler</h2>
    <div class="d-flex justify-content-end mb-2">
        <button id="button1" class="btn btn-primary">Lihat Semua</button>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col col-sm-3">
            <div class="card">
                <img src="assets/images/Cover_buku/Cover_1.png" class="card-img foto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">{{ Str::limit('This is a wider card with supporting text below as a natural
                        lead-in to
                        additional content. This content is a little bit longer.',100) }}</p>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <button class="btn btn-success">Detail E-Book</button>
                </div>
            </div>
        </div>
        <div class="col col-sm-3">
            <div class="card">
                <img src="assets/images/Cover_buku/Cover_2.png" class="card-img foto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">{{ Str::limit('This card has supporting text below as a natural lead-in to
                        additional
                        content.', 100) }}</p>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <button class="btn btn-success">Detail E-Book</button>
                </div>
            </div>
        </div>
        <div class="col col-sm-3">
            <div class="card">
                <img src="assets/images/Cover_buku/Cover_3.png" class="card-img foto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">{{ Str::limit('This is a wider card with supporting text below as a natural
                        lead-in to
                        additional content. This card has even longer content than the first to show that equal
                        height action.', 100) }}</p>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <button class="btn btn-success">Detail E-Book</button>
                </div>
            </div>
        </div>
        <div class="col col-sm-3">
            <div class="card">
                <img src="assets/images/Cover_buku/Cover_4.png" class="card-img foto" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">{{ Str::limit('This is a wider card with supporting text below as a natural
                        lead-in to
                        additional content. This card has even longer content than the first to show that equal
                        height action.', 100) }}</p>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <button class="btn btn-success">Detail E-Book</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Kategori E-Book --}}


@endsection