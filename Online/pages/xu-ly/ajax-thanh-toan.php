<?php  
	require '../../lib/db.php';
	session_start();

	if(isset($_POST['mkh']) && isset($_POST['tong'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}

		$ma_kh = $_POST['mkh'];
		$tong_tien = $_POST['tong'];
		$date_current = date("Y-m-d H:i:s",strtotime("+6 hours"));
		$trangthai = "chưa giao";

		//insert vào database và lấy ra stt của đơn hàng
		$sql = "INSERT INTO donhang(NgayLap,MaKH,TongTien,TrangThai) VALUES('$date_current','$ma_kh',$tong_tien,'$trangthai')";
		$ma_don_hang = write($sql);


		foreach ($_SESSION['gio_hang'] as $masp => $sl) {
			$sql_1 = "SELECT * FROM sanpham WHERE MaSP=$masp";
			$rs_1 = load($sql_1);
			$row_1 = $rs_1->fetch_assoc();

			if($sl > $row_1['SoLuong']){
				$sl = $row_1['SoLuong'];
			}

			//cập nhật lại số lượng tồn và số lượng đã bán được
			$sl_con_lai = $row_1['SoLuong'] - $sl;
			$sl_da_ban_moi = $row_1['SoLuongDaBan'] + $sl;

			$sql_U = "UPDATE sanpham SET SoLuong='$sl_con_lai', SoLuongDaBan='$sl_da_ban_moi' WHERE MaSP=$masp";
			load($sql_U);

			//Thêm vào chi tiết hóa đơn
			$Tong_tien_1_sp = $sl * $row_1['Gia'];
			$GiaSP = $row_1['Gia'];
			$sql_I = "INSERT INTO ct_donhang(MaSP,MaDH,Soluong,GiaSP,ThanhTien) VALUES('$masp','$ma_don_hang', '$sl', '$GiaSP', '$Tong_tien_1_sp')";
			load($sql_I);
		}

		//cho giỏ hàng rỗng như ban đầu
		$_SESSION["gio_hang"] = array();
		echo 1;
	}
?>