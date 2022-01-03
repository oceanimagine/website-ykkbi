<?php 

class Privilege {
    public static function admin(){
	$GLOBALS['PRIV_ACTIVE'] = array(
	    "SUPERADMIN" => true,
            "ADMIN" => true
	);
	$jenis_privilege = array_keys($GLOBALS['PRIV_ACTIVE']);
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
	$same = 0;
        for($i = 0; $i < sizeof($jenis_privilege); $i++){
	    if((isset($_SESSION['PRI']) && $_SESSION['PRI'] == $jenis_privilege[$i])){
		$same = 1;
		break;
	    }
	}
	if(!$same){
	    redirect('login');
	}
    }
    
}