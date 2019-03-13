<?php  
	require '../../pages/xu-ly/gio-hang.inc';

	if(isset($_POST['msp'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
		$masp = $_POST['msp'];

		Xoa_sp($masp);
	}
?>