<?php

namespace App\Controllers;

use App\Models\ModelLatihan1;
class Home extends BaseController
{
    public function index()
    {
        // dd('tes');
        $data['title'] = "Perkenalan";
        $data['perkenalan'] = "Nama saya Syahrul Alif Saputra Saya tinggal di daerah Pondok Ungu Permai olah raga yang saya sukai adalah Bulutangkis";
        return view('welcome_message', $data);
    }

    public function penjumlahan($n1, $n2)
    {
        // $this->model('Model_latihan1');
        $model = new ModelLatihan1();
        $data['nilai1'] = $n1;
        $data['nilai2'] = $n2;
        $data['hasil'] = $model->jumlah($n1, $n2);
        return view('home/index', $data);

    }
}
