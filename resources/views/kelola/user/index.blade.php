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
                    <h3>Data User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""> <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Kelola</li>
                        <li class="breadcrumb-item active">Data User</li>
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
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="icon-plus">Tambah User</i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive  custom-scrollbar">
                            <table class="display table-striped border" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Tgl Registrasi</th>
                                        <th>Last Login</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->nama_user }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ tanggal_indo($user->tgl_registrasi) }}</td>
                                            <td>{{ tanggal_indo($user->last_login) ?? 'Never' }}</td>
                                            <td>
                                                @if ($user->active == 'Aktif')
                                                    <span class="badge badge-light-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-light-danger">Non Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a><i class="fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id_user="{{ $user->id_user }}" data-nama_user="{{ $user->nama_user }}" data-username="{{ $user->username }}" data-role="{{ $user->role }}" data-active="{{ $user->active }}" data-tgl_registrasi="{{ $user->tgl_registrasi }}" data-klien_id="{{ $user->klien_id }}"></i></a></li>
                                                    <li class="delete"><a href="{{ route('kelola.user.delete', $user->id_user) }}" class="tombol-hapus"><i class="fa-solid fa-trash-can"></i></a></li>
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
            <form action="{{ route('kelola.user.store') }}" method="POST">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Tambah User</h4>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body dark-modal">
                            <div class="col-12">
                                <label class="form-label" for="first-name">Nama User</label>
                                <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Nama User" aria-label="Nama User" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="first-name">Username</label>
                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" aria-label="Username" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="first-name">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" aria-label="Username" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="role">Role</label>
                                <select class="form-select" id="role" name="role" required="">
                                    <option selected="" disabled="" value="">Pilih Role</option>
                                    <option value="superadmin">Superadmin</option>
                                    <option value="supervisor1">Supervisor 1</option>
                                    <option value="supervisor2">Supervisor 2</option>
                                    <option value="helpdesk">Helpdesk</option>
                                    <option value="implementator">Implementor</option>
                                    <option value="klien">Klien</option>
                                </select>
                            </div>
                            <div class="col-12" style="display: none" id="klien">
                                <label class="form-label" for="klien_id">Klien</label>
                                <select class="form-select" id="klien_id" name="klien_id" required="">
                                    <option selected="" disabled="" value="">Pilih Klien</option>
                                        @foreach ($kliens as $klien)
                                            <option value="{{ $klien->id_klien }}">{{ $klien->kode_klien . '-' . $klien->nama_klien }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="role">Status</label>
                                <select class="form-select" id="active" name="active" required="">
                                    <option selected="" disabled="" value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tgl Registrasi</label>
                                <input class="form-control digits" type="date" id="tgl_registrasi" name="tgl_registrasi">
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
            <form action="" method="POST" id="formEditUser">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Edit User</h4>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body dark-modal">
                            <input type="hidden" name="id_user" id="id_user">
                            <div class="col-12">
                                <label class="form-label" for="first-name">Nama User</label>
                                <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Nama User" aria-label="Nama User" required>
                            </div>
                        <div class="col-12">
                            <label class="form-label" for="first-name">Username</label>
                            <input class="form-control" id="username" name="username" type="text" placeholder="Username" aria-label="Username" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="first-name">Password</label>
                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" aria-label="Username">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="role">Role</label>
                            <select class="form-select" id="role" name="role" required="">
                                <option selected="" disabled="" value="">Pilih Role</option>
                                <option value="superadmin">Superadmin</option>
                                <option value="supervisor1">Supervisor 1</option>
                                <option value="supervisor2">Supervisor 2</option>
                                <option value="helpdesk">Helpdesk</option>
                                <option value="implementator">Implementor</option>
                                <option value="klien">Klien</option>
                            </select>
                        </div>
                        <div class="col-12" style="display: none" id="klien">
                            <label class="form-label" for="klien_id">Klien</label>
                            <select class="form-select" id="klien_id" name="klien_id">
                                <option selected="" disabled="" value="">Pilih Klien</option>
                                    @foreach ($kliens as $klien)
                                        <option value="{{ $klien->id_klien }}">{{ $klien->kode_klien . '-' . $klien->nama_klien }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="role">Status</label>
                            <select class="form-select" id="active" name="active" required="">
                                <option selected="" disabled="" value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tgl Registrasi</label>
                                <input class="form-control digits" type="date" id="tgl_registrasi" name="tgl_registrasi">
                        </div>
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
    <script>
    //Menampilakan klien saat pilih role klien
    $(document).ready(function() {
        $('#role').on('change', function() {
            if ($(this).val() === 'klien') {
                $('#klien').show();
            } else {
                $('#klien').hide();
                $('#klien_id').val('');
            }
        });
    });
    </script>

    <!-- Script untuk modal edit -->
<script>
    $('#modalEdit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_user = button.data('id_user')
        var nama_user = button.data('nama_user')
        var username = button.data('username')
        var role = button.data('role')
        var active = button.data('active')
        var klien_id = button.data('klien_id')
        var tgl_registrasi = button.data('tgl_registrasi')

        var modal = $(this)
        modal.find('.modal-body #id_user').val(id_user)
        modal.find('.modal-body #nama_user').val(nama_user)
        modal.find('.modal-body #username').val(username)
        modal.find('.modal-body #role').val(role)
        modal.find('.modal-body #active').val(active)
        modal.find('.modal-body #klien_id').val(klien_id)
        modal.find('.modal-body #tgl_registrasi').val(tgl_registrasi)

         // Tampilkan/hidden bagian klien
        if (role === 'klien') {
            modal.find('.modal-body #klien').show()
        } else {
            modal.find('.modal-body #klien').hide()
        }

        // Ubah action form secara dinamis
        var actionUrl = '{{ url("kelola/user/update") }}/' + id_user;
        modal.find('#formEditUser').attr('action', actionUrl);
    })
</script>
@endsection
