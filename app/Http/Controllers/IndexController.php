<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;

class IndexController extends Controller
{
    use Getdata;
    public function index(Request $request)
    {
        // Untuk menu dashboard
        $parameter = $request->role;
        $arrParameter = explode(",", $parameter);

        $tipe = $arrParameter[0];
        $nik = $arrParameter[1];

        switch($tipe){
            case 'dashboard':
                $data = [
                    'judul' => 'Dashboard',
                    'nik' => $nik
                ];
                return view('dashboard', compact('data'));
                break;
        }


    }
}
