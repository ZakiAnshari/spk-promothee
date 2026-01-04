@extends('layouts.admin')
@section('title', 'Laporan')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class=" col-lg-12">
                <h5 class="mb-3">Data Laporan</h5>
                <div class="card tbl-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-end align-items-center mb-3">
                                <div class="d-flex">
                

                                    <a href="{{ route('perhitungan.cetak') }}"
                                        class="btn btn-warning d-flex align-items-center" role="button" target="_blank">
                                        <i class="bx bx-printer me-1"></i> Cetak
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                @php
                                    // Urutkan fasilitas berdasarkan nilai_akhir secara descending (terbesar ke terkecil)
                                    $ranking = $fasilitas->sortByDesc('nilai_akhir')->values();
                                @endphp

                                <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nama Fasilitas</th>
                                            <th>Lokasi</th>
                                            <th class="text-center">Nilai Preferensi (V)</th>
                                            <th style="text-align: center">Rangking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ranking as $index => $item)
                                            <tr>
                                                <td>{{ $item->nama_fasilitas }}</td>
                                                <td>{{ $item->lokasi_fasilitas }}</td>
                                                <td class="text-center">{{ number_format($item->nilai_akhir, 2) }}</td>
                                                <td style="text-align: center">
                                                    @php
                                                        $rankingIcons = ['🥇', '🥈', '🥉'];
                                                    @endphp

                                                    {{ $index + 1 }}
                                                    @if (isset($rankingIcons[$index]))
                                                        {{ $rankingIcons[$index] }}
                                                    @endif
                                                </td>

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

@endsection
