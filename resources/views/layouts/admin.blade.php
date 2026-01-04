<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>@yield('title', 'Dashboard')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('BackEnd/dist/assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('BackEnd/dist/assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('BackEnd/dist/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('BackEnd/dist/assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('BackEnd/dist/assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('BackEnd/dist/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('BackEnd/dist/assets/css/style-preset.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    @include('menu_admin.sidebar')
    <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item d-inline-flex d-md-none">
                        <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <i data-feather="search"></i>
                                    <input type="search" class="form-control border-0 shadow-none"
                                        placeholder="Search here. . .">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form class="header-search">
                            <i data-feather="search" class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search here. . .">
                        </form>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-mail"></i>
                        </a>
                        <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Message</h5>
                                <a href="#!" class="pc-head-link bg-transparent"><i
                                        class="ti ti-x text-danger"></i></a>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative"
                                style="max-height: calc(100vh - 215px)">
                                <div class="list-group list-group-flush w-100">
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('BackEnd/dist/assets/images/user/avatar-2.jpg') }}"
                                                    alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">3:00 AM</span>
                                                <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.
                                                </p>
                                                <span class="text-muted">2 min ago</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('BackEnd/dist/assets/images/user/avatar-1.jpg') }}"
                                                    alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">6:00 PM</span>
                                                <p class="text-body mb-1"><b>Aida Burg</b> commented your post.</p>
                                                <span class="text-muted">5 August</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('BackEnd/dist/assets/images/user/avatar-3.jpg') }}"
                                                    alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">2:45 PM</span>
                                                <p class="text-body mb-1"><b>There was a failure to your setup.</b></p>
                                                <span class="text-muted">7 hours ago</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('BackEnd/dist/assets/images/user/avatar-4.jpg') }}"
                                                    alt="user-image" class="user-avtar">
                                            </div>
                                            <div class="flex-grow-1 ms-1">
                                                <span class="float-end text-muted">9:10 PM</span>
                                                <p class="text-body mb-1"><b>Cristina Danny </b> invited to join <b>
                                                        Meeting.</b></p>
                                                <span class="text-muted">Daily scrum meeting time</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="text-center py-2">
                                <a href="#!" class="link-primary">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                            aria-expanded="false">
                            <img src="{{ asset('BackEnd/dist/assets/images/user/' . (Auth::user()->jenis_kelamin == 'Perempuan' ? 'avatar-9.jpg' : 'avatar-2.jpg')) }}"
                                alt="user-image" class="user-avtar">

                            <span>{{ Auth::user()->role->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">

                                        <img src="{{ asset('BackEnd/dist/assets/images/user/' . (Auth::user()->jenis_kelamin == 'Perempuan' ? 'avatar-9.jpg' : 'avatar-2.jpg')) }}"
                                            alt="user-image" class="user-avtar wid-35">

                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1"><span>{{ Auth::user()->name }}</span></h6>
                                        <span><span>{{ Auth::user()->email }}</span>
                                        </span>
                                    </div>
                                    <a href="/logout" onclick="confirmLogout(event)"
                                        class="pc-head-link bg-transparent"><i
                                            class="ti ti-power text-danger"></i></a>
                                </div>
                            </div>

                            <div class="tab-content" id="mysrpTabContent">
                                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel"
                                    aria-labelledby="drp-t1" tabindex="0">
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-edit-circle"></i>
                                        <span>Edit Profile</span>
                                    </a>

                                    <a href="/logout" onclick="confirmLogout(event)" class="dropdown-item">
                                        <i class="ti ti-power"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    {{-- CONTENT --}}
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->

    <div class="pc-container">
        @yield('content')

    </div>

    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm my-1">
                    <p class="m-0">Developer <a href="https://themeforest.net/user/codedthemes"
                            target="_blank"></a> <a href="https://themewagon.com/"></a></p>
                </div>
                <div class="col-auto my-1">
                    <ul class="list-inline footer-link mb-0">
                        <li class="list-inline-item"><a href="">Muahammad Nurul Hidayat</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- [Page Specific JS] start -->
    <script src="{{ asset('BackEnd/dist/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('BackEnd/dist/assets/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{ asset('BackEnd/dist/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('BackEnd/dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('BackEnd/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('BackEnd/dist/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('BackEnd/dist/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('BackEnd/dist/assets/js/plugins/feather.min.js') }}"></script>
    <script>
        layout_change('light');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change("preset-1");
    </script>
    <script>
        font_change("Public-Sans");
    </script>
    {{-- JAM DIGITAL --}}
    <script>
        function updateClock() {
            const clockElement = document.getElementById('digital-clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000);
        updateClock(); // Call immediately to show the time without waiting for the first interval
    </script>
    {{-- HARI TGL BULAN TH --}}
    <script>
        // Daftar nama hari dan bulan dalam Bahasa Indonesia
        const namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Ambil tanggal saat ini
        const today = new Date();
        const hari = namaHari[today.getDay()];
        const tanggal = today.getDate();
        const bulan = namaBulan[today.getMonth()];
        const tahun = today.getFullYear();

        // Format hasilnya dan masukkan ke elemen HTML
        const hasil = `${hari}, ${tanggal} ${bulan} ${tahun}`;
        document.getElementById("tanggal-hari-ini").textContent = hasil;
    </script>
    {{-- UNTUK HIDE PASSWORD --}}
    <script>
        function togglePassword() {
            const input = document.getElementById("passwordInput");
            const icon = document.getElementById("eyeIcon");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
    {{-- UNTUK MENGHAPUS SWEET-ALERT USER --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteUser(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `"${name}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/user-destroy/${id}`;
                }
            });
        }
    </script>
    {{-- UNTUK MENGHAPUS SWEET-ALERT FASILITAS --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteFasilitas(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `"${name}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/fasilitas-destroy/${id}`;
                }
            });
        }
    </script>

    {{-- UNTUK MENGHAPUS SWEET-ALERT KRITERIA --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteKriteria(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `"${name}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/kriteria-destroy/${id}`;
                }
            });
        }
    </script>
    {{-- UNTUK MENGHAPUS SWEET-ALERT SUBKRITERIA --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteSubKriteria(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `"${name}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/subkriteria-destroy/${id}`;
                }
            });
        }
    </script>
    {{-- UNTUK MENGHAPUS SWEET-ALERT PENILAIAN --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeletePenilaian(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                html: `Fasilitas <strong>"${name}"</strong> akan dihapus beserta semua penilaiannya!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke route penghapusan berdasarkan fasilitas_id
                    window.location.href = `/penilaian-destroy/${id}`;
                }
            });
        }
    </script>

    @include('sweetalert::alert')
</body>
<!-- [Body] end -->

</html>
