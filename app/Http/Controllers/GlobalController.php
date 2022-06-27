<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;
use DB;

class GlobalController extends Controller
{
    use Getdata;
    function load_data_total(Request $request){
        $parameter = [
            'total' => 'TOTAL'
        ];
        $data_total = $this->getloaddata(null, null, $parameter);
        
        $pengiriman_baru = 0;
        $berangkat = 0;
        $terkirim = 0;
        $batal = 0;

        foreach($data_total as $key=>$value){
            if($value['status_pengiriman'] == 'PENGIRIMAN BARU'){$pengiriman_baru++;}
            if($value['status_pengiriman'] == 'BERANGKAT'){$berangkat++;}
            if($value['status_pengiriman'] == 'TERKIRIM'){$terkirim++;}
            if($value['status_pengiriman'] == 'BATAL'){$batal++;}
        }

        return response()->json([
            'pengiriman_baru'=>$pengiriman_baru,
            'berangkat' => $berangkat,
            'terkirim' => $terkirim,
            'batal' => $batal,
        ]);   
        
    }
}
