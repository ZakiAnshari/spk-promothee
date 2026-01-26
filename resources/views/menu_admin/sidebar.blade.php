<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header my-3" style="margin: 0px;display: flex; justify-content: center; align-items: center;">
            <div class="auth-header">
                <div class="container-fluid justify-content-center align-items-center flex-column">

                    <a class="navbar-brand d-flex justify-content-center" href="#">
                        <strong>REKOM-INAP</strong>
                    </a>

                    <!-- Digital Clock -->
                    <div id="digital-clock" class="text-center mt-1"></div>

                </div>
            </div>
        </div>
        <hr>
        <div class="navbar-content">
            <!-- Elemen Tanggal -->
         

            <ul class="pc-navbar">
                {{-- DASHBOARD --}}
                <li class="pc-item">
                    <a href="/dashboard" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                @if (auth()->check() && in_array(auth()->user()->role_id, [1, 2]))
                    {{-- FASILITAS --}}
                    <li class="pc-item {{ request()->is('penginapan*') ? 'active' : '' }}">
                        <a href="/penginapan" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-building"></i></span>
                            <span class="pc-mtext">Alternatif</span>
                        </a>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->role_id == 1)
                    {{-- Kriteria --}}
                    <li class="pc-item {{ request()->is('kriteria*') ? 'active' : '' }}">
                        <a href="/kriteria" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-adjustments-horizontal"></i></span>
                            <span class="pc-mtext">Kriteria</span>
                        </a>
                    </li>
                @endif
                {{-- Penilaian --}}
                @if (auth()->check() && auth()->user()->role_id != 4)
                    <li class="pc-item {{ request()->is('penilaian*') ? 'active' : '' }}">
                        <a href="/penilaian" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-scale"></i></span>
                            <span class="pc-mtext">Penilaian</span>
                        </a>
                    </li>
                @endif
                {{-- Perhitungan --}}
                <li class="pc-item {{ request()->is('perhitungan*') ? 'active' : '' }}">
                    <a href="/perhitungan" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-calculator"></i></span>
                        <span class="pc-mtext">Hitung</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->is('laporan*') ? 'active' : '' }}">
                    <a href="/laporan" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-file-text"></i></span>
                        <span class="pc-mtext">Laporan</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Other</label>
                    <i class="ti ti-brand-chrome"></i>
                </li>
                @if (auth()->check() && auth()->user()->role_id == 1)
                    <li class="pc-item {{ request()->is('user*') ? 'active' : '' }}">
                        <a href="/user" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-users"></i></span>
                            <span class="pc-mtext">User</span>
                        </a>
                    </li>
                @endif

                <li class="pc-item {{ request()->is('bantuan*') ? 'active' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-info-circle"></i></span>
                        <span class="pc-mtext">Bantuan</span>
                    </a>
                </li>
            </ul>


        </div>
    </div>
</nav>

{{-- JAM DIGITAL --}}
