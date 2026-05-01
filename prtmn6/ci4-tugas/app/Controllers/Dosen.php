<?php

namespace App\Controllers;

class Dosen extends BaseController
{
    // Data dummy dosen
    private $dosenData = [
        [
            'id' => 1,
            'nidn' => '1234567890',
            'nama' => 'Dr. Ahmad Fauzi, M.Kom',
            'pendidikan' => 'S3 Informatika',
            'bidang_keahlian' => 'Machine Learning'
        ],
        [
            'id' => 2,
            'nidn' => '0987654321',
            'nama' => 'Prof. Siti Aminah, M.Sc',
            'pendidikan' => 'S2 Computer Science',
            'bidang_keahlian' => 'Data Science'
        ],
        [
            'id' => 3,
            'nidn' => '1122334455',
            'nama' => 'Drs. Bambang Santoso, M.Pd',
            'pendidikan' => 'S2 Pendidikan',
            'bidang_keahlian' => 'Pembelajaran Digital'
        ]
    ];

    // Menampilkan semua data dosen
    public function index()
    {
        $data = [
            'title' => 'Daftar Dosen',
            'dosen' => $this->dosenData
        ];

        return view('dosen/index', $data);
    }

    // Menampilkan detail dosen berdasarkan ID
    public function show($id = null)
    {
        $dosen = null;
        foreach ($this->dosenData as $d) {
            if ($d['id'] == $id) {
                $dosen = $d;
                break;
            }
        }

        if ($dosen) {
            $data = [
                'title' => 'Detail Dosen',
                'dosen' => $dosen
            ];
            return view('dosen/show', $data);
        } else {
            return redirect()->to('/dosen')->with('error', 'Dosen tidak ditemukan');
        }
    }
}
