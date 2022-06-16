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

    function create_log($tipe, $query_type, $sql, $user){
		/* ::::::: Get IP Address ::::::: */
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
			$ip = $_SERVER['HTTP_CLIENT_IP'];  
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
		}else{  
			$ip = $_SERVER['REMOTE_ADDR'];  
		}  

		/* ::::::: Get Link ::::::: */
		$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		/* ::::::: Create Log ::::::: */
        $log =  date("Y/m/d")."|".date('H:i:s')."|".$ip."|".$tipe."|".$query_type."|".$user."|".$link."|".$sql."\n".PHP_EOL;
        file_put_contents('./log/scr_log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    }
?>