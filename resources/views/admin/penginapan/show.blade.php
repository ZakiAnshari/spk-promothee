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

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <label class="form-label mb-3">Foto Penginapan</label>

                                    @if ($penginapan->images->count())
                                        <div class="row g-3">
                                            @foreach ($penginapan->images as $img)
                                                <div class="col-md-4">
                                                    <div class="image-wrapper">
                                                        <img src="{{ asset('storage/' . $img->image) }}"
                                                            alt="Foto Penginapan">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted">Tidak ada Foto</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <style>
                            .image-wrapper {
                                height: 250px;
                                width: 100%;
                                border: 1px solid #ddd;
                                border-radius: 8px;
                                overflow: hidden;
                                background-color: #f8f9fa;

                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            .image-wrapper img {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                /* potong secukupnya, TANPA zoom */
                                display: block;
                            }
                        </style>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
@endsection
