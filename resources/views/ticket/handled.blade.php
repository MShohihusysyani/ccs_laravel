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
                    <h3>Handled</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""> <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">List Ticket</li>
                        <li class="breadcrumb-item active">Handled</li>
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
                        <h3>Filter</h3>
                    </div>
                    <div class="card-body">
                        <button  button class="btn btn-primary" id="toggle-filter">
                            <span class="icon-filter"></span>Filter
                        </button>
                        <form id="form-filter">
                            <div class="row d-none" id="form-filter-wrapper">
                                <!-- Tanggal Awal -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Awal</label>
                                        <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control">
                                        <!-- <input class="datepicker-here form-control digits" type="text" data-language="en" id="tanggal_awal" name="tanggal_awal"> -->
                                    </div>
                                </div>

                                <!-- Tanggal Akhir -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Akhir</label>
                                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control">
                                        <!-- <input class="datepicker-here form-control digits" type="text" data-language="en" id="tanggal_akhir" name="tanggal_akhir"> -->
                                    </div>
                                </div>

                                <!-- Pilih Klien -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Klien</label>
                                        <select class="form-control js-example-basic-single" id="nama_klien" name="nama_klien">
                                            <option value="">-- Pilih Klien --</option>
                                            @foreach ($kliens as $k)
                                                <option value="{{ $k->id_klien }}">{{ $k->nama_klien }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Petugas</label>
                                        <select class="form-control js-example-basic-single" id="nama_user" name="nama_user">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($handled as $h)
                                                <option value="{{ $h->nama_user }}">{{ $h->nama_user }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="filter" type="button"> <span class="icon-filter"></span>Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive  custom-scrollbar">
                            <table class="display table-striped border" id="handled">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Tiket</th>
                                        <th>Created At</th>
                                        <th>BPR/Klien</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Priority</th>
                                        <th>Max Day</th>
                                        <th>Status</th>
                                        <th>Handle By</th>
                                        <th>Tags</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Zero Configuration  Ends-->
        </div>
    </div><!-- Container-fluid Ends-->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#toggle-filter').on('click', function() {
                $('#form-filter-wrapper').toggleClass('d-none');
            });
        });
    </script>

    <script>
        var table = $('#handled').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('ticket.handled.ajax') }}",
                type: "POST",
                    data: function (d) {
                        d._token = '{{ csrf_token() }}';
                        d.tanggal_awal = $('#tanggal_awal').val();
                        d.tanggal_akhir = $('#tanggal_akhir').val();
                        d.nama_klien = $('#nama_klien').val();
                        d.nama_user = $('#nama_user').val();
                    }
            },
            order: [
                [2, 'desc']
            ],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                },
            ]
        });
        // TAMBAHKAN KODE INI
        $('#form-filter').on('submit', function(e) {
            e.preventDefault(); // Mencegah form submit default
            table.draw();       // Memuat ulang datatable dengan filter baru
        });

        // Alternatifnya, Anda bisa menargetkan tombolnya langsung
        $('#filter').on('click', function(e) {
            e.preventDefault(); // Mencegah aksi default (jika ada)
            table.draw();       // Memuat ulang datatable dengan filter baru
        });
    </script>
@endsection
