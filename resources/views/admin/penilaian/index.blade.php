@extends('layouts.admin')
@section('title', 'Penilaian')
@section('content')
    <div class="pc-content">

        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                role="tab" aria-selected="true">
                                <i class="ti ti-clipboard-list me-2"></i>Form Penilaian
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                aria-selected="false" tabindex="-1">
                                <i class="ti ti-award me-2"></i>Hasil Penilaian
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                            <div class="row">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <form action="{{ route('penilaian.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nama Penginapan</label>
                                                    <select required name="penginapan_id" class="form-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($penginapans as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_penginapan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                @foreach ($kriterias as $kriteria)
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            ({{ $kriteria->kriteria_code }}) {{ $kriteria->kriteria_nama }}
                                                        </label>
                                                        <select name="subkriteria_id[{{ $kriteria->id }}]"
                                                            class="form-select" required>
                                                            <option value="">Pilih</option>
                                                            @foreach ($kriteria->subkriterias as $sub)
                                                                <option value="{{ $sub->id }}">
                                                                    {{ $sub->subkriteria_berat }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <div class="row">
                                <div class="table-responsive">


                                    {{-- TABLE --}}
                                    <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Penginapan</th>

                                                @foreach ($kriterias as $kriteria)
                                                    <th>({{ $kriteria->kriteria_code }}) {{ $kriteria->kriteria_nama }}
                                                    </th>
                                                @endforeach

                                                <th style="text-align: center;width:4px">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $no = 1; @endphp

                                            @foreach ($penginapans as $item)
                                                @php
                                                    // ⬅️ AMBIL PENILAIAN BERDASARKAN penginapan_id
                                                    $penilaianPenginapan = $penilaians->where(
                                                        'penginapan_id',
                                                        $item->id,
                                                    );

                                                    // cek apakah semua kriteria sudah dinilai
                                                    $lengkap =
                                                        $penilaianPenginapan
                                                            ->pluck('subkriteria.kriteria_id')
                                                            ->unique()
                                                            ->count() === $kriterias->count();
                                                @endphp

                                                @if ($lengkap)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->nama_penginapan }}</td>

                                                        @foreach ($kriterias as $kriteria)
                                                            @php
                                                                // cari nilai subkriteria untuk kriteria tertentu
                                                                $nilai = $penilaianPenginapan
                                                                    ->filter(
                                                                        fn($x) => $x->subkriteria->kriteria_id ==
                                                                            $kriteria->id,
                                                                    )
                                                                    ->first();
                                                            @endphp

                                                            <td>{{ $nilai->subkriteria->subkriteria_berat ?? '-' }}</td>
                                                        @endforeach

                                                        <td class="text-center">
                                                            <ul class="list-inline me-auto mb-0">
                                                                <li class="list-inline-item align-bottom"
                                                                    style="border: 1px solid #ccc;" data-bs-toggle="tooltip"
                                                                    title="Delete">
                                                                    <a href="javascript:void(0);"
                                                                        class="avtar avtar-xs btn-link-danger"
                                                                        onclick="confirmDeletePenilaian({{ $item->id }}, @js($item->nama_penginapan))">
                                                                        <i class="ti ti-trash f-18"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            {{-- Jika tidak ada data --}}
                                            @if ($no === 1)
                                                <tr>
                                                    <td colspan="{{ 2 + count($kriterias) }}" class="text-center">Data
                                                        Kosong</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->

        </div>
    </div>
@endsection
