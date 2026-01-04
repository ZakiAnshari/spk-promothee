@extends('layouts.admin')
@section('title', 'Fasilitas')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="d-flex align-items-center gap-3 mb-3">
                <a href="{{ route('penginapan.index') }}">
                    <button class="btn btn-outline-primary btn-sm border-1 rounded-1 px-2 py-1" data-bs-toggle="tooltip"
                        title="Kembali">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </button>
                </a>

                <h5 class="mb-0">
                    Detail Penginapan
                    <i class="bx bx-chevron-right mx-1"></i>
                    <span class="mx-1 text-uppercase">
                        {{ $penginapan->nama_penginapan }}
                    </span>
                </h5>
            </div>

            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nama Penginapan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $penginapan->nama_penginapan }}" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control"
                                            value="{{ $penginapan->alamat_penginapan }}" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Jenis Penginapan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $penginapan->jenis_penginapan }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Kontak</label>
                                        <input type="text" class="form-control"
                                            value="{{ $penginapan->kontak_penginapan }}" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="text" class="form-control"
                                            value="{{ $penginapan->harga_penginapan }}" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Tanggal Masuk</label>
                                        <input type="text" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($penginapan->created_at)->translatedFormat('Y F d') }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-12">
                            <div class="card d-flex flex-column justify-content-center align-items-center">
                                <div class="text-center my-3">
                                    <label for="gambar" class="form-label">Foto Penginapan</label><br>
                                    @if ($penginapan->foto_penginapan)
                                        <img src="{{ asset('storage/' . $penginapan->foto_penginapan) }}"
                                            class="img-fluid rounded" alt="Foto Penginapan"
                                            style="max-height: 300px; width: 100%; object-fit: cover; border: 1px solid #ddd;">
                                    @else
                                        <p>Tidak ada Foto</p>
                                    @endif
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
@endsection
