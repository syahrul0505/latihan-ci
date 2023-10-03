<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLatihan1;

class Latihan1Controller extends BaseController
{
    public function index()
    {
        $data['model'] = new ModelLatihan1();

        return view('home/index');
    }
}
