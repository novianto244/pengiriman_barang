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
            $tipe = $request->tipe;
            $nik = $request->nik;

            switch($tipe){
                case 'pengiriman_baru':
                    if($id > 0){
                        $data = $this->getloaddata($id, 'PENGIRIMAN BARU', null); // Load more
                    }else{
                        $data = $this->getloaddata(null, 'PENGIRIMAN BARU', null); // Start Data
                    }
                    break;
                case 'berangkat':
                    if($id > 0){
                        $data = $this->getloaddata($id, 'BERANGKAT', null); // Load more
                    }else{
                        $data = $this->getloaddata(null, 'BERANGKAT', null); // Start Data
                    }
                    break;
                case 'terkirim':
                    if($id > 0){
                        $data = $this->getloaddata($id, 'TERKIRIM', null); // Load more
                    }else{
                        $data = $this->getloaddata(null, 'TERKIRIM', null); // Start Data
                    }
                    break;
                case 'batal':
                    if($id > 0){
                        $data = $this->getloaddata($id, 'BATAL', null); // Load more
                    }else{
                        $data = $this->getloaddata(null, 'BATAL', null); // Start Data
                    }
                    break;
            }

            $output = '';
            $last_id = '';
           
            if(!empty($data)){
                foreach($data as $key=>$value){
                    $output .= '
                    <div class="box-content">
                        <table class="table table-sm table-borderless" style="width:225px;">
                            <tr><td colspan="3" style="font-weight:bold; color:#36A0C3;"> <a href="detail-'.$value['nama_surat_jalan'].'-'.$nik.'">'.$value['nama_surat_jalan'].'</a></td></tr>
                            <tr><td colspan="3" style="font-weight:bold; font-size:10px; color:#666666; border-bottom:solid 1px #cccccc;"><i class="fa fa-user" style="margin-right:-15px;"></i>'.$value['NamaKaryawan'].'</td></tr>
                            <tr><td colspan="3" style="padding-top:5px; color:#666666;">'.$value['project_id'].'</td></tr>
                            <tr><td colspan="3" style="font-size:10px; font-style:italic; color:#666666; padding-bottom:5px;">'.substr($value['project_name'], 0, 35).'</td></tr>
                            <tr>
                                <td style="width:80px; font-weight:600; color:#666565;">Created Date</td>
                                <td style="width:10px; text-align:center;">:</td>
                                <td style="color:#666666;">'.tgl_indo($value['created_date']).'</td>
                            </tr>
                            <tr>
                                <td style="width:80px; font-weight:600; color:#666565;">Updated Date</td>
                                <td style="width:10px; text-align:center;">:</td>
                                <td style="color:#666666;">'.tgl_indo($value['created_detail']).'</td>
                            </tr>
                        </table>
                    </div>';

                    $last_id = $value['pengiriman_id'];
                }

                switch($tipe){
                    case 'pengiriman_baru':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_pengiriman_baru" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button_pengiriman_baru"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                    case 'berangkat':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_berangkat" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button_berangkat"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                    case 'terkirim':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_terkirim" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button_terkirim"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                    case 'batal':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_batal" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button_batal"><i class="fa fa-arrow-alt-circle-down" style="margin-right:-15px;"></i>Load More</button>
                                    </div>';
                        break;
                }
            }else{
                switch($tipe){
                    case 'pengiriman_baru':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_pengiriman_baru" class="btn btn-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                    case 'berangkat':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_berangkat" class="btn btn-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                    case 'terkirim':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_terkirim" class="btn btn-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
                                    </div>';
                        break;
                    case 'batal':
                        $output .= '<div id="load_more" class="loadmore">
                                        <button type="button" name="load_more_button_batal" class="btn btn-info form-control"><i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>No Data Found</button>
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
