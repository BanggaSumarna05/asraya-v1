<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Visit Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Terima Kasih Telah Menjadwalkan Kunjungan</h1>
        <p>Yth. {{ $data['fullname'] }},</p>
        <p>Terima kasih telah menjadwalkan kunjungan ke properti kami. Kami dengan senang hati mengonfirmasi janji temu
            bersama Anda. Berikut adalah detail kunjungan Anda:</p>
        <table>
            <tr>
                <th>Supervisor</th>
                <td>Mustafa Dzul Akmal</td>
            </tr>
            <tr>
                <th>Tanggal Kunjungan</th>
                <td>{{ $data['date'] }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon Marketing</th>
                <td>081399998066</td>
            </tr>
        </table>
        <p>Kami berharap dapat bertemu dengan Anda. Jika Anda memiliki pertanyaan atau perlu menjadwal ulang, jangan
            ragu untuk menghubungi kami.</p>
        <p>Salam hangat,</p>
        <br><br><br>
        <p>PT. CASA ASRAYA PROPERTY</p>
    </div>
</body>

</html>
