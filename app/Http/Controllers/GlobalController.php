<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;
use DB;

class GlobalController extends Controller
{
    use Getdata;
    function load_data_total(Request $request){
        $arr_parameter = $request->parameter;
        $parameter = [
            'nama_surat_jalan' => $arr_parameter[0],
            'project_id' => $arr_parameter[1],
            'nik' => $arr_parameter[2],
            'tanggal_surat_jalan' => $arr_parameter[3],
            'total' => 'TOTAL'
        ];

        $data_total = $this->getloaddata(null, $parameter);
        
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

    function getdriver(Request $request){
        $sqlQuery = "SELECT t1.NIK, t1.NamaKaryawan, t1.Kodejabatan, t2.Jabatan FROM hrd2.jk_data_karyawan as t1
                    INNER JOIN hrd2.jk_data_jabatan as t2
                    USING (KodeJabatan)
                    WHERE Jabatan='DRIVER'";
        $result = getArray($sqlQuery);
        
        // Insert blank record
        $insert_blank = [
            'NIK' => '',
            'NamaKaryawan' => 'Search by Driver'
        ];
        array_unshift($result, $insert_blank);

        return response()->json($result);
    }

    function move_status_sj(Request $request){
        $parameter = [
            'nama_surat_jalan' => $request->nama_surat_jalan,
            'target' => $request->target
        ];dd($parameter);
        $last_arr = $this->getloaddata(null, null, $parameter);

        $arr = [
            'pengiriman_id' => $last_arr[0]['pengiriman_id'],
            'status_pengiriman' => 'BATAL',
            'nama_penerima' => $last_arr[0]['nama_penerima'],
            'tanda_tangan_penerima' => $last_arr[0]['tanda_tangan_penerima'],
            'tanda_tangan_pengirim' => $last_arr[0]['tanda_tangan_pengirim'],
            'foto_barang_penerima' => $last_arr[0]['foto_barang_penerima'],
            'foto_barang2' => $last_arr[0]['foto_barang2'],
            'foto_surat_jalan' => $last_arr[0]['foto_surat_jalan'],
            'gps' => $last_arr[0]['gps'],
            'gps_time' => $last_arr[0]['gps_time'],
            'note_title' => 'changed a deal',
            'note' => 'Stage: from '.$last_arr[0]['status_pengiriman']. ' to BATAL. Last Move At : '.$time_now,
            'status_delete' => 0,
            'created_date' => $time_now,
            'created_by' => $user
        ];


    }
}
