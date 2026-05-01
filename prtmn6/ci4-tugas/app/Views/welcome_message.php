<!DOCTYPE html>
<html>

<head>
    <title><?= isset($title) ? $title : 'Daftar Dosen' ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .nav-buttons {
            position: absolute;
            top: 20px;
            right: 30px;
            display: flex;
            gap: 10px;
        }

        .nav-btn {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }

        .nav-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .nav-btn.mahasiswa {
            background: linear-gradient(135deg, #FF9800, #F44336);
        }

        .nav-btn.mahasiswa:hover {
            background: linear-gradient(135deg, #F44336, #FF9800);
        }

        .content {
            padding: 30px;
        }

        .info-bar {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .info-text {
            color: #2e7d32;
            font-weight: 500;
        }

        .stats {
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn-detail {
            background-color: #2196F3;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s;
        }

        .btn-detail:hover {
            transform: scale(1.05);
        }

        .footer {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
            color: #666;
        }

        @media (max-width: 768px) {
            .nav-buttons {
                position: static;
                justify-content: center;
                margin-top: 15px;
            }

            .header h1 {
                font-size: 1.8em;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="nav-buttons">
                <a href="/dosen" class="nav-btn" style="background-color: #4CAF50;">
                    📚 Dosen
                </a>
                <a href="/mahasiswa" class="nav-btn mahasiswa">
                    👨‍🎓 Mahasiswa
                </a>
            </div>
            <h1>📖 <?= $title ?? 'Daftar Dosen' ?></h1>
            <p>Manajemen Data Dosen - Sistem Informasi Akademik</p>
        </div>

        <div class="content">
            <div class="info-bar">
                <div class="info-text">
                    💡 Berikut adalah daftar dosen yang terdaftar di sistem
                </div>
                <div class="stats">
                    Total Dosen: <?= isset($dosen) && is_array($dosen) ? count($dosen) : 0 ?>
                </div>
            </div>

            <table id="dosenTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIDN</th>
                        <th>Nama Lengkap</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Bidang Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($dosen) && is_array($dosen) && !empty($dosen)): ?>
                        <?php foreach ($dosen as $d): ?>
                            <tr>
                                <td><?= $d['id'] ?? '-' ?></td>
                                <td><?= $d['nidn'] ?? '-' ?></td>
                                <td><?= $d['nama'] ?? '-' ?></td>
                                <td><?= $d['pendidikan'] ?? '-' ?></td>
                                <td><?= $d['bidang_keahlian'] ?? '-' ?></td>
                                <td>
                                    <button class="btn-detail" onclick="detailDosen(<?= $d['id'] ?? 0 ?>)">Detail</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">Tidak ada data dosen</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>&copy; <?= date('Y') ?> Sistem Informasi Akademik - CodeIgniter 4</p>
            <p><small>Gunakan menu di atas untuk beralih ke halaman Mahasiswa</small></p>
        </div>
    </div>

    <script>
        function detailDosen(id) {
            // Menampilkan detail dosen dengan alert (bisa diubah ke modal atau redirect)
            fetch(`/dosen/${id}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.dosen) {
                        alert(`Detail Dosen:\n\nNIDN: ${data.dosen.nidn}\nNama: ${data.dosen.nama}\nPendidikan: ${data.dosen.pendidikan}\nBidang Keahlian: ${data.dosen.bidang_keahlian}`);
                    } else {
                        alert('Data dosen tidak ditemukan');
                    }
                })
                .catch(error => {
                    // Fallback jika tidak ada response JSON
                    window.location.href = `/dosen/${id}`;
                });
        }

        // Tambahan fitur search (opsional)
        function searchDosen() {
            const input = document.getElementById('searchInput');
            if (!input) return;

            const filter = input.value.toUpperCase();
            const table = document.getElementById('dosenTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                if (cells.length > 0) {
                    const nidn = cells[1]?.textContent || '';
                    const nama = cells[2]?.textContent || '';
                    const textValue = nidn + ' ' + nama;

                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>

</html>