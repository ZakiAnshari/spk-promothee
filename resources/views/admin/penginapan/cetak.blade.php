<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Fasilitas</title>
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
            table th, table td {
                font-size: 12px !important;
                padding: 8px !important;
            }
        }
    </style>
</head>
<body class="bg-light">

    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">LAPORAN DATA FASILITAS</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light text-uppercase text-center">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Fasilitas</th>
                        <th>Lokasi</th>
                        <th>Kondisi Awal</th>
                        <th>Status</th>
                        <th>Waktu Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fasilitas  as $index => $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_fasilitas }}</td>
                        <td>{{ $item->lokasi_fasilitas }}</td>
                        <td>{{ $item->kondisi_fasilitas }}</td>
                        <td>{{ $item->status_fasilitas }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Bagian Tanda Tangan -->
        <div class="row mt-5">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p class="mb-1">..., {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
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
