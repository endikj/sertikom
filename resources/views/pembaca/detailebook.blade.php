@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    .card .foto {
        width: 100%;
        padding: 30px;
        height: 300px;
    }

    .book-details {
        border: 1px solid #ccc;
        padding: 20px;
        width: 800px;
    }

    .book-details img {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
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

    .penilaian {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: left;
    }

    .penilaian>span {
        display: inline-block;
        position: relative;
        width: 1.1em;
        font-size: 36px;
        color: #fff;
        text-shadow: 0 0 2px #000;
    }

    .penilaian>span:hover:before,
    .penilaian>span:hover~span:before {
        content: "\2605";
        position: absolute;
        color: #ffcc00;
    }

    .form-group {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-group p {
        margin: 0;
        color: #333;
    }

    .book-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .icon-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .icon-container .icon-text {
        margin-left: 5px;
        font-size: 14px;
        color: #555;
    }

    .icon-container .icon-text {
        margin-left: 5px;
        font-size: 14px;
        color: #555;
    }
</style>
<div class="container py-5">
    <h3 style="margin-top: 120px">Detail E-Book</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col col-sm-3">
            <div class="card">
                <img src="{{ asset('uploads/covers/'.$detailebook->cover) }}" class="card-img foto" alt="...">
                <div class="card-body d-flex justify-content-around mb-3">
                    <div class="icon-container">
                        {{-- <p>Dibaca: {{ $post->read_count }} kali</p> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                        <span class="icon-text" style="margin-left: 5px">123</span>
                    </div>
                    <div class="icon-container star-penilaian ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <span class="icon-text">({{ number_format($averageRating, 1) }})</span>
                    </div>
                </div>
                <div class="d-flex justify-content-around mb-5">
                    <button class="btn btn-primary">Baca</button>
                    <button class="btn btn-success">Unduh</button>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="book-details" style="margin-top : 20px">
                <form>
                    <div class="form-group">
                        <label for="bookTitle">Judul Buku:</label>
                        {{-- <input type="text" class="form-control" id="bookTitle"> --}}
                        <p>{{ $detailebook->judul }}</p>
                    </div>
                    <div class="form-group">
                        <label for="bookSummary">Ringkasan Buku:</label>
                        {{-- <textarea class="form-control" id="bookSummary" rows="4"></textarea> --}}
                        <p>{{ $detailebook->deskripsi }}</p>
                    </div>
                    <div class="form-group">
                        <label for="authorName">Nama Pengarang:</label>
                        {{-- <input type="text" class="form-control" id="authorName"> --}}
                        <p>{{ $detailebook->pengarang }}</p>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Tentang Pengarang:</label>
                        {{-- <input type="text" class="form-control" id="publisher"> --}}
                        <p>{{ $detailebook->tentang_pengarang }}</p>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Penerbit:</label>
                        {{-- <input type="text" class="form-control" id="publisher"> --}}
                        <p>{{ $detailebook->penerbit }}</p>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Tahun Terbit:</label>
                        {{-- <input type="text" class="form-control" id="publisher"> --}}
                        <p>{{ $detailebook->tahun }}</p>
                    </div>
                    <div class="form-group">
                        <label for="pageCount">Jumlah Halaman:</label>
                        {{-- <input type="number" class="form-control" id="pageCount"> --}}
                        <p>{{ $detailebook->halaman }}</p>
                    </div>
                    <div class="form-group">
                        <label for="pageCount">Sumber:</label>
                        {{-- <input type="number" class="form-control" id="pageCount"> --}}
                        <p>{{ $detailebook->sumber }}</p>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Bahasa:</label>
                        {{-- <input type="text" class="form-control" id="publisher"> --}}
                        <p>{{ $detailebook->bahasa }}</p>
                    </div>
                    <div class="form-group">
                        <label for="publisher">ISBN:</label>
                        {{-- <input type="text" class="form-control" id="publisher"> --}}
                        <p>{{ $detailebook->isbn }}</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <h3>Beri penilaian dan Ulasan E-Book</h3>
        <div class="penilaian">
            <span data-value="5" data-bs-toggle="modal" data-bs-target="#penilaianModal">&#9733;</span>
            <span data-value="4" data-bs-toggle="modal" data-bs-target="#penilaianModal">&#9733;</span>
            <span data-value="3" data-bs-toggle="modal" data-bs-target="#penilaianModal">&#9733;</span>
            <span data-value="2" data-bs-toggle="modal" data-bs-target="#penilaianModal">&#9733;</span>
            <span data-value="1" data-bs-toggle="modal" data-bs-target="#penilaianModal">&#9733;</span>
        </div>
    </div>

    <!--modal-->
    <div class="modal fade" id="penilaianModal" tabindex="-1" role="dialog" aria-labelledby="penilaianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="penilaianModalLabel">Berikan penilaian dan Ulasan Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_nilai" action="{{ url('/detail/create') }}" method="post">
                        <div class="form-group">
                            <label for="penilaian">penilaian:</label>
                            <select class="form-control" name="penilaian" id="penilaian">
                                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                <option value="3">&#9733;&#9733;&#9733;</option>
                                <option value="2">&#9733;&#9733;</option>
                                <option value="1">&#9733;</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="komentar">Ulasan:</label>
                            <input type="text" name="id_ebook" value="{{ $detailebook->id }}" hidden>
                            <textarea class="form-control" name="komentar" id="komentar" rows="4"></textarea>
                        </div>
                        <div">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container py-5">
    <h3>Ulasan E-Book</h3>
    <div class="form-floating">
        @foreach ($ulasan as $u)
        <div class="col col-sm-3">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <h5 class="card-title">{{ $u->nama }}</h5>
                    <span>
                        @for ($i = 0; $i < 5; $i++) @if ($i < $u->penilaian)
                            <i class="fas fa-star"></i>
                            @else
                            <i class="far fa-star"></i>
                            @endif
                            @endfor
                    </span>
                    <p class="card-text">{{ $u->komentar }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    // Global Setup
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

    document.addEventListener('DOMContentLoaded', function() {
    const showDetailsButtons = document.querySelectorAll('.show-details');
    const bookDetails = document.querySelector('.book-details');
    const readBookButtons = document.querySelectorAll('.read-book');
    let readCount = 0;
    const readCountDisplay = document.getElementById('readCount');
    const penilaianButtons = document.querySelectorAll('.penilaian > span');
    const isLoggedIn = "{{ Auth::check() }}";

    showDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            bookDetails.style.display = 'block';
        });
    });

    readBookButtons.forEach(button => {
        button.addEventListener('click', function() {
            readCount++;
            readCountDisplay.textContent = readCount;
        });
    });

    penilaianButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (!isLoggedIn) {
                window.location.href = "{{ route('login') }}";
                return;
            } else {
                const value = this.getAttribute('data-value');
                document.getElementById('penilaian').value = value;
            }
        });
    });

    const sendButton = document.querySelector('#penilaianModal button.btn-primary');
    sendButton.addEventListener('click', function() {
        if (!isLoggedIn) {
            window.location.href = "{{ route('login') }}";
            return;
        } else {
            $('#form_nilai').submit(function(event) {
                event.preventDefault();
                var url = $(this).attr('action');
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: "JSON",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {
                            Swal.fire("Error", "Some data is missing", "error");
                        } else {
                            Swal.fire(
                                'Success',
                                'Data has been saved successfully',
                                'success'
                            );
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                    },
                    complete: function() {
                    }
                });
            });
        }
    });
});
</script>
@endsection