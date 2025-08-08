<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href=""><img class="img-fluid for-light" src="{{ asset('assets/images/mso.png') }}" alt="" height="65" width="65"><img class="img-fluid for-dark" src="{{ asset('assets/images/mso.png') }}" alt="" height="65" width="65"></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href=""><img class="img-fluid" src="{{ asset('assets/images/mso.png') }}" alt="" height="65" width="65"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href=""><img class="img-fluid" src="{{ asset('assets/images/mso.png') }}" alt="" height="65" width="65"></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                        <label class="badge badge-light-primary"></label><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span class="lan-3">Dashboard </span></a>
                    </li>
                    {{-- Kelola data hanya superadmin --}}
                    @if(auth()->user()->role === 'superadmin')
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="">Kelola Data</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-widget') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-widget') }}"></use>
                        </svg><span>Kelola Data </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('kelola.kategori.index') }}">Data Kategori</a></li>
                            <li><a href="{{ route('kelola.klien.index') }}">Data BPR/Klien</a></li>
                            <li><a href="{{ route('kelola.user.index') }}">Data User</a></li>
                        </ul>
                    </li>
                    @endif
                    {{-- List Ticket  --}}
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="">Ticket</h6>
                        </div>
                    </li>
                    {{-- New Tiket By Klien --}}
                    @if(auth()->user()->role === 'klien')
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav" href="{{ route('klien.new-ticket') }}">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-support-tickets') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-support-tickets') }}"></use>
                        </svg><span>New Ticket</span></a>
                    </li>
                    @endif
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-support-tickets') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-support-tickets') }}"></use>
                        </svg><span>List Ticket</span></a>
                        <ul class="sidebar-submenu">
                            @php
                                $role = auth()->user()->role;
                            @endphp
                            {{-- List Ticket hanya superadmin, supervisor1, supervisor2 --}}
                            @if(in_array($role, ['superadmin', 'supervisor1', 'supervisor2']))
                                <li><a href="{{ route('ticket.all') }}">All Ticket</a></li>
                                @if(in_array($role, ['superadmin', 'supervisor1']))
                                    <li><a href="{{ route('ticket.added') }}">Added</a></li>
                                    <li><a href="{{ route('ticket.handled') }}">Handled</a></li>
                                    <li><a href="{{ route('ticket.closed') }}">Closed</a></li>
                                @endif
                                {{-- Tiket Handled SPV2 --}}
                                @if($role === 'supervisor2')
                                    <li><a href="{{ route('ticket.added2') }}">Added</a></li>
                                    <li><a href="{{ route('ticket.handled2') }}">Handled</a></li>
                                    <li><a href="">Closed</a></li>
                                @endif
                                <li><a href="{{ route('ticket.finished') }}">Finished</a></li>
                            @endif

                            {{-- List Tiket Helpdesk --}}
                            @if($role === 'helpdesk')
                                <li><a href="">Handled</a></li>
                                <li><a href="">Forward</a></li>
                                <li><a href="">Closed</a></li>
                                <li><a href="">Finished</a></li>
                            @endif

                            {{-- List Tiket Implementator --}}
                            @if($role === 'implementator')
                                <li><a href="">Handled</a></li>
                                <li><a href="">Closed</a></li>
                                <li><a href="">Finished</a></li>
                            @endif

                            {{-- List Tiket Klien --}}
                            @if($role === 'klien')
                                <li><a href="">Added</a></li>
                                <li><a href="">Handled</a></li>
                                <li><a href="">Closed</a></li>
                                <li><a href="">Finished</a></li>
                            @endif
                        </ul>
                    </li>


                    {{-- New Tiket By Helpdesk --}}
                    @if(auth()->user()->role === 'helpdesk')
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav" href="">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-support-tickets') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-support-tickets') }}"></use>
                        </svg><span>New Ticket</span></a>
                    </li>
                    @endif

                    {{-- Laporan --}}
                    @if(in_array(auth()->user()->role, ['superadmin', 'supervisor1', 'supervisor2', 'helpdesk', 'implementator']))
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                        </svg><span>Laporan</span></a>
                        <ul class="sidebar-submenu">
                            @php
                                $role = auth()->user()->role;
                            @endphp
                            @if(in_array($role, ['superadmin','supervisor1','supervisor2']))
                                <li><a href="">Rincian Pelaporan</a></li>
                            @endif
                            @if($role === 'superadmin')
                                <li><a href="">SLA</a></li>
                                <li><a href="">Rekap Progres</a></li>
                                <li><a href="">Rekap Kategori</a></li>
                            @endif
                            {{-- Laporan Helpdesk --}}
                            @if($role === 'helpdesk')
                                <li><a href="">Rincian Pelaporan</a></li>
                            @endif
                            {{-- Laporan Implementator --}}
                            @if($role === 'implementator')
                                <li><a href="">Rincian Pelaporan</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->

{{-- @php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
@endphp

@if (!$user)
    Jika belum login, redirect ke login
    Jika tidak login (session habis), arahkan ke logout untuk reset
    <script>window.location.href = "{{ route('logout') }}";</script>
@else
    @switch($user->role)
        @case('superadmin')
            @include('layouts.template.sidebar.superadmin')
            @break
        @case('klien')
            @include('layouts.template.sidebar.klien')
            @break
        @case('sekretaris')
            @include('layouts.template.sidebar.sekretaris')
            @break
        @case('kadiv')
            @include('layouts.template.sidebar.kadiv')
            @break
        @case('dirops')
            @include('layouts.template.sidebar.dirops')
            @break
        @case('dirut')
            @include('layouts.template.sidebar.dirut')
            @break
        @case('staf')
            @include('layouts.template.sidebar.staf')
            @break
        @default
            Role tidak dikenali, aman arahkan ke logout juga
            <script>window.location.href = "{{ route('logout') }}";</script>
    @endswitch
@endif --}}
