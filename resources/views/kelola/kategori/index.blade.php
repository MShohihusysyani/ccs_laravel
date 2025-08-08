@extends('layouts.template.master')

{{-- @section('title', 'Basic Init') --}}

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        {{-- Untuk pesan sukses --}}
        @if (session('pesan'))
            <div class="login" data-login="{{ session('pesan') }}"></div>
        @endif
        {{-- Untuk pesan error --}}
        @if (session('alert'))
            <div class="error" data-error="{{ session('alert') }}"></div>
        @endif
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Data Kategori</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""> <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Kelola</li>
                        <li class="breadcrumb-item active">Data Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!-- Container-fluid starts-->
    <div class="container-fluid datatable-init">
        <div class="row"><!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"> <i class="icon-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive  custom-scrollbar">
                            <table class="display table-striped border" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"><a><i class="fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id_kategori="{{ $kategori->id_kategori }}" data-nama_kategori="{{ $kategori->nama_kategori }}"></i></a></li>
                                                    <li class="delete"><a href="{{ route('kelola.kategori.delete', $kategori->id_kategori) }}" class="tombol-hapus"><i class="fa-solid fa-trash-can"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Zero Configuration  Ends-->
        </div>
    </div><!-- Container-fluid Ends-->

    {{-- Modal Tambah --}}
    <div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kelola.kategori.store') }}" method="POST">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Tambah Kategori</h4>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body dark-modal">
                            <div class="col-12">
                                <label class="form-label" for="first-name">Nama Kategori</label>
                                <input class="form-control" id="nama_kategori" name="nama_kategori" type="text" placeholder="Nama Kategori" aria-label="Nama Kategori" required>
                            </div>
                        {{-- </div> --}}
                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> --}}
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" id="formEditKategori">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Edit Kategori</h4>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body dark-modal">
                            <input type="hidden" name="id_kategori" id="id_kategori">
                            <div class="col-12">
                                <label class="form-label" for="first-name">Nama Kategori</label>
                                <input class="form-control" id="nama_kategori" name="nama_kategori" type="text" placeholder="Nama Klien" aria-label="Nama Klien" required>
                            </div>
                        {{-- </div> --}}
                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> --}}
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>

    
    <!-- Script untuk modal edit -->
    <script>
        $('#modalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_kategori = button.data('id_kategori')
            var nama_kategori = button.data('nama_kategori')

            var modal = $(this)
            modal.find('.modal-body #id_kategori').val(id_kategori)
            modal.find('.modal-body #nama_kategori').val(nama_kategori)

            // Ubah action form secara dinamis
            var actionUrl = '{{ url("kelola/kategori/update") }}/' + id_kategori;
            modal.find('#formEditKategori').attr('action', actionUrl);
        })
    </script>
@endsection
