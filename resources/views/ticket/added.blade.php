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
                    <h3>Added</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""> <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">List Ticket</li>
                        <li class="breadcrumb-item active">Added</li>
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
                            <table class="display table-striped border" id="basic-1">
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
                                        <th>Tags</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($added as $add)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $add->no_tiket }}</td>
                                            <td>{{ tanggal_indo($add->created_at) }}</td>
                                            <td>{{ $add->klien->nama_klien }}</td>
                                            <td>{{ $add->judul }}</td>
                                            <td>{{ $add->kategori }}</td>
                                            <td>
                                                @if ($add->priority == 'Low')
                                                    <span class="badge rounded-pill badge-info">Low</span>
                                                @elseif ($add->priority == 'Medium')
                                                    <span class="badge rounded-pill badge-warning">Medium</span>
                                                @elseif ($add->priority == 'High')
                                                    <span class="badge rounded-pill badge-danger">High</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($add->maxday == 90)
                                                    <span class="badge rounded-pill badge-info">90</span>
                                                @elseif ($add->maxday == 60)
                                                    <span class="badge rounded-pill badge-warning">60</span>
                                                @elseif ($add->maxday == 7)
                                                    <span class="badge rounded-pill badge-danger">7</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($add->status == 'ADDED')
                                                    <span class="badge rounded-pill badge-primary">ADDED</span>
                                                @else
                                                    <span class="badge rounded-pill badge-danger">-</span>
                                                @endif
                                            </td>
                                            <td>{{ $add->tags }}</td>
                                            <td></td>
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
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>
@endsection
