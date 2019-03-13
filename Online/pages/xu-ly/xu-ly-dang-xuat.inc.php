<?php  
	session_start();
	if (isset($_SESSION["dang_nhap"])) {

		unset($_SESSION["Cookie_nho_mat_khau"]);

		unset($_SESSION["dang_nhap"]);
		
		unset($_SESSION["thong_tin_khach_hang"]);

		// $_SESSION["giohang"] = array();

	}

	header('Location: /online/index.php');
?>