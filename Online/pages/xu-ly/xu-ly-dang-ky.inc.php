<?php 
	require_once '../../lib/db.php';
	session_start();

	if(isset($_POST['btnDangKy'])){

		$taikhoan = isset($_POST['taikhoan']) ? $_POST['taikhoan'] : '';
		$matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
		$xacnhanmatkhau = isset($_POST['xacnhanmatkhau']) ? $_POST['xacnhanmatkhau'] : '';
		$matkhau_md5 = md5($xacnhanmatkhau);

		$tenkhachhang = isset($_POST['TenKH']) ? $_POST['TenKH'] : '';

		$ngay = isset($_POST['ngay']) ? $_POST['ngay'] : '';
		$thang = isset($_POST['thang']) ? $_POST['thang'] : '';
		$nam = isset($_POST['nam']) ? $_POST['nam'] : '';
		$ngaysinh = $nam.'-'.$thang.'-'.$ngay;

		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
		$dienthoai = isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
	
		$sql_kt_tk = "SELECT * FROM khachhang WHERE TaiKhoan='$taikhoan'";
		$rs_kt_tk = load($sql_kt_tk);

		if($rs_kt_tk->num_rows > 0){
			
			$_SESSION['thong_bao_dang_ky'] = 'False';

			if(isset($_SERVER['HTTP_REFERER'])){
				$url = $_SERVER['HTTP_REFERER'];
				header("Location: $url");
			}

		} else {
			if(strlen($taikhoan) < 20 && strlen($matkhau) > 8 && strlen($matkhau) < 30 && $matkhau == $xacnhanmatkhau && strlen($tenkhachhang) < 100 && (strpos($email, '@gmail.com') > 0 || strpos($email, '@yahoo.com') > 0) && strlen($dienthoai) < 12 && strlen($dienthoai) > 9) {

				//đặc quyền: 0 custom.
				$sql = "INSERT INTO khachhang (TaiKhoan,MatKhau,TenKH,Email,SDT,NgaySinh,DacQuyen,DiaChi) VALUES ('$taikhoan', '$matkhau_md5', '$tenkhachhang', '$email', '$dienthoai', '$ngaysinh', '0', '$diachi')";
				load($sql);

				$_SESSION['thong_bao_dang_ky'] = 'True';

				if(isset($_SERVER['HTTP_REFERER'])){
					$url = $_SERVER['HTTP_REFERER'];
					header("Location: $url");
				}

			} else {
				$_SESSION['thong_bao_dang_ky'] = 'False';

				if(isset($_SERVER['HTTP_REFERER'])){
					$url = $_SERVER['HTTP_REFERER'];
					header("Location: $url");
				}
			}
		}
	}
	

?>