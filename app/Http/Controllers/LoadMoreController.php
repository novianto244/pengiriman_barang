<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;
use DB;

class LoadMoreController extends Controller
{
    use Getdata;
    function load_data(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $nik = $request->nik;
            $arr_parameter = $request->parameter;
            $parameter = [
                'status_pengiriman' => $arr_parameter[0],
                'nama_surat_jalan' => $arr_parameter[1],
                'project_id' => $arr_parameter[2],
                'nik' => $arr_parameter[3],
                'tanggal_surat_jalan' => $arr_parameter[4],
            ];

            switch($parameter['status_pengiriman']){
                case 'PENGIRIMAN BARU':
                    if($id > 0){
                        $data = $this->getloaddata($id, $parameter); // Load more
                    }else{
                        $data = $this->getloaddata(null, $parameter); // Start Data
                    }
                    break;
                case 'BERANGKAT':
                    if($id > 0){
                        $data = $this->getloaddata($id, $parameter); // Load more
                    }else{
                        $data = $this->getloaddata(null, $parameter); // Start Data
                    }
                    break;
                case 'TERKIRIM':
                    if($id > 0){
                        $data = $this->getloaddata($id, $parameter); // Load more
                    }else{
                        $data = $this->getloaddata(null, $parameter); // Start Data
                    }
                    break;
                case 'BATAL':
                    if($id > 0){
                        $data = $this->getloaddata($id, $parameter); // Load more
                    }else{
                        $data = $this->getloaddata(null, $parameter); // Start Data
                    }
                    break;
            }

            $output = '';
            $last_id = '';
           
            if(!empty($data)){
                foreach($data as $key=>$value){
                    $output .= '
                    <div class="box-content" id="'.$value['nama_surat_jalan'].'" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true"> 
                        <table class="table table-sm table-borderless" style="width:225px;">
                            <tr><td colspan="3" style="font-weight:bold; color:#36A0C3;"> <a href="detail-'.$value['nama_surat_jalan'].'-'.$nik.'">'.$value['nama_surat_jalan'].'</a></td></tr>
                            <tr><td colspan="3" style="font-weight:bold; font-size:10px; color:#666666; border-bottom:solid 1px #cccccc;"><i class="fa fa-user" style="margin-right:-15px;"></i>'.$value['NamaKaryawan'].' - <span style="color:#666666; font-weight:400;"> '.$value['nik'].' </span></td></tr>
                            <tr><td colspan="3" style="padding-top:5px; color:#666666;">'.$value['project_id'].'</td></tr>
                            <tr><td colspan="3" style="font-size:10px; font-style:italic; color:#666666; padding-bottom:5px;">'.substr($value['project_name'], 0, 35).'</td></tr>
                            <tr>
                                <td style="width:80px; font-weight:600; color:#666565;">Created Date</td>
                                <td style="width:10px; text-align:center;">:</td>
                                <td style="color:#666666;">'.tgl_indo($value['tanggal_surat_jalan']).'</td>
                            </tr>
                            <tr>
                                <td style="width:80px; font-weight:600; color:#666565;">Updated Date</td>
                                <td style="width:10px; text-align:center;">:</td>
                                <td style="color:#666666;">'.tgl_indo_detail($value['created_detail']).'</td>
                            </tr>
                        </table>
                    </div>';

                    $last_id = $value['pengiriman_id'];
                }

                switch($parameter['status_pengiriman']){
                    case 'PENGIRIMAN BARU':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_pengiriman_baru" class="btn btn-outline-success form-control" data-id="'.$last_id.'" id="load_more_button_pengiriman_baru"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                    case 'BERANGKAT':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_berangkat" class="btn btn-outline-success form-control" data-id="'.$last_id.'" id="load_more_button_berangkat"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                    case 'TERKIRIM':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_terkirim" class="btn btn-outline-success form-control" data-id="'.$last_id.'" id="load_more_button_terkirim"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                    case 'BATAL':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_batal" class="btn btn-outline-success form-control" data-id="'.$last_id.'" id="load_more_button_batal"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                }
            }else{
                switch($parameter['status_pengiriman']){
                    case 'PENGIRIMAN BARU':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_pengiriman_baru" class="btn btn-outline-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                    case 'BERANGKAT':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_berangkat" class="btn btn-outline-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                    case 'TERKIRIM':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_terkirim" class="btn btn-outline-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                    case 'BATAL':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_batal" class="btn btn-outline-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                }
            }
            
            return response()->json([
                'surat_jalan'=>$output,
            ]);   
        }

    }
}

?>
