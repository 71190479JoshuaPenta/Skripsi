<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Data_Obat extends Controller
{
    public function showObat()
    {
        return view('admin/Data_Obat');
    }
}
