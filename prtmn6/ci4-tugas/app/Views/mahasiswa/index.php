<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2196F3;
            color: white;
        }

        .json-view {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php if (!empty($mahasiswa ?? null)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (($mahasiswa ?? []) as $m): ?>
                    <tr>
                        <td><?= $m['id'] ?? '-' ?></td>
                        <td><?= $m['nim'] ?? '-' ?></td>
                        <td><?= $m['nama'] ?? '-' ?></td>
                        <td><?= $m['jurusan'] ?? '-' ?></td>
                        <td><?= $m['semester'] ?? '-' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="json-view">
            <pre><?= json_encode($mahasiswa ?? [], JSON_PRETTY_PRINT) ?></pre>
        </div>
    <?php endif; ?>

</body>

</html>