<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenghasilan;

class Penghasilan extends BaseController
{
    public function __construct()
    {
        $this->ModelPenghasilan = new ModelPenghasilan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Penghasilan',
            'penghasilan' => $this->ModelPenghasilan->getAlldata(),
        ];
        return view('admin/v_penghasilan', $data);
    }

    public function insertData()
    {
        $data = [
        'penghasilan' => $this->request->getPost('penghasilan'),
        ];
        $this->ModelPenghasilan->insertData($data);
        session()->setFlashdata('tambah','Data Berhasil di Tambah');
            return redirect()->to(base_url('penghasilan'));
            
    }

    public function editData($id_penghasilan)
    {
        $data = [
            'id_penghasilan' => $id_penghasilan,
            'penghasilan' => $this->request->getPost('penghasilan'),
        ];
        $this->ModelPenghasilan->editData($data);
        session()->setFlashdata('edit','Data Berhasil di Edit');
            return redirect()->to(base_url('penghasilan'));
    }

    public function deleteData($id_penghasilan)
    {
        $data = [
            'id_penghasilan' => $id_penghasilan,
        ];
        $this->ModelPenghasilan->deleteData($data);
        session()->setFlashdata('delete','Data Berhasil di Delete');
            return redirect()->to(base_url('penghasilan'));
    }
}
