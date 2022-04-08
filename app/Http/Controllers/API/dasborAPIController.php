<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\modelBarang;
use App\Models\modelPengrajin;
use Illuminate\Http\Request;

class dasborAPIController extends Controller
{
    public function index()
    {
        //$res['title'] = "Selamat Datang di Halaman Admin";
        $res['jBrg'] = modelBarang::all()->count();
        $res['jPeng'] = modelPengrajin::all()->count();
        return response()->json($res);
    }
}
