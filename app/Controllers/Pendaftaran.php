<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;
use App\Models\ModelSiswa;
use App\Models\ModelJalurMasuk;
use App\Models\ModelJurusan;

class Pendaftaran extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJalurMasuk = new ModelJalurMasuk();
        $this->ModelJurusan = new ModelJurusan();
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Pendaftaran',
            'ta'   => $this->ModelTa->statusTa(),
            'jalur_masuk' => $this->ModelJalurMasuk->getAllData(),
            'jurusan' => $this->ModelJurusan->getAllData(),
            'validation' => \config\Services::validation(),
        ];
        return view('v_pendaftaran', $data);
    }

    public function simpanPendaftaran()
    {
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules'  => 'required|max_length[10]|is_unique[tbl_siswa.nisn]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'max_lenght' => '{field} Max 10 karakter !!',
                    'is_unique' => '{field} Ini sudah Terdaftar !!',
                ]
            ],
            'nama_lengkap'    => [
                'label' => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_jalur_masuk'    => [
                'label' => 'Jalur Masuk',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'nama_panggilan'    => [
                'label' => 'Nama Panggilan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'tempat_lahir'    => [
                'label' => 'Tempat Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jenis_kelamin'    => [
                'label' => 'Jenis Kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'tanggal'    => [
                'label' => 'Tanggal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'bulan'    => [
                'label' => 'Bulan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'tahun'    => [
                'label' => 'Tahun',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
                
            ],
        ])) {
            //jika tidak ada validasi maka simpan data
            $ta = $this->ModelTa->statusTa();
            $tahun = $this->request->getPost('tahun');
            $bulan = $this->request->getPost('bulan');
            $tanggal = $this->request->getPost('tanggal');
            $no_pendaftaran = $this->ModelSiswa->noPendaftaran();
            $data = [
                'no_pendaftaran' => $no_pendaftaran,
                'tahun' => $ta['tahun'],
                'tgl_pendaftaran' => date('Y-m-d'),
                'nisn' => $this->request->getPost('nisn'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'nama_panggilan' => $this->request->getPost('nama_panggilan'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tgl_lahir' => $tahun . '-' . $bulan . '-' . $tanggal,
                'password' => $this->request->getPost('nisn'),
            ];
            $this->ModelSiswa->insertData($data);
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data !!!');
            return redirect()->to('/pendaftaran');
        } else {
            //jika ada validasi
            $validation =  \Config\Services::validation();
            return redirect()->to('/pendaftaran')->withInput()->with('validation', $validation);
        }
    }
}
