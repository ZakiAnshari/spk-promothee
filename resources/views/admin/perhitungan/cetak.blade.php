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
            <h5 class="text-muted">
                Sistem Pendukung Keputusan Penentuan Prioritas Perbaikan Fasilitas Sekolah <br>
                Menggunakan Metode SAW di SMP Negeri 6 Bukittinggi
            </h5>
        </div>
        <br>

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
                                {{ $index + 1 }}
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <!-- Bagian Tanda Tangan -->
        <div class="row mt-5">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p class="mb-1">{{ \Carbon\Carbon::now()->translatedFormat('l') }},
                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p class="mb-5">Kepala Sekolah</p>
                <p class="fw-bold text-uppercase mb-1">Tuti Yamila Sari Dewi, S.PdI, M.Pd</p>
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
