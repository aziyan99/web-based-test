<!DOCTYPE html>
<html><head>
    <title>Hasil</title>
</head><body>
        <table class="content">
            <tr>
                <td>Nomor</td>
                <th>Nama</th>
                <th>Email</th>
            </tr>
            <tr>
                <?php foreach ($users as $data) : ?>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['email']; ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
</body></html>