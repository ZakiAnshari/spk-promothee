@extends('layouts.admin')
@section('title', 'Sub-Kriteria')
@section('content')
<div class="pc-content">
    <div class="row">
        <div class="col-lg-8">
            <h5 class="mb-3">Data Sub Kriteria</h5>
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
                        <div class="card-header d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('kriteria.index') }}">
                                <button class="btn btn-outline-primary btn-sm border-1 rounded-1 px-2 py-1" data-bs-toggle="tooltip" title="Kembali">
                                    <i class="bi bi-arrow-left fs-5"></i>
                                </button>
                            </a>
                            <h5 class="mb-0">List Sub Kriteria  {{ $kriteria->kriteria_nama }} [{{ $kriteria->kriteria_jenis }}]</h5>

                        </div>
                        
                        

                      
                        {{-- TABLE --}}
                        <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:15px; ">No</th>
                                    <th>Nama </th>
                                    <th>Berat</th>
                                    <th style="width: 80px; text-align: center;">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subkriterias  as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->subkriteria_nama }}</td>
                                    <td>{{ $item->subkriteria_berat }}</td>
                                    <td class="text-center">
                                        <ul class="list-inline me-auto mb-0">
                                            {{-- <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Edit">
                                                <a href="subkriteria-edit/{{ $item->id }}" class="avtar avtar-xs btn-link-primary">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li> --}}
                                            <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Delete">
                                                <a href="javascript:void(0);" 
                                                    class="avtar avtar-xs btn-link-danger" 
                                                    onclick="confirmDeleteSubKriteria({{ $item->id }}, @js($item->subkriteria_nama))">
                                                    <i class="ti ti-trash f-18"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                            
                        </table>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5 class="mb-3">Tambah Sub-Kriteria</h5>
            <div class="card tbl-card">
                <form action="{{ route('subkriteria.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Hidden input untuk relasi kriteria_id --}}
                    <input type="hidden" name="kriteria_id" value="{{ $kriteria->id }}">
                
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" name="subkriteria_nama" class="form-control" placeholder="...">
                        </div>
                
                        <div class="form-group">
                            <label class="form-label">Berat</label>
                            <input type="number" name="subkriteria_berat" class="form-control" min="1" max="5" required>
                        </div> 
                        
                
                        <div class="text-end btn-page mb-0 mt-4">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
