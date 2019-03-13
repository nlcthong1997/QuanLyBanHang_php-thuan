<?php  
	require '../../pages/xu-ly/gio-hang.inc';

	if(isset($_POST['sl']) && isset($_POST['msp'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
		$soluong = $_POST['sl'];
		$masp = $_POST['msp'];
		
		Them_sp($masp, $soluong);
	}
?>