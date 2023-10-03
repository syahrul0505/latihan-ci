<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLatihan1 extends Model
{
    public $nilai1, $nilai2, $hasil;

    public function jumlah($nil1, $nil2)
    {
        $this->nilai1 = $nil1;
        $this->nilai2 = $nil2;
        $hasil = $this->nilai1 + $this->nilai2;
        return $hasil;
    }

    public function tes(){
        $data = "tes";
        return $data; 
    }
}
