@extends('layouts.admin')
@section('title', 'Kriteria')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-lg-8">
                <h5 class="mb-3">Data Kriteria</h5>
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
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center" style="max-width: 250px;">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="kriteria_nama"  value="{{ $kriteria_nama }}" class="form-control" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>

                                <!-- Add User Button -->
                            </div>

                          
                            {{-- TABLE --}}
                            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:15px; ">No</th>
                                        <th>Kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Jenis Kriteria</th>
                                        <th>Berat</th>
                                        <th style="width: 80px; text-align: center;">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kriterias  as $index => $item)
                                    <tr>
                                        <td>{{ $kriterias->firstItem() + $index }}</td>
                                        <td>{{ $item->kriteria_code }}</td>
                                        <td>{{ $item->kriteria_nama }}</td>
                                        <td>{{ $item->kriteria_jenis }}</td>
                                        <td>{{ $item->kriteria_berat }}</td>
                                        <td class="text-center">
                                            <ul class="list-inline me-auto mb-0">
                                                <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Subkriteria">
                                                    <a href="{{ route('kriteria.sub', ['kriteria' => $item->id]) }}" class="avtar avtar-xs btn-link-primary">
                                                        <i class="ti ti-puzzle f-18"></i> <!-- Icon sudah cocok -->
                                                    </a>
                                                </li>
                                                
                                                
                                                <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Edit">
                                                    <a href="kriteria-edit/{{ $item->id }}" class="avtar avtar-xs btn-link-primary">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Delete">
                                                    <a href="javascript:void(0);" 
                                                        class="avtar avtar-xs btn-link-danger" 
                                                        onclick="confirmDeleteKriteria({{ $item->id }}, @js($item->kriteria_nama))">
                                                        <i class="ti ti-trash f-18"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        
                                        
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class=" justify-content-end mt-3">
                                {{ $kriterias->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3">Tambah Kriteria</h5>
                <div class="card tbl-card">
                    <form action="{{ route('kriteria.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Tambah Kriteria</h5>
                            </div>
                            <div class="card-body">
                                <!-- Kode Kriteria -->
                                <div class="form-group mb-3">
                                    <label for="kriteria_code" class="form-label">Kode Kriteria</label>
                                    <input type="text" id="kriteria_code" name="kriteria_code" class="form-control" placeholder="Masukkan Kode Kriteria" required>
                                </div>
                    
                                <!-- Nama Kriteria -->
                                <div class="form-group mb-3">
                                    <label for="kriteria_nama" class="form-label">Nama Kriteria</label>
                                    <input type="text" id="kriteria_nama" name="kriteria_nama" class="form-control" placeholder="Masukkan Nama Kriteria" required>
                                </div>
                    
                                <!-- Jenis Kriteria -->
                                <div class="form-group mb-3">
                                    <label for="kriteria_jenis" class="form-label">Jenis Kriteria</label>
                                    <select id="kriteria_jenis" name="kriteria_jenis" class="form-select" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>
                                    </select>
                                </div>
                    
                                <!-- Bobot Kriteria -->
                                <div class="form-group mb-3">
                                    <label for="kriteria_berat" class="form-label">Tingkat Kepentingan (Berat)</label>
                                    <select id="kriteria_berat" name="kriteria_berat" class="form-select" required>
                                        <option value="">Pilih Berat</option>
                                        <option value="1">(1) Tidak Penting</option>
                                        <option value="2">(2) Lumayan Penting</option>
                                        <option value="3">(3) Penting</option>
                                        <option value="4">(4) Sangat Penting</option>
                                        <option value="5">(5) Sangat Penting Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
