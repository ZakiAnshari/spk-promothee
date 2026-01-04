@extends('layouts.admin')
@section('title', 'Kriteria')
@section('content')
    <div class="pc-content">
        <div class="row">

            <div class="d-flex align-items-center gap-3 mb-3">
                <a href="{{ route('kriteria.index') }}">
                    <button class="btn btn-outline-primary btn-sm border-1 rounded-1 px-2 py-1" data-bs-toggle="tooltip"
                        title="Kembali">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </button>
                </a>
                <h5 class="mb-0">Edit Kriteria</h5>
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
                    <form action="{{ url('kriteria-edit/' . $kriterias->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode</label>
                                    <input type="text" name="kriteria_code" class="form-control"
                                        value="{{ $kriterias->kriteria_code }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Kriteria</label>
                                    <input type="text" name="kriteria_nama" class="form-control"
                                        value="{{ $kriterias->kriteria_nama }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jenis Kriteria</label>
                                    <select class="form-select" name="kriteria_jenis" required>
                                        <option value="Benefit"
                                            {{ $kriterias->kriteria_jenis == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                        <option value="Cost" {{ $kriterias->kriteria_jenis == 'Cost' ? 'selected' : '' }}>
                                            Cost</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label class="form-label">Berat</label>
                                    <select class="form-select" name="kriteria_berat" required>
                                        <option value="">Pilih</option>
                                        <option value="1" {{ $kriterias->kriteria_berat == 1 ? 'selected' : '' }}>(1)
                                            Tidak Penting</option>
                                        <option value="2" {{ $kriterias->kriteria_berat == 2 ? 'selected' : '' }}>(2)
                                            Lumayan Penting</option>
                                        <option value="3" {{ $kriterias->kriteria_berat == 3 ? 'selected' : '' }}>(3)
                                            Penting</option>
                                        <option value="4" {{ $kriterias->kriteria_berat == 4 ? 'selected' : '' }}>(4)
                                            Sangat Penting</option>
                                        <option value="5" {{ $kriterias->kriteria_berat == 5 ? 'selected' : '' }}>(5)
                                            Sangat Penting Sekali</option>
                                    </select>
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

    @include('sweetalert::alert')
@endsection
