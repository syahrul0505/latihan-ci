<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Web extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Halaman Depan';

        return view('latihan_wp/v_header', $data)
        . view('latihan_wp/v_index', $data)
        . view('latihan_wp/v_footer', $data);
    }

    public function about()
    {
        $data['judul'] = 'Halaman About';
        return view('latihan_wp/v_header', $data)
            . view('latihan_wp/v_about', $data)
            . view('latihan_wp/v_footer', $data);
    }


}
