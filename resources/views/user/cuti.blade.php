<!DOCTYPE html>
<html>

<head>
    <title>Pengajuan Cuti</title>
</head>

<body>
    <h1>Pengajuan Cuti</h1>

    <form method="POST" action="{{ route('cuti.store') }}">
        @csrf

        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div>
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>
        </div>

        <div>
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" required>
        </div>

        <div>
            <label for="alasan">Alasan:</label>
            <textarea name="alasan" id="alasan" required></textarea>
        </div>

        <button type="submit">Ajukan Cuti</button>
    </form>
</body>

</html>
