<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgama;



class Agama extends BaseController
{
    public function __construct()
    {
        $this->ModelAgama = new ModelAgama();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Agama',
            'agama' => $this->ModelAgama->getAlldata(),
        ];
        return view('admin/v_agama', $data);
    }

    public function insertData()
    {
        $data = [
        'agama' => $this->request->getPost('agama'),
        ];
        $this->ModelAgama->insertData($data);
        session()->setFlashdata('tambah','Data Berhasil di Tambah');
            return redirect()->to(base_url('agama'));
            
    }

    public function editData($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
            'agama' => $this->request->getPost('agama'),
        ];
        $this->ModelAgama->editData($data);
        session()->setFlashdata('edit','Data Berhasil di Edit');
            return redirect()->to(base_url('agama'));
    }

    public function deleteData($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
        ];
        $this->ModelAgama->deleteData($data);
        session()->setFlashdata('delete','Data Berhasil di Delete');
            return redirect()->to(base_url('agama'));
    }
}

