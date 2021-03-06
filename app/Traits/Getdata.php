<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Single;

trait Getdata
{   
    public function getloaddata($id, $parameter)
    {
        $bagianWhere = "";
        if(!empty($id)){
            $bagianWhere .= "t1.pengiriman_id < '".$id."' AND t1.status_delete=0";
        }else{
            $bagianWhere .= "t1.status_delete=0";
        }

        if(!empty($parameter['status_pengiriman'])){
            $bagianWhere .= " AND t3.status_pengiriman='".$parameter['status_pengiriman']."'";
        }

        if(!empty($parameter['nama_surat_jalan'])){
            $bagianWhere .= " AND t1.nama_surat_jalan LIKE '%".$parameter['nama_surat_jalan']."%'";
        }

        if(!empty($parameter['project_id'])){
            $bagianWhere .= " AND t1.project_id LIKE '%".$parameter['project_id']."%'";
        }

        if(!empty($parameter['nik'])){
            $bagianWhere .= " AND t1.nik = '".$parameter['nik']."'";
        }

        if(!empty($parameter['tanggal_surat_jalan'])){
            $bagianWhere .= " AND t1.tanggal_surat_jalan = '".$parameter['tanggal_surat_jalan']."'";
        }

        if(isset($parameter['total']) == 'TOTAL'){
            $limit = '';
        }else{
            $limit = 'LIMIT 5';
        }

        $sqlQuery = "SELECT * FROM drc.t_pengiriman AS t1

                    LEFT JOIN
                    (SELECT max(pengiriman_detail_id) as pengiriman_detail_id, pengiriman_id as pengirimanid, status_delete as statusdelete
                    FROM t_pengiriman_detail
                    WHERE status_delete =0
                    GROUP BY pengirimanid ) AS t2
                    ON t1.pengiriman_id = t2.pengirimanid
                    
                    LEFT JOIN
                    (SELECT pengiriman_detail_id as pengirimandetailid, status_pengiriman, nama_penerima, tanda_tangan_penerima, tanda_tangan_pengirim, foto_barang_penerima, foto_barang2, foto_surat_jalan, gps, gps_time, note_title, note, created_date as created_detail
                    FROM t_pengiriman_detail) AS t3
                    ON t2.pengiriman_detail_id = t3.pengirimandetailid

                    INNER JOIN 
                    (SELECT project_name, alamat_project, project_id FROM t_project) AS t4
                    ON t1.project_id = t4.project_id

                    INNER JOIN 
                    (SELECT NamaKaryawan, NIK FROM hrd2.jk_data_karyawan) AS t5
                    ON t1.nik = t5.NIK

                    WHERE $bagianWhere ORDER BY t1.pengiriman_id DESC $limit";
        $data = getArray($sqlQuery);

        return $data;
    }

    public function gethistory($id, $nama_surat_jalan){
        $bagianWhere = "";
        if(!empty($id)){
            $bagianWhere .= "t2.pengiriman_detail_id < '".$id."' AND t1.status_delete=0 AND t2.status_delete=0";
        }else{
            $bagianWhere .= "t1.status_delete=0 AND t2.status_delete=0";
        }

        $sqlQuery = "SELECT t1.*, t2.pengiriman_detail_id, t2.created_date as createddate, t2.status_pengiriman, t2.note_title, t2.note, t2.status_delete FROM drc.t_pengiriman as t1
                    RIGHT JOIN drc.t_pengiriman_detail as t2 
                    USING (pengiriman_id)
                    WHERE $bagianWhere AND t1.nama_surat_jalan = '".$nama_surat_jalan."' ORDER BY t2.pengiriman_detail_id DESC LIMIT 5";
        $result = getArray($sqlQuery);

        return $result;
    }

}