<?php  
	session_start();

	if(!isset($_SESSION['gio_hang'])){
		//khởi tạo giỏ hàng
		$_SESSION['gio_hang'] = array();
	}

	//hàm thêm vào giỏ
	function Them_sp($masp, $sl){
		if(array_key_exists($masp, $_SESSION['gio_hang'])){
			$_SESSION['gio_hang'][$masp] += $sl;
		} else {
			$_SESSION['gio_hang'][$masp] = $sl;
		}
	}

	function Xoa_sp($masp){
		unset($_SESSION['gio_hang'][$masp]);
	}

	function Chinhsua_sl_sp($masp, $sl){
		$_SESSION['gio_hang'][$masp] = $sl;
	}

	function TinhTong_sp(){
		$Tong = 0;
		foreach ($_SESSION['gio_hang'] as $masp => $sl) {
			$Tong = $Tong + $sl;
		}
		return $Tong;
	}
?>