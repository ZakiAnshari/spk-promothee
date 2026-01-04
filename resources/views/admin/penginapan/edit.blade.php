@extends('layouts.admin')
@section('title', 'Fasilitas')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="card-header d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('fasilitas.index') }}">
                        <button class="btn btn-outline-primary btn-sm border-1 rounded-1 px-2 py-1" data-bs-toggle="tooltip"
                            title="Kembali">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </button>
                    </a>
                    <h5 class="mb-0">Edit Fasilitas</h5>
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
                    <form action="{{ url('fasilitas-edit/' . $fasilitas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input required type="text" name="nama_fasilitas" class="form-control"
                                        value="{{ $fasilitas->nama_fasilitas }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Lokasi</label>
                                    <input required type="text" name="lokasi_fasilitas" class="form-control"
                                        value="{{ $fasilitas->lokasi_fasilitas }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status</label>

                                    <select class="form-select" name="status_fasilitas" required>
                                        <option value="Aktif"
                                            {{ $fasilitas->status_fasilitas == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif"
                                            {{ $fasilitas->status_fasilitas == 'Tidak Aktif' ? 'selected' : '' }}>Tidak
                                            Aktif</option>
                                        <option value="Sudah Diganti"
                                            {{ $fasilitas->status_fasilitas == 'Sudah Diganti' ? 'selected' : '' }}>Sudah
                                            Diganti</option>


                                    </select>


                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Kondisi</label>

                                    <select class="form-select" name="kondisi_fasilitas" required>
                                        <option value="Layak"
                                            {{ $fasilitas->kondisi_fasilitas == 'Layak' ? 'selected' : '' }}>Layak</option>
                                        <option value="Rusak Ringan"
                                            {{ $fasilitas->kondisi_fasilitas == 'Rusak Ringan' ? 'selected' : '' }}>Rusak
                                            Ringan</option>
                                        <option value="Rusak Berat"
                                            {{ $fasilitas->kondisi_fasilitas == 'Rusak Berat' ? 'selected' : '' }}>Rusak
                                            Berat</option>


                                    </select>


                                </div>
                                <div class="form-group">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="foto_fasilitas" class="form-control"
                                        id="imageGalleryfasilitas" accept="image/*"
                                        onchange="previewImage(this, 'previewGalleryfasilitas')">

                                    {{-- Pratinjau gambar lama --}}
                                    @if ($fasilitas->foto_fasilitas)
                                        <img id="previewGalleryfasilitas"
                                            src="{{ asset('storage/' . $fasilitas->foto_fasilitas) }}" alt="Foto Fasilitas"
                                            class="img-fluid mt-3" style="max-width: 200px;">
                                    @else
                                        <img id="previewGalleryfasilitas" src="#" alt="Pratinjau Gambar"
                                            class="img-fluid mt-3" style="max-width: 200px; display: none;">
                                    @endif
                                </div>

                            </div>

                            <div class="text-end btn-page mb-0 mt-4">
                                <button class="btn btn-outline-secondary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
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
    @include('sweetalert::alert')
@endsection
