<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJalurMasuk;

class JalurMasuk extends BaseController
{

    public function __construct()
    {
        $this->ModelJalurMasuk = new ModelJalurMasuk();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Jalur Masuk',
            'jalurmasuk' => $this->ModelJalurMasuk->getAllData(),
        ];
        return view('admin/v_jalur_masuk', $data);
    }

    public function insertData()
    {
        $data = [
            'jalur_masuk' => $this->request->getPost('jalur_masuk'),
            'kuota' => $this->request->getPost('kuota'),
        ];
        $this->ModelJalurMasuk->insertData($data);
        session()->setFlashdata('tambah', 'Data Berhasil di Tambah');
        return redirect()->to(base_url('/JalurMasuk'));
    }

    public function editData($id_jalur_masuk)
    {
        $data = [
            'id_jalur_masuk' => $id_jalur_masuk,
            'jalur_masuk' => $this->request->getPost('jalur_masuk'),
            'kuota' => $this->request->getPost('kuota'),
        ];
        $this->ModelJalurMasuk->editData($data);
        session()->setFlashdata('edit', 'Data Berhasil di Edit');
        return redirect()->to(base_url('/JalurMasuk'));
    }

    public function deleteData($id_jalur_masuk)
    {
        $data = [
            'id_jalur_masuk' => $id_jalur_masuk,
        ];
        $this->ModelJalurMasuk->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil di Delete');
        return redirect()->to(base_url('/JalurMasuk'));
    }
}
