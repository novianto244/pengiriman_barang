<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;
use DB;

class DetailController extends Controller
{
    use Getdata;
    public function detail(Request $request){
        $parameter = $request->parameter;
        $arr_parameter = explode("-", $parameter);

        $nama_surat_jalan = $arr_parameter[0];
        $nik = $arr_parameter[1];

        $data = [
            'judul' => 'Detail Surat Jalan - ' . $nama_surat_jalan,
            'nama_surat_jalan' => $nama_surat_jalan,
            'nik' => $nik
        ];
        return view('detail', compact('data'));

    }

    public function load_timeline(Request $request){
        $id = $request->id;
        $nama_surat_jalan = $request->nama_surat_jalan;

        if($id > 0){
            $data = $this->gethistory($id, $nama_surat_jalan); //  Load More
        }else{
            $data = $this->gethistory(null, $nama_surat_jalan); // Start Data
        }

        $output = '';
        $last_id = '';

        if(!empty($data)){
            foreach($data as $key=>$value){
                $output .= '
                            <div class="timeline-5 right-5">
                                <div class="card timeline-shadow">
                                    <div class="card-body p-4">
                                        <p style="display:inline; font-weight:600; color:gray;">'.$value['created_by'].'</p>
                                        <p style="display:inline; color:gray;"> - </p>
                                        <p style="display:inline-block; color:gray;">'.$value['note_title'].'</p>                                    
                                        <p class="small text-muted"><i class="fa fa-clock" style="color:gray"></i>21 March, 2020</p>
                                        <hr>
                                        <p class="mt-2 mb-0" style="color:gray;">'.$value['note'].'</p>
                                    </div>
                                </div>
                            </div>';
                $last_id = $value['pengiriman_detail_id'];
            }
          
            $output .= '<div id="load_more" class="loadmore" style="width:200px; margin: 0 auto;">
                            <button type="button" name="load_more_button" class="btn btn-outline-success form-control" data-id="'.$last_id.'" id="load_more_button"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                        </div>';
        }else{
            $output .= '<div id="load_more" class="loadmore" style="width:400px; margin: 0 auto;">
                            <button type="button" name="load_more_button" class="btn btn-outline-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>This is the beginning of the timeline</button>
                        </div>';
        }

        return response()->json([
            'detail'=>$output,
        ]);   
    }

    public function getdatadetail(Request $request){
        $nama_surat_jalan = $request->nama_surat_jalan;
        $parameter = [
            'nama_surat_jalan' => $nama_surat_jalan
        ];

        $result = $this->getloaddata(null, null, $parameter);

        return response()->json([
            'nama_surat_jalan'=>$result[0]['nama_surat_jalan'],
            'tanggal_surat_jalan' => $result[0]['tanggal_surat_jalan'],
            'NamaKaryawan' => $result[0]['NamaKaryawan'],
            'kendaraan_id' => $result[0]['kendaraan_id'],
            'project_name' => $result[0]['project_name'],
            'alamat_project' => $result[0]['alamat_project'],
            'nama_penerima' => $result[0]['nama_penerima'],
            'tanda_tangan_penerima' => $result[0]['tanda_tangan_penerima'],
            'tanda_tangan_pengirim' => $result[0]['tanda_tangan_pengirim'],
            'foto_barang_penerima' => $result[0]['foto_barang_penerima'],
            'foto_barang2' => $result[0]['foto_barang2'],
            'foto_surat_jalan' => $result[0]['foto_surat_jalan'],
            'gps' => $result[0]['gps'],
            'gps_time' => $result[0]['gps_time'],
        ]);   
    }

}