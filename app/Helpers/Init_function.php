<?php

    function getOne($sqlQuery){
        // convert stdclass to array
        $search = DB::select($sqlQuery);
        if(!empty($search)){
            $searchGetOne = $search[0];
            $content = json_decode(json_encode($searchGetOne), TRUE);
        }else{
            $content = "";
        }
        
        return $content;
    }

    function getArray($sqlQuery){
        // convert stdclass to array
        $content = json_decode(json_encode(DB::select($sqlQuery)), TRUE);
        return $content;
    }

    function getnamebynik($nik){
        $sqlQuery = "SELECT NamaKaryawan FROM hrd2.jk_data_karyawan WHERE NIK = '".$nik."'";
        $result = getOne($sqlQuery);

        if($result){
            return $result['NamaKaryawan'];
        }else{
            return '';
        }
    }

    function getusersession($request){
		$datalogin = $request->session()->all();
        $user = $datalogin['login'][0]['username'];

		return $user;
	}

?>