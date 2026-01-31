@extends('layouts.admin')
@section('title', 'Penginapan')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class=" col-lg-12">
                <h5 class="mb-3">Data Penginapan</h5>
                <div class="card tbl-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Add User Button -->
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary d-flex align-items-center me-2"
                                        data-bs-toggle="modal" data-bs-target="#user-edit_add-modal">
                                        <i class="bx bx-plus me-1"></i> Tambah
                                    </button>
                                    {{-- <a href="#" class="btn btn-warning d-flex align-items-center" role="button">
                                        <i class="bx bx-printer me-1"></i> Cetak
                                    </a> --}}
                                </div>

                            </div>

                            {{-- MODAL TAMBAH DATA --}}
                            <form action="{{ route('penginapan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal fade" id="user-edit_add-modal" data-bs-keyboard="false" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="mb-0">Tambah Penginapan</h5>
                                                <a href="#" class="avtar avtar-s btn-link-danger"
                                                    data-bs-dismiss="modal">
                                                    <i class="ti ti-x f-20"></i>
                                                </a>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-lg-6">

                                                        <!-- Nama Penginapan -->
                                                        <div class="form-group">
                                                            <label class="form-label">Nama Penginapan</label>
                                                            <input required type="text" name="nama_penginapan"
                                                                class="form-control" placeholder="Masukkan nama penginapan"
                                                                value="{{ old('nama_penginapan') }}">
                                                        </div>

                                                        <!-- Alamat Penginapan -->
                                                        <div class="form-group">
                                                            <label class="form-label">Alamat</label>
                                                            <input required type="text" name="alamat_penginapan"
                                                                class="form-control"
                                                                placeholder="Masukkan alamat penginapan"
                                                                value="{{ old('alamat_penginapan') }}">
                                                        </div>

                                                        <!-- Jenis Penginapan -->
                                                        <div class="form-group">
                                                            <label class="form-label">Jenis Penginapan</label>
                                                            <select name="jenis_penginapan" class="form-select" required>
                                                                <option value="">Pilih Jenis</option>
                                                                <option value="Hotel"
                                                                    {{ old('jenis_penginapan') == 'Hotel' ? 'selected' : '' }}>
                                                                    Hotel</option>
                                                                <option value="Homestay"
                                                                    {{ old('jenis_penginapan') == 'Homestay' ? 'selected' : '' }}>
                                                                    Homestay</option>
                                                                <option value="Villa"
                                                                    {{ old('jenis_penginapan') == 'Villa' ? 'selected' : '' }}>
                                                                    Villa</option>
                                                                <option value="Guest House"
                                                                    {{ old('jenis_penginapan') == 'Guest House' ? 'selected' : '' }}>
                                                                    Guest House</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <!-- Kontak Penginapan -->
                                                        <div class="form-group">
                                                            <label class="form-label">Kontak</label>
                                                            <input required type="number" name="kontak_penginapan"
                                                                class="form-control" placeholder="Masukkan nomor kontak"
                                                                value="{{ old('kontak_penginapan') }}">
                                                        </div>

                                                        <!-- Harga / Malam -->
                                                        <div class="form-group">
                                                            <label class="form-label">Harga / Malam</label>
                                                            <input required type="text" id="harga_penginapan"
                                                                name="harga_penginapan" class="form-control"
                                                                placeholder="Masukkan harga"
                                                                value="{{ old('harga_penginapan') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Foto Penginapan</label>
                                                            <input required type="file" name="images[]"
                                                                class="form-control" multiple accept="image/*">

                                                            <small class="text-muted">
                                                                Dapat mengunggah lebih dari satu foto. <br> Ukuran maksimal
                                                                2 MB
                                                                per foto.
                                                            </small>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <div class="flex-grow-1 text-end">
                                                    <button type="button" class="btn btn-link-danger"
                                                        style="border: 1px solid #ccc;"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </form>



                            {{-- TABLE --}}
                            {{-- DataTables CSS --}}
                            <link rel="stylesheet"
                                href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

                            <div class="table-responsive">
                                <table id="penginapanTable"
                                    class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width:15px;">No</th>
                                            <th>Nama Penginapan</th>
                                            <th>Alamat</th>
                                            <th>Jenis</th>
                                            <th>Kontak</th>
                                            <th>Harga</th>
                                            <th style="width:80px; text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penginapans as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_penginapan }}</td>
                                                <td>{{ $item->alamat_penginapan }}</td>
                                                <td>{{ $item->jenis_penginapan }}</td>
                                                <td>{{ $item->kontak_penginapan }}</td>
                                                <td>Rp {{ number_format($item->harga_penginapan, 0, ',', '.') }}</td>

                                                <td class="text-center">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            title="View"
                                                            style="border:1px solid #ccc; border-radius:4px;">
                                                            <a href="{{ url('penginapan-show/' . $item->id) }}"
                                                                class="avtar avtar-xs btn-link-secondary">
                                                                <i class="ti ti-eye f-18"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            title="Edit"
                                                            style="border:1px solid #0d6efd; border-radius:4px;">
                                                            <a href="{{ url('penginapan-edit/' . $item->id) }}"
                                                                class="avtar avtar-xs btn-link-primary">
                                                                <i class="ti ti-edit-circle f-18"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            title="Delete"
                                                            style="border:1px solid #dc3545; border-radius:4px;">
                                                            <a href="javascript:void(0)"
                                                                class="avtar avtar-xs btn-link-danger"
                                                                onclick="confirmDeletepenginapan({{ $item->id }}, @js($item->nama_penginapan))">
                                                                <i class="ti ti-trash f-18"></i>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- jQuery --}}
                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

                            {{-- DataTables JS --}}
                            <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    $('#penginapanTable').DataTable({
                                        responsive: true,
                                        autoWidth: false,
                                        pageLength: 10,
                                        lengthMenu: [5, 10, 25, 50],
                                        ordering: true,
                                        language: {
                                            search: "Cari:",
                                            lengthMenu: "Tampilkan _MENU_ data",
                                            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                                            infoEmpty: "Menampilkan 0 data",
                                            emptyTable: "Data Kosong",
                                            paginate: {
                                                first: "Awal",
                                                last: "Akhir",
                                                next: "›",
                                                previous: "‹"
                                            }
                                        },
                                        columnDefs: [{
                                                orderable: false,
                                                targets: 6
                                            } // kolom aksi
                                        ]
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const hargaInput = document.getElementById('harga_penginapan');

        hargaInput.addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value);
        });

        function formatRupiah(angka) {
            angka = angka.replace(/[^,\d]/g, "");
            let split = angka.split(",");
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                let separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            return rupiah;
        }
    </script>

@endsection
