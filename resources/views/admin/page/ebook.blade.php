@extends('admin.layout.main')
@section('title', 'Ebook')

@section('isi')
<div class="main-content" id="dataadmin">
    <div class="title">
        <h5>halaman Ebook</h5>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <button type="button" id="btn-add" class="btn btn-primary fs-3 mb-3 rounded-2 btn-tambah"
                        data-bs-toggle="modal" data-bs-target="#form_modal">Tambah data</button>
                    <table id="ebookTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Pengarang</th>
                                <th>Tahun</th>
                                <th>Rekomendasi</th>
                                <th>Publish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Pengarang</th>
                                <th>Tahun</th>
                                <th>Rekomendasi</th>
                                <th>Publish</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade hidden" id="form_modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel"><i class="fa-solid fa-users"></i> Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_tambah" action="{{ route('ebook.create') }}" method="POST" role="form">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input id="judul" type="text" name="judul" value=""
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="judul">
                                <div class="invalid-feedback">
                                    @error('judul')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="kategori">kategori:</label>
                                <select id="kategori" name="kategori"
                                    class="form-control @error('kategori') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('kategori')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="pengarang">Pengarang:</label>
                                <input id="pengarang" type="text" name="pengarang" value=""
                                    class="form-control @error('pengarang') is-invalid @enderror"
                                    placeholder="pengarang">
                                <div class="invalid-feedback">
                                    @error('pengarang')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tentang_pengarang">Tentang Pengarang:</label>
                                <textarea id="tentang_pengarang" type="text" name="tentang_pengarang" value=""
                                    class="form-control @error('tentang_pengarang') is-invalid @enderror"
                                    placeholder="tentang pengarang"></textarea>
                                <div class="invalid-feedback">
                                    @error('tentang_pengarang')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea id="deskripsi" type="text" name="deskripsi" value=""
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    placeholder="deskripsi"></textarea>
                                <div class="invalid-feedback">
                                    @error('deskripsi')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="halaman">Halaman:</label>
                                <input id="halaman" type="number" name="halaman" value=""
                                    class="form-control @error('halaman') is-invalid @enderror" placeholder="halaman">
                                <div class="invalid-feedback">
                                    @error('halaman')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="sumber">Sumber:</label>
                                <input id="sumber" type="text" name="sumber" value=""
                                    class="form-control @error('sumber') is-invalid @enderror" placeholder="sumber">
                                <div class="invalid-feedback">
                                    @error('sumber')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="penerbit">Penerbit:</label>
                                <input id="penerbit" type="text" name="penerbit" value=""
                                    class="form-control @error('penerbit') is-invalid @enderror" placeholder="penerbit">
                                <div class="invalid-feedback">
                                    @error('penerbit')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="bahasa">Bahasa:</label>
                                <input id="bahasa" type="text" name="bahasa" value=""
                                    class="form-control @error('bahasa') is-invalid @enderror" placeholder="bahasa">
                                <div class="invalid-feedback">
                                    @error('bahasa')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="isbn">ISBN:</label>
                                <input id="isbn" type="text" name="isbn" value=""
                                    class="form-control @error('isbn') is-invalid @enderror" placeholder="isbn">
                                <div class="invalid-feedback">
                                    @error('isbn')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tahun">Tahun:</label>
                                <input id="tahun" type="number" min="2000" name="tahun" value=""
                                    class="form-control @error('tahun') is-invalid @enderror" placeholder="tahun">
                                <div class="invalid-feedback">
                                    @error('tahun')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="cover">Cover:</label>
                                <input id="cover" type="file" name="cover" value=""
                                    class="form-control @error('cover') is-invalid @enderror" placeholder="cover"
                                    accept="image/jpeg, image/jpg, image/png, image/gif,">
                                <div class="invalid-feedback">
                                    @error('cover')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="file">File:</label>
                                <input id="file" type="file" name="file" value=""
                                    class="form-control @error('file') is-invalid @enderror" placeholder="file"
                                    accept="application/pdf">
                                <div class="invalid-feedback">
                                    @error('file')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" id="btn-close" class="btn-hapus btn btn-warning rounded-2"
                                data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" id="btn-simpan"
                                class="btn-tambah btn btn-primary rounded-2 ms-1">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal foto --}}
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="fotoModalContent">
            </div>
        </div>
    </div>
</div>

{{-- modal ebook --}}
<div class="modal fade" id="ebookModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="ebookModalContent">
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    // Global Setup
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        function reload_table() {
            $('#ebookTable').DataTable().ajax.reload();
        }

        function reset_form() {
            $('#form_tambah').attr('action', "{{ route('ebook.create') }}");
            $('#form_tambah')[0].reset();
        }
        
        $('.form-control').on('input', function() {
            $(this).removeClass('is-invalid');
            $(this).siblings('.invalid-feedback').empty();
        });

        $('#btn-add').click(function() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();

            $('.modal-title').html('<h1 class="modal-title fs-5" id="ModalLabel"><i class="fa-solid fa-users"></i> Tambah Data</h1>');
            $('#btn-simpan').html('Tambah');
            reset_form();
        });

        // Fungsi index
        $(document).ready(function() {
            $('#ebookTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                orderClasses: false,
                info: false,
                ajax: "{{ route('ebook.list') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'judul', name: 'judul' },
                    { data: 'kategori', name: 'kategori' },
                    { data: 'pengarang', name: 'pengarang' },
                    { data: 'tahun', name: 'tahun' },
                    { data: 'rekomendasi', name: 'rekomendasi', 
                        render: function(data, type, row, meta) {
                            var rekomendasi = data ? 'Rekomendasi' : 'Tidak Rekomendasi';
                            var btnRekomendasi = data ? 'btn-succcess' : 'btn-danger';
                            return `<button class="btn ${btnRekomendasi} btn-sm" onclick="rekomendasi(${row.id})">${rekomendasi}</button>`;
                        }
                    },
                    { data: 'publish', name: 'publish', 
                        render: function(data, type, row, meta) {
                            var publish = data ? 'Publish' : 'Unpublish';
                            var btnPublish = data ? 'btn-success' : 'btn-danger';
                            return `<button class="btn ${btnPublish} btn-sm" onclick="publish(${row.id})">${publish}</button>`;
                        }
                    },
                    { data: 'action', name: 'action', orderable: true, searchable: true }
                ]
            });
        });

        // Fungsi Tambah data
        $(function() {
            $('#form_tambah').submit(function(event) {
                event.preventDefault();
                event.stopImmediatePropagation();
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
                        $('.error-message').empty();
                        if (data.errors) {
                            Swal.fire("Error", "Datanya ada yang kurang", "error");

                            $.each(data.errors, function(key, value) {
                                $('#' + key).addClass('is-invalid').siblings('.invalid-feedback').text(value);
                            });

                            $('.form-control').on('input', function() {
                                $(this).removeClass('is-invalid');
                                $(this).siblings('.invalid-feedback').empty();
                            });

                        } else {
                            reset_form();
                            Swal.fire(
                                'Sukses',
                                'Data berhasil disimpan',
                                'success'
                            );
                            $('#form_modal').modal('hide');
                            reload_table();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                    },
                    complete: function() {
                    }
                });
            });
        });

        //fungsi lihat foto
        function view_cover(id, judul) {
            $('.modal-title').html('<h1 class="modal-title fs-5" id="ModalLabel">'+ judul +'</h1>');
            console.log(judul)

            $(document).on("click", ".btn-close", function() {
                $('#fotoModal').css('display', 'none');
            });

            $(window).on("click", function(event) {
                if (event.target == document.getElementById('fotoModal')) {
                    $('#fotoModal').css('display', 'none');
                }
            });

            $.ajax({
                url: '/get-cover/' + id,
                type: 'GET',
                success: function(response) {
                    $('#fotoModalContent').attr('src', response.foto_url).css('max-width', '100%').css('max-height', '100%');
                    $('#fotoModal').modal('show');
                },
                error: function(xhr) {
                    alert('Gagal memuat foto. Silakan coba lagi.');
                }
            });
        };

        //fungsi lihat ebook
        function view_ebook(id, judul) {
            $('.modal-title').html('<h1 class="modal-title fs-5" id="ModalLabel">'+ judul +'</h1>');
            console.log(judul)

            $(document).on("click", ".btn-close", function() {
                $('#ebookModal').css('display', 'none');
            });

            $(window).on("click", function(event) {
                if (event.target == document.getElementById('ebookModal')) {
                    $('#ebookModal').css('display', 'none');
                }
            });

            $.ajax({
                url: '/get-ebook/' + id,
                type: 'GET',
                success: function(response) {
                    // $('#ebookModalContent').attr('src', response.foto_url).css('max-width', '100%').css('max-height', '100%');
                    $('#ebookModal').modal('show');
                },
                error: function(xhr) {
                    alert('Gagal memuat foto. Silakan coba lagi.');
                }
            });
        };

        //fungsi publish unpublish
        window.publish = function(id) {
            $.ajax({
                url: "{{ url('ebook/publish') }}/" + id,
                type: 'POST',
                success: function(response) {
                    reload_table();
                    // alert(response.success);
                    Swal.fire(
                        'Sukses',
                        'Status berhasil diperbarui',
                        'success'
                    );
                }
            });
        };

        //fungsi rekomendasi
        window.rekomendasi = function(id) {
            $.ajax({
                url: "{{ url('ebook/rekomendasi') }}/" + id,
                type: 'POST',
                success: function(response) {
                    reload_table();
                    // alert(response.success);
                    Swal.fire(
                        'Sukses',
                        'Status berhasil diperbarui',
                        'success'
                    );
                }
            });
        };

        // Fungsi Edit dan Update
        function edit_data(id) {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();

            $('.modal-title').html('<h1 class="modal-title fs-5" id="ModalLabel"><i class="fa-solid fa-users"></i> Edit Data</h1>');
            $('#btn-simpan').html('Simpan');

            $('#form_tambah')[0].reset();
            $('#form_tambah').attr('action', '/ebook/update?q=' + id);
            $.ajax({
                url: "{{ route('ebook.edit') }}",
                type: "POST",
                data: {
                    q: id
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);

                    if (data.status) {
                        var isi = data.isi;
                        $('#judul').val(isi.judul);
                        $('#id_kategori').val(isi.kategori);
                        $('#pengarang').val(isi.pengarang);
                        $('#tentang_pengarang').val(isi.tentang_pengarang);
                        $('#deskripsi').val(isi.deskripsi);
                        $('#halaman').val(isi.halaman);
                        $('#sumber').val(isi.sumber);
                        $('#penerbit').val(isi.penerbit);
                        $('#bahasa').val(isi.bahasa);
                        $('#isbn').val(isi.isbn);
                        $('#tahun').val(isi.tahun);
                        $('#cover').val(isi.cover);
                        $('#file').val(isi.file);
                    } else {
                        Swal.fire("SALAH BOS", "Datanya ada yang salah", "error");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire('Upss..!', 'Terjadi kesalahan jaringan error message: ' + errorThrown,
                        'error');
                }
            });
        };

        // Fungsi Hapus
        function delete_data(id, judul) {

            Swal.fire({
                title: 'Hapus ' + judul + '?',
                text: "Apakah anda yakin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('ebook.delete') }}",
                        type: "POST",
                        data: {
                            q: id
                        },
                        dataType: "JSON",
                    });
                    Swal.fire(
                        'Hapus!',
                        'Akun berhasil Dihapus',
                        'success'
                    )
                    reload_table();
                }
            })
        };
        

</script>
@endsection