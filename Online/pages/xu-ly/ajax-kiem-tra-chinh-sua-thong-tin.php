<?php 
	require_once '../../lib/db.php';

	//kiểm tra bằng bất kì $_POST nào trong data{} đều đc
	if(isset($_POST['maKH'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
		$maKH = $_POST['maKH'];
		
		$sql = "SELECT * FROM khachhang WHERE MaKH=$maKH";
		$rs = load($sql);
		$row = $rs->fetch_assoc();

		$flag = 1;

		if($_POST['ten_kh'] == ''){
			$ten_kh = $row['TenKH'];
		} else {
			if(strlen($_POST['ten_kh']) < 100){
				$ten_kh = $_POST['ten_kh'];
			} else {
				$ten_kh = $row['TenKH'];
				$flag = 0;
			}
		}

		if($_POST['email'] == ''){
			$email = $row['Email'];
		} else {
			if(strpos($_POST['email'], '@gmail.com') > 0 || strpos($_POST['email'], '@yahoo.com') > 0){
				$email = $_POST['email'];
			} else {
				$email = $row['Email'];
				$flag = 0;
			}
			
		}

		if($_POST['matkhau'] == ''){
			$matkhau =  $row['MatKhau'];
		} else {
			if($_POST['matkhau'] == $_POST['xacnhanmatkhau'] && strlen($_POST['matkhau']) > 7 && strlen($_POST['matkhau']) < 31 ){
				$matkhau = md5($_POST['matkhau']);
			} else {
				$matkhau =  $row['MatKhau'];
				$flag = 0;
			}
		}

		if($_POST['dienthoai'] == ''){
			$dienthoai =  $row['SDT'];
		} else {
			if(strlen($_POST['dienthoai']) > 9 && strlen($_POST['dienthoai']) < 12){
				$dienthoai = $_POST['dienthoai']; 
			} else {
				$dienthoai = $row['SDT'];
				$flag = 0;
			}
			
		}

		if($_POST['diachi'] == ''){
			$diachi =  $row['DiaChi'];
		} else {
			$diachi = $_POST['diachi']; 
		}

		$sql_U = "UPDATE khachhang SET TenKH='$ten_kh', MatKhau='$matkhau', Email='$email', DiaChi='$diachi', SDT='$dienthoai' WHERE MaKH=$maKH";
		load($sql_U);

		if($flag == 0){
			echo '<span style="color: red">Một vài mục không được cập nhật. Do nhập sai</span>';
		} else {
			echo '<span style="color: green">Cập nhật thành công</span>';
		}

	}
?>
