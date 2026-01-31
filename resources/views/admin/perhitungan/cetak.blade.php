<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Perhitungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }

            body {
                font-size: 12px;
                color: #000;
            }

            table th,
            table td {
                font-size: 12px !important;
                padding: 8px !important;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">LAPORAN DATA PERHITUNGAN</h2>
            <h5 class="">Sistem Pendukung Keputusan Pemilihan Penginapan
                Menggunakan Metode
                PROMETHEE</h5>
        </div>
        <br>

        <div class="table-responsive">
            @php
                // Urutkan penginapan berdasarkan Net Flow (phi) secara descending
                $ranking = $penginapans->sortByDesc('phi')->values();
            @endphp

            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Penginapan</th>
                        <th>Lokasi</th>
                        <th class="text-center">Φ+ Phi Plus</th>
                        <th class="text-center">Φ− Phi Minus</th>
                        <th class="text-center">Φ Net Flow</th>
                        <th style="text-align: center">Rangking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ranking as $index => $item)
                        <tr>
                            <td>{{ $item->nama_penginapan }}</td>
                            <td>{{ $item->alamat_penginapan }}</td>
                            <td class="text-center">{{ number_format($item->phi_plus, 4) }}</td>
                            <td class="text-center">{{ number_format($item->phi_minus, 4) }}</td>
                            <td class="text-center">{{ number_format($item->phi, 4) }}</td>
                            <td style="text-align: center">{{ $item->ranking ?? $index + 1 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @php
                $top = $ranking->first();
            @endphp

            @if ($top)
                <div class="mt-4">
                    <div class="alert alert-success">
                        <strong>Rekomendasi Terbaik:</strong>
                        {{ $top->nama_penginapan }} ({{ $top->alamat_penginapan }})
                        — Nilai Φ: {{ number_format($top->phi, 4) }}
                    </div>
                </div>
            @endif

        </div>

        <!-- Bagian Tanda Tangan -->
        <div class="row mt-5">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p class="mb-1">{{ \Carbon\Carbon::now()->translatedFormat('l') }},
                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p class="mb-5">Kepala Penginapan</p>
                <p class="fw-bold text-uppercase mb-1">{{ auth()->user()->name ?? 'Nama Pengguna' }}</p>
                <p class="mb-0">NIP: 19650415 199003 1 004</p>
            </div>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
