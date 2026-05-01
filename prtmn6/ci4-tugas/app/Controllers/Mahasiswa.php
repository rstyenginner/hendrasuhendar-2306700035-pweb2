<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    // Data dummy mahasiswa
    private $mahasiswaData = [
        [
            'id' => 1,
            'nim' => '20230001',
            'nama' => 'Andi Saputra',
            'jurusan' => 'Teknik Informatika',
            'semester' => 3
        ],
        [
            'id' => 2,
            'nim' => '20230002',
            'nama' => 'Budi Wibowo',
            'jurusan' => 'Sistem Informasi',
            'semester' => 5
        ],
        [
            'id' => 3,
            'nim' => '20230003',
            'nama' => 'Citra Dewi',
            'jurusan' => 'Teknik Komputer',
            'semester' => 1
        ]
    ];

    // GET /mahasiswa - Menampilkan semua data
    public function index()
    {
        $data = [
            'status' => 200,
            'data' => $this->mahasiswaData
        ];
        
        // Cek apakah request dari browser atau API
        if ($this->request->isAJAX() || $this->request->getHeaderLine('Accept') == 'application/json') {
            return $this->respond($data);
        }
        
        return view('mahasiswa/index', ['mahasiswa' => $this->mahasiswaData]);
    }

    // GET /mahasiswa/{id} - Menampilkan detail
    public function show($id = null)
    {
        $mahasiswa = null;
        foreach ($this->mahasiswaData as $m) {
            if ($m['id'] == $id) {
                $mahasiswa = $m;
                break;
            }
        }
        
        if ($mahasiswa) {
            $data = [
                'status' => 200,
                'data' => $mahasiswa
            ];
            
            if ($this->request->isAJAX() || $this->request->getHeaderLine('Accept') == 'application/json') {
                return $this->respond($data);
            }
            
            return view('mahasiswa/show', $data);
        }
        
        return $this->failNotFound('Mahasiswa dengan ID ' . $id . ' tidak ditemukan');
    }

    // POST /mahasiswa - Menambah data baru
    public function create()
    {
        $data = $this->request->getJSON(true);
        
        // Validasi sederhana
        if (empty($data['nim']) || empty($data['nama'])) {
            return $this->failValidationErrors('NIM dan Nama wajib diisi');
        }
        
        $id = count($this->mahasiswaData) + 1;
        $newMahasiswa = [
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'jurusan' => $data['jurusan'] ?? 'Belum ditentukan',
            'semester' => $data['semester'] ?? 1
        ];
        
        return $this->respondCreated($newMahasiswa, 'Mahasiswa berhasil ditambahkan');
    }

    // PUT /mahasiswa/{id} - Update data
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        
        // Cek apakah data dengan ID tersebut ada
        $found = false;
        foreach ($this->mahasiswaData as $m) {
            if ($m['id'] == $id) {
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            return $this->failNotFound('Mahasiswa tidak ditemukan');
        }
        
        $updatedData = [
            'id' => $id,
            'nim' => $data['nim'] ?? 'Updated NIM',
            'nama' => $data['nama'] ?? 'Updated Name',
            'jurusan' => $data['jurusan'] ?? 'Updated Jurusan',
            'semester' => $data['semester'] ?? 1
        ];
        
        return $this->respond($updatedData, 200, 'Data berhasil diupdate');
    }

    // DELETE /mahasiswa/{id} - Hapus data
    public function delete($id = null)
    {
        // Cek apakah ID ada
        $found = false;
        foreach ($this->mahasiswaData as $m) {
            if ($m['id'] == $id) {
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            return $this->failNotFound('Mahasiswa tidak ditemukan');
        }
        
        return $this->respondDeleted(['id' => $id], 'Mahasiswa berhasil dihapus');
    }
}