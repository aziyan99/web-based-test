<!DOCTYPE html>
<html>

<head>
    <title>Hasil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .head {
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }

        .title {
            width: 100%;
            text-align: center;
            margin-left: 30px;
        }

        .heading {
            margin: 0 auto;
            margin-left: 30px;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        .main {
            margin-top: 150px;
            width: 100%;
            text-align: center;
        }

        .content {
            width: 60%;
            margin: 0 auto;
        }

        .footer {
            margin-top: 100px;
            margin-left: 30px;
        }
    </style>

</head>

<body>
    <div class="head">
        <div class="title">
            <h3><?= $user['nama_sistem']; ?></h3>
            <h4><?= $user['nama_sekolah']; ?></h4>
            <p><?= $user['alamat']; ?></p>
        </div>
        <hr>
        <br>
        <br>
        <table class="heading">
            <tr>
                <td>Nama </td>
                <td><?= $user['nama']; ?></td>
            </tr>
            <tr>
                <td>Mata Pelajaran </td>
                <td><?= $user['mapel']; ?></td>
            </tr>
            <tr>
                <td>Kelas </td>
                <td><?= $user['kelas']; ?></td>
            </tr>
        </table>

    </div>

    <div class="main">
        <table class="content">
            <tr>
                <th>Jawaban yang benar</th>
                <th>Jawaban yang salah</th>
            </tr>
            <tr>
                <td><?= count($benar); ?></td>
                <td><?= count($salah); ?></td>
            </tr>
        </table>

    </div>
    <div class="footer">
        <table class="sign">
            <tr>
                <td width="150" style="text-align: center;">Tenaga Pengajar</td>
            </tr>
            <tr>
                <td>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>