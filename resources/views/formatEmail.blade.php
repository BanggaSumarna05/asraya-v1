<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kunjungan - {{ $data['fullname'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Yth. PT. CASA ASRAYA PROPERTY,</p>
        <p>
            Semoga email ini menemukan Anda dalam keadaan baik. Nama saya {{ $data['fullname'] }}, dan saya sangat
            tertarik dengan properti yang Anda kembangkan di PEKANBARU, RIAU. Saya ingin menjadwalkan kunjungan untuk
            melihat unit-unit dan mendiskusikan proyek ini secara lebih rinci.
        </p>
        <p>Berikut adalah detail untuk kunjungan tersebut:</p>
        <table>
            <tr>
                <th>Nama</th>
                <th>Tanggal Kunjungan</th>
                <th>Telepon/WhatsApp</th>
                <th>Catatan Tambahan</th>
            </tr>
            <tr>
                <td>{{ $data['fullname'] }}</td>
                <td>{{ $data['date'] }}</td>
                <td>{{ $data['tlp'] }}</td>
                <td>{{ $data['desc'] }}</td>
            </tr>
        </table>
        <p>
            Mohon informasikan kepada saya jika tanggal ini cocok untuk Anda atau jika ada waktu lain yang lebih nyaman.
            Saya menantikan tanggapan Anda dan bertemu dengan Anda secara langsung.
        </p>
        <p>Terima kasih atas waktu dan perhatian Anda.</p>
        <p>Salam hormat,</p>
        <br><br><br>
        <p>{{ $data['fullname'] }}</p>
    </div>
</body>

</html>
