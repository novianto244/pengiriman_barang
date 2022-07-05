<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Traits\Getdata;
use App\Models\Pengiriman;
use App\Models\PengirimanDetail;

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

    public function crud_update_status(Request $request){
        $tipe = $request->tipe;
        $time_now = now();
        $user = getusersession($request);

        switch($tipe){
            case 'surat_jalan':
                $task = $request->task;
                $surat_jalan = $request->surat_jalan;
                
                $id = getid('PengirimanDetail', 'pengiriman_detail');
                $table_id = 'pengiriman_detail_id';
                $model = "\\"."App"."\\"."Models"."\\"."PengirimanDetail";
                
                $parameter = [
                    'nama_surat_jalan' => $surat_jalan
                ];

                // Get last data
                $last_arr = $this->getloaddata(null, $parameter);

                $arr = [
                    'pengiriman_id' => $last_arr[0]['pengiriman_id'],
                    'status_pengiriman' => $task,
                    'nama_penerima' => $last_arr[0]['nama_penerima'],
                    'tanda_tangan_penerima' => $last_arr[0]['tanda_tangan_penerima'],
                    'tanda_tangan_pengirim' => $last_arr[0]['tanda_tangan_pengirim'],
                    'foto_barang_penerima' => $last_arr[0]['foto_barang_penerima'],
                    'foto_barang2' => $last_arr[0]['foto_barang2'],
                    'foto_surat_jalan' => $last_arr[0]['foto_surat_jalan'],
                    'gps' => $last_arr[0]['gps'],
                    'gps_time' => $last_arr[0]['gps_time'],
                    'note_title' => 'changed a deal',
                    'note' => 'Stage: from '.$last_arr[0]['status_pengiriman']. ' to ' .$task. '. Last Move At : '.$time_now,
                    'status_delete' => 0,
                    'created_date' => $time_now,
                    'created_by' => $user
                ];
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

    public function crud_update(Request $request){
        dd("masuk sini");
    }

    public function crud_form_image(Request $request){
        // Get parameter
        $nama_penerima = $request->nama_penerima;
        $nama_surat_jalan = $request->penerima_nama_surat_jalan;
        $time_now = now();
        $user = getusersession($request);

        // Save gambar
        $sig_string = $_POST['signature'];
        $default_name = $nama_surat_jalan."-ttd_penerima-".$nama_penerima.".png";
        $nama_file="gambar/".$default_name;
        file_put_contents($nama_file, file_get_contents($sig_string));

        // Get last data    
        $parameter = [
            'nama_surat_jalan' => $nama_surat_jalan
        ];
        $result = $this->getloaddata(null, $parameter);
        $id = getid("PengirimanDetail", "pengiriman_detail");

        // Save Database
        PengirimanDetail::updateOrCreate(
            ['pengiriman_detail_id' => $id],
            [
                'pengiriman_id' => $result[0]['pengirimanid'],
                'status_pengiriman' => $result[0]['status_pengiriman'],
                'nama_penerima' => $nama_penerima,
                'tanda_tangan_penerima' => $default_name,
                'tanda_tangan_pengirim' => $result[0]['tanda_tangan_pengirim'],
                'foto_barang_penerima' => $result[0]['foto_barang_penerima'],
                'foto_barang2' => $result[0]['foto_barang2'],
                'foto_surat_jalan' => $result[0]['foto_surat_jalan'],
                'gps' => $result[0]['gps'],
                'gps_time' => $result[0]['gps_time'],
                "note_title" => "added an additional field",
                "note" => "Has filled field: Nama & Tanda Tangan Penerima",
                'status_delete' => 0,
                'created_date' => $time_now,
                'created_by' => $user
            ]);
        
        return back()
        ->with('success', 'Data Successfully Saved !');
    }
}
