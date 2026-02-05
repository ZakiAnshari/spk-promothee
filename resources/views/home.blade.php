@extends('layouts.app')

@section('title', 'Home - Sistem Pendukung Keputusan Penginapan')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="mb-4">Sistem Pendukung Keputusan Penginapan Terbaik</h1>
        <p class="lead text-muted mb-5">Menggunakan Metode PROMETHEE untuk Kecamatan Katu Aro, Kabupaten Kerinci</p>

        @auth
            <div class="row mb-5">
                <div class="col-md-6">
                    <a href="/penginapan" class="btn btn-primary btn-lg w-100 mb-3">
                        <i class="lni lni-building"></i> Data Penginapan
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/kriteria" class="btn btn-info btn-lg w-100 mb-3">
                        <i class="lni lni-list"></i> Kriteria & Sub-Kriteria
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <a href="/penilaian" class="btn btn-success btn-lg w-100 mb-3">
                        <i class="lni lni-check-circle"></i> Penilaian
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/perhitungan" class="btn btn-warning btn-lg w-100 mb-3">
                        <i class="lni lni-bar-chart"></i> Perhitungan & Hasil
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="/laporan" class="btn btn-secondary btn-lg w-100 mb-3">
                        <i class="lni lni-document"></i> Laporan
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Silakan Login</h4>
                <p>Untuk mengakses semua fitur sistem, silakan login dengan akun Anda.</p>
                <hr>
                <p class="mb-0"><a href="/login" class="btn btn-primary">Klik di sini untuk login</a></p>
            </div>
        @endauth

        <hr class="my-5">

        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <h5 class="mb-3">Tentang Metode PROMETHEE</h5>
                <p>PROMETHEE adalah singkatan dari Preference Ranking Organization Method for Enrichment Evaluation. Metode ini digunakan untuk membantu dalam pengambilan keputusan multi-kriteria dengan cara membandingkan alternatif (penginapan) berdasarkan preferensi untuk setiap kriteria yang telah ditetapkan.</p>
            </div>
            <div class="col-md-6 mb-4">
                <h5 class="mb-3">Keuntungan Sistem Ini</h5>
                <ul>
                    <li>Pengambilan keputusan yang akurat dan objektif</li>
                    <li>Transparansi dalam proses evaluasi</li>
                    <li>Pemeringkatan otomatis penginapan terbaik</li>
                    <li>Laporan terperinci dan mudah dipahami</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
