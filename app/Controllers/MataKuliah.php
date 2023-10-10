<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MataKuliah extends BaseController
{
    public function index()
    {
        return view('mata-kuliah/view-form-matakuliah');
    }

    public function cetak()
    {

         //define validation
         $validation = $this->validate([
            'kode' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Kode Matakuliah Harus diisi',
                    'min_length' => 'Kode terlalu pendek'
                ]
            ],
            'nama'    => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Matakuliah Harus diisi',
                    'min_length' => 'Nama terlalu pendek'
                ]
            ],
        ]);

        if (!$validation) {
            return view('mata-kuliah/view-form-matakuliah', [
                'validation' => $this->validator
            ]);
        } else {
            $data = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'sks' => $this->request->getPost('sks')
                ];
                return view('mata-kuliah/view-data-matakuliah', $data);
        }

        
    }

}
