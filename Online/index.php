<?php 
	require_once 'lib/db.php';

	//start
	session_start();

	// khởi tạo $_SESSION['dang_nhap'] lần 1: page-đang-nhap.
	// khởi tạo $_SESSION['dang_nhap'] lần 2: index (Nếu đăng xuất sẽ mất $_SESSION['dang_nhap'] nên khởi tạo lại)
	if(!isset($_SESSION['dang_nhap'])){
		// nếu 0: chưa đăng nhập.
		// nếu 1: đã đăng nhập.
		$_SESSION['dang_nhap'] = 0;
	}
	
	// lưu vào cookie: setcookie(name, value, expires)
	// lưu ý: tên cookie không viết hoa.
	// setcookie phải được khởi tạo trước thẻ <html>
	if(isset($_SESSION['Cookie_nho_mat_khau'])){

		$id_phien = $_SESSION['Cookie_nho_mat_khau'];
		setcookie('phien_id_kh', $id_phien, time() + 86400);

	} else {
		setcookie('phien_id_kh', '', time() - 3600);
	}

	if($_SESSION['dang_nhap'] == 0){
		if(isset($_COOKIE['phien_id_kh'])){
			
			$id_KH = $_COOKIE['phien_id_kh'];

			$sql_phien = "SELECT * FROM khachhang WHERE MaKH=$id_KH";
			$rs_phien = load($sql_phien);

			if($rs_phien->num_rows > 0) {
				$_SESSION['thong_tin_khach_hang'] = $rs_phien->fetch_object();
				$_SESSION['dang_nhap'] = 1;
			}
		}
	}

	//kiểm tra page
	$Page = isset($_GET['Page']) ? $_GET['Page'] : '';

	//kiểm tra idsp cho trang chi tiết
	$idSP = isset($_GET['idSP']) ? $_GET['idSP'] : '';
	
	$sql_ct = "SELECT MaSP FROM sanpham";
	$rs_ct = load($sql_ct);
	$ds_idsp = array();
	if ($rs_ct->num_rows > 0) {
		while ($row_ct = $rs_ct->fetch_assoc()){
			$ds_idsp[] = $row_ct['MaSP'];	
		}
	}

	//kiểm tra idnsx
	$idnsx = isset($_GET['idnsx']) ? $_GET['idnsx'] : '';
	
	$sql_nsx = "SELECT * FROM nsx";
	$rs_nsx = load($sql_nsx);
	$ds_idnsx = array();
	if($rs_nsx->num_rows > 0){
		while($row_nsx = $rs_nsx->fetch_assoc()){
			$ds_idnsx[] = $row_nsx['MaNSX'];
		}
	}

	//kiểm tra idloai
	$idloai = isset($_GET['idloai']) ? $_GET['idloai'] : '';

	$sql_loai = "SELECT * FROM danhmuc";
	$rs_loai = load($sql_loai);
	$ds_idloai = array();
	if($rs_loai->num_rows > 0){
		while($row_loai = $rs_loai->fetch_assoc()){
			$ds_idloai[] = $row_loai['MaLoai'];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'blocks/head.php'; ?>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<?php require 'blocks/header/header-top.php'; ?>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<?php require 'blocks/header/header-middle.php'; ?>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<?php require 'blocks/header/header-bottom.php'; ?>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	 <section id="slider"><!--slider-->
	 	<?php 
	 		switch ( $Page ) {
	 			case 'chi-tiet':
	 			case 'thong-tin-ca-nhan':
	 			case 'dang-nhap':
	 			case 'dang-ky':
	 			case 'gio-hang':
	 			case 'nsx':
	 			case 'loai':
	 			case 'lich-su-mua':
	 			case 'tim-kiem':
	 				break;
	 			default:
	 				require 'blocks/slider.php';
	 				break;
	 		} 
	 	?>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<!--menu-loai-san-pham-->
							<?php require 'blocks/menu-middle/menu-loai-san-pham.php'; ?>
						<!--/category-products-->
					
						<div class="brands_products"><!--menu nhà sản xuất-->
							<?php require 'blocks/menu-middle/menu-nha-san-xuat.php'; ?>
						</div><!--/menu nhà sản xuất-->

						<div class="shipping text-center"><!--shipping-->
							<?php require 'blocks/menu-middle/menu-image-quang-cao.php'; ?>
						</div><!--/shipping-->
					</div>
				</div>
				
				
				<div class="col-sm-9 padding-right"><!-- pages nội dung-->
					
					<?php
						switch ( $Page ) {
							case 'thong-tin-ca-nhan':
								require 'pages/page-thong-tin-ca-nhan.php';
								break;
							case 'chi-tiet':
								switch ( $idSP ) {
									case in_array($idSP, $ds_idsp):
										require 'pages/page-chi-tiet.php';
										break;
									default:
										require 'pages/page-khong-ton-tai.php';
								}
								break;
							case 'dang-nhap':
								require 'pages/page-dang-nhap.php';
								break;
							case 'dang-ky':
								require 'pages/page-dang-ky.php';
								break;
							case 'nsx':
								switch ( $idnsx ) {
									case in_array($idnsx, $ds_idnsx):
										require 'pages/page-nsx.php';
										break;
									default:
										require 'pages/page-khong-ton-tai.php';
								}
								break;
							case 'loai':
								switch ( $idloai ) {
									case in_array($idloai, $ds_idloai):
										require 'pages/page-loai-sp.php';
										break;
									default:
										require 'pages/page-khong-ton-tai.php';
								}
								break;
							case 'gio-hang':
								require 'pages/page-gio-hang.php';
								break;
							case 'lich-su-mua':
								require 'pages/page-lich-su-mua.php';
								break;
							case 'tim-kiem':
								require 'pages/page-ket-qua-tim-kiem.php';
								break;
							
							default:
								require 'pages/page-trang-chinh.php';
								break;
						}
					?>
					
				</div><!-- /pages nội dung-->
				
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<?php require 'blocks/footer/footer-top.php'; ?>
		</div>
		
		<div class="footer-widget">
			<?php require 'blocks/footer/footer-widget.php'; ?>
		</div>
		
		<div class="footer-bottom">
			<?php require 'blocks/footer/footer-bottom.php'; ?>
		</div>
		
	</footer><!--/Footer-->
	

    <script src="public/js/jquery.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/jquery.scrollUp.min.js"></script>
	<script src="public/js/price-range.js"></script>
    <script src="public/js/jquery.prettyPhoto.js"></script>
    <script src="public/js/main.js"></script>
    
</body>
</html>