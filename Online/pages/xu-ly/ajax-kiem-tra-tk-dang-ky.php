<?php 
	require_once '../../lib/db.php';

	//Kiểm tra tài khoản tồn tại chưa
	if(isset($_POST['kttk'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}

    	$tk = $_POST['kttk'];

    	if($tk == '' || strlen($tk) > 20) {
    		echo '<h5 style="color: orange">Hãy nhập tài khoản</h5>';
    	} else {
    	$sql = "SELECT * FROM khachhang WHERE TaiKhoan='$tk'";
			$rs = load($sql);
			if($rs->num_rows > 0){
				echo '<h5 style="color: red">Đã tồn tại</h5>';
			} else {
				echo '<h5 style="color: green">Có thể dùng</h5>';
			}
		}
	}

	//Kiểm tra mật khẩu
	if(isset($_POST['ktmk'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}

    	$mk = $_POST['ktmk'];
    	if($mk == ''){
    		echo '<h5 style="color: orange">Hãy nhập mật khẩu</h5>';
    	} else if(strlen($mk) > 30 || strlen($mk) < 8){
    		echo '<h5 style="color: red">Không hợp lệ</h5>';	
    	} else {
    		echo '<h5 style="color: green">Hợp lệ</h5>';	
    	}
    }

    if(isset($_POST['ktxnmk'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}

    	$xnmk = $_POST['ktxnmk'];
    	$mk = $_POST['ktmk1'];
    	if($mk == ''){
    		echo '';	
    	} else if($xnmk == $mk && strlen($xnmk) < 31 && strlen($xnmk) > 7){
    		echo '<h5 style="color: green">Hợp lệ</h5>';
    	} else {
    		echo '<h5 style="color: red">Không hợp lệ</h5>';
    	}
    }

    if(isset($_POST['ktemail'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
    	$email = $_POST['ktemail'];
    	if($email == ''){
    		echo '<h5 style="color: orange">Hãy nhập email</h5>';
    	}else if(strpos($email ,'@gmail.com') > 0 || strpos($email ,'@yahoo.com') > 0){
    		echo '<h5 style="color: green">Hợp lệ</h5>';
    	} else {
    		echo '<h5 style="color: red">Không hợp lệ</h5>';
    	}
    }

    if(isset($_POST['ktdc'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
    	$diachi = $_POST['ktdc'];
    	if($diachi == ''){
    		echo '<h5 style="color: orange">Hãy nhập địa chỉ</h5>';
    	} else {
    		echo '<h5 style="color: green">Hợp lệ</h5>';
    	}
    }

    if(isset($_POST['ktdt'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
    	$dienthoai = $_POST['ktdt'];
    	if($dienthoai == ''){
    		echo '<h5 style="color: orange">Hãy nhập số điện thoại</h5>';
    	} else if(strlen($dienthoai) < 12 && strlen($dienthoai) > 9) {
    		echo '<h5 style="color: green">Hợp lệ</h5>';
    	} else {
    		echo '<h5 style="color: red">Không hợp lệ</h5>';
    	}
    }

    if(isset($_POST['ktten'])){
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        	die();
    	}
    	$tenkh = $_POST['ktten'];
    	if($tenkh == ''){
    		echo '<h5 style="color: orange">Hãy nhập tên</h5>';
    	} else if(strlen($tenkh) < 101) {
    		echo '<h5 style="color: green">Hợp lệ</h5>';
    	} else {
    		echo '<h5 style="color: red">Không hợp lệ</h5>';
    	}
    }
?>