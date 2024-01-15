<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Data_Pasien extends Controller
{
    public function showDataPasien()
    {
        return view('admin/data_pasien');
    }
}
