<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;
use App\Models\Pengiriman;
use App\Models\PengirimanDetail;
use DB;

class CrudController extends Controller
{
    use Getdata;
    public function crud_delete(Request $request){
        $tipe = $request->tipe;
        $time_now = now();
        $user = getusersession($request);

        switch($tipe){
            case 'surat_jalan' :
                $surat_jalan = $request->surat_jalan;
                $getid = getidby('pengiriman_id', 't_pengiriman', 'nama_surat_jalan', $surat_jalan);
        
                $id = $getid['pengiriman_id'];
                $table_id = 'pengiriman_id';
                $model = "\\"."App"."\\"."Models"."\\"."Pengiriman";
                break;
        }
       
        $saved = $model::updateOrCreate(
            [$table_id => $id],
            [
                'status_delete' => 1,
                'deleted_date' => $time_now,
                'deleted_by' => $user
            ]);

        return response()->json(['success' => 'Data Deleted Successfully.']);
    }

    public function crud_update(Request $request){
        $tipe = $request->tipe;
        $task = $request->task;
        $time_now = now();
        $user = getusersession($request);

        switch($tipe){
            case 'surat_jalan':
                $surat_jalan = $request->surat_jalan;
                $id = getid('PengirimanDetail', 'pengiriman_detail');
                $table_id = 'pengiriman_detail_id';
                $model = "\\"."App"."\\"."Models"."\\"."PengirimanDetail";
                $parameter = [
                    'nama_surat_jalan' => $surat_jalan
                ];
                $last_arr = $this->getloaddata(null, null, $parameter);

                switch($task){
                    case 'batal':
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
                        break;
                }
                break;
        }

        foreach($arr as $key=>$value){
            $saved = $model::updateOrCreate(
                [$table_id => $id],
                [$key => $value]
            );
           
        }

        return response()->json(['success' => 'Data Updated Successfully.']);
        
    }
}
