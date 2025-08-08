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
                    <h3>All Ticket</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""> <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">List Ticket</li>
                        <li class="breadcrumb-item active">All Ticket</li>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive  custom-scrollbar">
                            <table id="all_ticket" class="display table-striped border" id="basic-1">
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
    $('#all_ticket').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('ticket.all.ajax') }}",
            type: "GET",
            data: function (d) {
                d._token = '{{ csrf_token() }}'; // CSRF token
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
    </script>
@endsection
