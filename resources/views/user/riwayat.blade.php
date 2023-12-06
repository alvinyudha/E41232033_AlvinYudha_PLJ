@extends('user.partials.main')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Riwayat Pengajuan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.user') }}">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            @if($riwayatsSurat->isEmpty())
                                <p>Tidak ada riwayat pengajuan surat.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jenis Surat</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($riwayatsSurat as $riwayat)
                                                <tr>
                                                    <td>{{ $riwayat->nama }}</td>
                                                    <td>{{ $riwayat->jenis_surat }}</td>
                                                    <td>{{ $riwayat->tanggal_mulai }}</td>
                                                    <td>{{ $riwayat->tanggal_selesai }}</td>
                                                    <td>{{ $riwayat->alasan }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $riwayat->status === 'diajukan' ? 'warning' : ($riwayat->status === 'ditolak' ? 'danger' : 'success') }}">
                                                            {{ $riwayat->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach($riwayatsCuti as $cuti)
                                                <tr>
                                                    <td>{{ $cuti->nama }}</td>
                                                    <td>{{ $cuti->jenis_cuti }}</td>
                                                    <td>{{ $cuti->tanggal_mulai }}</td>
                                                    <td>{{ $cuti->tanggal_selesai }}</td>
                                                    <td>{{ $cuti->alasan }}</td>
                                                    <td>{{ $cuti->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
