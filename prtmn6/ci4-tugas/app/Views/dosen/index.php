<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title) ? $title : 'Daftar Dosen' ?></title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h1><?= $title ?? 'Daftar Dosen' ?></h1> <!-- Null coalescing operator -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Pendidikan</th>
                <th>Bidang Keahlian</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($dosen) && !empty($dosen)): ?>
                <?php foreach($dosen as $d): ?>
                <tr>
                    <td><?= $d['id'] ?? '-' ?></td>
                    <td><?= $d['nidn'] ?? '-' ?></td>
                    <td><?= $d['nama'] ?? '-' ?></td>
                    <td><?= $d['pendidikan'] ?? '-' ?></td>
                    <td><?= $d['bidang_keahlian'] ?? '-' ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data dosen</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>