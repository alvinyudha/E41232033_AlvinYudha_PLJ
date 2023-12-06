<!-- ... -->
@extends ('partials.main')
@section('content')
    <!-- ... -->
    <h3>Detail Cuti</h3>
    <p>Nama: {{ $cuti->nama }}</p>
    <p>Tanggal Mulai: {{ $cuti->tanggal_mulai }}</p>
    <p>Tanggal Selesai: {{ $cuti->tanggal_selesai }}</p>
    <p>Alasan: {{ $alasan }}</p>
    @if (!$cuti->konfirmasi)
        <form action="{{ route('cuti.konfirmasi', $cuti->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Konfirmasi Cuti</button>
        </form>
    @else
        <p>Status: Cuti telah dikonfirmasi</p>
    @endif
@endsection
