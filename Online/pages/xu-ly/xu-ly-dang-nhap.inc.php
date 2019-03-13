<?php
require_once "../../lib/db.php";
session_start();

if(isset($_POST['btnDangNhap'])){

	$taikhoan = isset($_POST['TaiKhoan']) ? $_POST['TaiKhoan'] : '';
	$matkhau = isset($_POST['MatKhau']) ? $_POST['MatKhau'] : '';
	$md5_matkhau = md5($matkhau);

	$sql = "SELECT * FROM khachhang WHERE TaiKhoan='$taikhoan' and MatKhau='$md5_matkhau'";
	$rs = load($sql);

	if($rs->num_rows > 0){

		$_SESSION['dang_nhap'] = 1;
		// gán session[thong_tin_khach_hang] cho object lưu các dữ liệu đc truy vấn
		$_SESSION['thong_tin_khach_hang'] = $rs->fetch_object();
		if(isset($_POST['NhoMatKhau']) && $_POST['NhoMatKhau'] == 'yes'){
			
			$id_Khach_hang = $_SESSION['thong_tin_khach_hang']->MaKH;

			$_SESSION['Cookie_nho_mat_khau'] = $id_Khach_hang;
		}
		header('Location: /online/index.php');
	} else {
		
		$_SESSION['thong_bao_dang_nhap'] = 'False';
		
		if (isset($_SERVER['HTTP_REFERER'])) {
		    $url = $_SERVER['HTTP_REFERER'];
		    header("location: $url");
		}
	}
}
?>

