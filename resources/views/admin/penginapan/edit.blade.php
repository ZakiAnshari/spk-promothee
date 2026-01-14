@extends('layouts.admin')
@section('title', 'Fasilitas')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="card-header d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('penginapan.index') }}">
                        <button class="btn btn-outline-primary btn-sm border-1 rounded-1 px-2 py-1" data-bs-toggle="tooltip"
                            title="Kembali">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </button>
                    </a>
                    <h5 class="mb-0">Edit Penginapan</h5>
                </div>
            </div>


            <div class="card tbl-card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('penginapan-edit/' . $penginapan->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row">

                            {{-- KIRI --}}
                            <div class="col-lg-6">

                                <!-- Nama Penginapan -->
                                <div class="form-group">
                                    <label class="form-label">Nama Penginapan</label>
                                    <input type="text" name="nama_penginapan" class="form-control" required
                                        placeholder="Masukkan nama penginapan"
                                        value="{{ old('nama_penginapan', $penginapan->nama_penginapan) }}">
                                </div>

                                <!-- Alamat Penginapan -->
                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat_penginapan" class="form-control" required
                                        placeholder="Masukkan alamat penginapan"
                                        value="{{ old('alamat_penginapan', $penginapan->alamat_penginapan) }}">
                                </div>

                                <!-- Jenis Penginapan -->
                                <div class="form-group">
                                    <label class="form-label">Jenis Penginapan</label>
                                    <select name="jenis_penginapan" class="form-select" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="Hotel"
                                            {{ old('jenis_penginapan', $penginapan->jenis_penginapan) == 'Hotel' ? 'selected' : '' }}>
                                            Hotel
                                        </option>
                                        <option value="Homestay"
                                            {{ old('jenis_penginapan', $penginapan->jenis_penginapan) == 'Homestay' ? 'selected' : '' }}>
                                            Homestay
                                        </option>
                                        <option value="Villa"
                                            {{ old('jenis_penginapan', $penginapan->jenis_penginapan) == 'Villa' ? 'selected' : '' }}>
                                            Villa
                                        </option>
                                        <option value="Guest House"
                                            {{ old('jenis_penginapan', $penginapan->jenis_penginapan) == 'Guest House' ? 'selected' : '' }}>
                                            Guest House
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- KANAN --}}
                            <div class="col-lg-6">

                                <!-- Kontak Penginapan -->
                                <div class="form-group">
                                    <label class="form-label">Kontak</label>
                                    <input type="number" name="kontak_penginapan" class="form-control" required
                                        placeholder="Masukkan nomor kontak"
                                        value="{{ old('kontak_penginapan', $penginapan->kontak_penginapan) }}">
                                </div>

                                <!-- Harga Penginapan -->
                                <div class="form-group">
                                    <label class="form-label">Harga / Malam</label>
                                    <input type="text" name="harga_penginapan" class="form-control" required
                                        placeholder="Masukkan harga" <input type="text" id="harga_penginapan"
                                        name="harga_penginapan" class="form-control"
                                        value="{{ isset($penginapan) ? number_format($penginapan->harga_penginapan, 0, ',', '.') : '' }}"
                                        required>
                                </div>

                                <!-- Tambah Foto Penginapan -->
                                <div class="form-group">
                                    <label class="form-label">Tambah Foto Penginapan</label>
                                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin menambah foto baru. <br>
                                        Dapat memilih lebih dari satu foto.
                                    </small>
                                </div>

                            </div>

                            {{-- FOTO LAMA --}}
                            <div class="col-12 mt-4">
                                <label class="form-label">Foto Penginapan Saat Ini</label>

                                @if ($penginapan->images->count())
                                    <div class="row g-3">
                                        @foreach ($penginapan->images as $img)
                                            <div class="col-md-3">
                                                <div class="border rounded p-1">
                                                    <img src="{{ asset('storage/' . $img->image) }}"
                                                        class="img-fluid rounded"
                                                        style="height: 150px; width: 100%; object-fit: cover;">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">Belum ada foto</p>
                                @endif
                            </div>

                            {{-- BUTTON --}}
                            <div class="col-12 text-end mt-4">
                                <a href="{{ route('penginapan.index') }}" class="btn btn-outline-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan Perubahan
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(input, previewId) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        document.getElementById('harga_penginapan').addEventListener('keyup', function() {
            let value = this.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            this.value = rupiah;
        });
    </script>

    @include('sweetalert::alert')
@endsection
