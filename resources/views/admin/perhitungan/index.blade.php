@extends('layouts.admin')
@section('title', 'Perhitungan')
@section('content')
    <div class="pc-content">
        <!-- MENU -->

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs checkout-tabs mb-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ecomtab-tab-1" data-bs-toggle="tab" href="#ecomtab-1" role="tab"
                                aria-controls="ecomtab-1" aria-selected="false" tabindex="-1">
                                <div class="media align-items-center">
                                    <div class="avtar avtar-xs">
                                        <i class="ti ti-table f-18"></i>
                                    </div>
                                    <div class="media-body ms-3">
                                        <h6 class="mb-0">Bobot Normalisasi</h6>
                                    </div>
                                </div>

                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ecomtab-tab-2" data-bs-toggle="tab" href="#ecomtab-2" role="tab"
                                aria-controls="ecomtab-2" aria-selected="false" tabindex="-1">
                                <div class="media align-items-center">
                                    <div class="avtar avtar-xs">
                                        <i class="ti ti-layout-grid f-20"></i> <!-- diganti dari ti-table -->
                                    </div>
                                    <div class="media-body ms-3">
                                        <h6 class="mb-0">Matrix X</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ecomtab-tab-3" data-bs-toggle="tab" href="#ecomtab-3" role="tab"
                                aria-controls="ecomtab-3" aria-selected="true">
                                <div class="media align-items-center">
                                    <div class="avtar avtar-xs">
                                        <i class="ti ti-database f-20"></i>
                                        <!-- Icon yang lebih merepresentasikan "matrix data" -->
                                    </div>
                                    <div class="media-body ms-3">
                                        <h6 class="mb-0">Hasil Perhitungan</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="ecomtab-tab-4" data-bs-toggle="tab" href="#ecomtab-4"
                                role="tab" aria-controls="ecomtab-4" aria-selected="true">
                                <div class="media align-items-center">
                                    <div class="avtar avtar-xs">
                                        <i class="ti ti-trophy f-20"></i>
                                        <!-- Icon yang lebih merepresentasikan "matrix data" -->
                                    </div>
                                    <div class="media-body ms-3">
                                        <h6 class="mb-0"> Nilai Akhir (ranking)</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                {{-- Bobot Normalisasi --}}
                <div class="tab-pane" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Table Bobot Normalisasi</h5>
                                    <div class="card-body">

                                        <div class="d-flex justify-content-end align-items-center mb-3">
                                            <!-- Form Search -->
                                            <form method="GET" class="d-flex align-items-center"
                                                style="max-width: 250px;">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="kriteria_nama" value=""
                                                        class="form-control" placeholder="Search" aria-label="Search">
                                                    <button class="btn btn-outline-secondary" type="submit">
                                                        <i class="bi bi-search"></i>
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- Add User Button -->
                                        </div>



                                        <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width:15px;">No</th>
                                                    <th>Kriteria</th>
                                                    <th>Nilai Kepentingan</th>
                                                    <th>Bobot (Normalisasi)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($kriterias as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>({{ $item->kriteria_code }}) {{ $item->kriteria_nama }}</td>
                                                        <td>{{ $item->kriteria_berat }}</td>
                                                        <td>{{ number_format($item->bobot_normalisasi, 2) }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">Data Kosong</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>


                                        <!-- Pagination -->
                                        <div class=" justify-content-end mt-3">

                                        </div>



                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                {{-- Matrix X --}}
                <div class="tab-pane" id="ecomtab-2" role="tabpanel" aria-labelledby="ecomtab-tab-2">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Table Matrix X</h5>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-end align-items-center mb-3">
                                            <!-- Form Search -->
                                            <form method="GET" class="d-flex align-items-center"
                                                style="max-width: 250px;">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="kriteria_nama" value=""
                                                        class="form-control" placeholder="Search" aria-label="Search">
                                                    <button class="btn btn-outline-secondary" type="submit">
                                                        <i class="bi bi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- TABLE --}}
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Penginapan</th>
                                                        @foreach ($kriterias as $kriteria)
                                                            <th>
                                                                ({{ $kriteria->kriteria_code }})
                                                                {{ $kriteria->kriteria_nama }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($penginapans as $item)
                                                        @php
                                                            // Ambil penilaian berdasarkan penginapan
                                                            $penilaianPenginapan = $penilaians->where(
                                                                'penginapan_id',
                                                                $item->id,
                                                            );

                                                            // Cek apakah semua kriteria sudah dinilai
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
                                                                        $nilai = $penilaianPenginapan
                                                                            ->where(
                                                                                'subkriteria.kriteria_id',
                                                                                $kriteria->id,
                                                                            )
                                                                            ->first();
                                                                    @endphp
                                                                    <td>
                                                                        {{ $nilai->subkriteria->subkriteria_berat ?? '-' }}
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    @if ($no === 1)
                                                        <tr>
                                                            <td colspan="{{ 2 + count($kriterias) }}"
                                                                class="text-center">
                                                                Data Kosong
                                                            </td>
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
                </div>
                {{-- Matrix TERNOMALISASI --}}
                <div class="tab-pane" id="ecomtab-3" role="tabpanel" aria-labelledby="ecomtab-tab-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>Tabel Hasil Perhitungan</h5>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-end align-items-center mb-3">
                                                <!-- Form Search -->
                                                <form method="GET" class="d-flex align-items-center"
                                                    style="max-width: 250px;">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" name="kriteria_nama" value=""
                                                            class="form-control" placeholder="Search"
                                                            aria-label="Search">
                                                        <button class="btn btn-outline-secondary" type="submit">
                                                            <i class="bi bi-search"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            {{-- TABLE --}}
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Penginapan</th>
                                                            <th>Φ+ Phi Plus</th>
                                                            <th>Φ− Phi Minus</th>
                                                            <th>Φ Net Flow</th>
                                                            <th>Rangking</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($penginapans as $item)
                                                            <tr>
                                                                <td>{{ $item->nama_penginapan }}</td>
                                                                <td>{{ number_format($item->phi_plus, 4) }}</td>
                                                                <td>{{ number_format($item->phi_minus, 4) }}</td>
                                                                <td>{{ number_format($item->phi, 4) }}</td>
                                                                <td>{{ $item->ranking }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- Perhitungan nilai akhir (ranking). --}}
                <div class="tab-pane active show" id="ecomtab-4" role="tabpanel" aria-labelledby="ecomtab-tab-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5> Table nilai akhir (ranking)</h5>
                                        <div>
                                            <div class="d-flex justify-content-end align-items-center mb-3">
                                                {{-- <div class="d-flex">
                                                    <button type="button"
                                                        class="btn btn-success d-flex align-items-center me-2">
                                                        <i class="bx bxs-file-export me-1"></i> Export ke Excel
                                                    </button>

                                                    <a href="{{ route('perhitungan.cetak') }}"
                                                        class="btn btn-warning d-flex align-items-center" role="button"
                                                        target="_blank">
                                                        <i class="bx bx-printer me-1"></i> Cetak
                                                    </a>
                                                </div> --}}
                                            </div>
                                            <div class="table-responsive">
                                                @php
                                                    // Urutkan penginapan berdasarkan nilai akhir (Phi) dari besar ke kecil
                                                    $ranking = $penginapans->sortByDesc('phi')->values();
                                                @endphp

                                                <table
                                                    class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>

                                                            <th>Nama Penginapan</th>
                                                            <th class="text-center">Rangking</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ranking as $index => $item)
                                                            <tr>
                                                                <td>{{ $item->nama_penginapan }}</td>
                                                                <td class="text-center">{{ $index + 1 }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>




                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->

    </div>

@endsection
