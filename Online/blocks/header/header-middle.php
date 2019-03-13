<!-- <div class="header-middle"> --><!--header-middle-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo pull-left">
					<a href="index.php"><img src="public/images/home/logo.png" alt="" /></a>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
					<ul class="nav navbar-nav">
					<?php 
						if($_SESSION['dang_nhap'] == 0){
					?>
						<li><a href="index.php?Page=dang-nhap"><i class="fa fa-user"></i> Thông tin cá nhân</a></li>
					<?php 
						} if($_SESSION['dang_nhap'] == 1){
					?>
						<li><a href="index.php?Page=thong-tin-ca-nhan"><i class="fa fa-user"></i> <?= $_SESSION['thong_tin_khach_hang']->TenKH ?></a></li>
					<?php  
						}
						if($_SESSION['dang_nhap'] == 1){
					?>
						<li><a href="index.php?Page=lich-su-mua"><i class="fa fa-list-alt"></i> Lịch sử mua</a></li>
					<?php } if($_SESSION['dang_nhap'] == 0){ ?>
						<li><a href="index.php?Page=dang-nhap"><i class="fa fa-list-alt"></i> Lịch sử mua</a></li>
					<?php } ?>		
						<li><a href="index.php?Page=gio-hang"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
					<?php
						if($_SESSION['dang_nhap'] == 0){
					?>
						<li><a href="index.php?Page=dang-nhap"><i class="fa fa-lock"></i> Đăng nhập</a></li>
					<?php
						} if($_SESSION['dang_nhap'] == 1){
					?>
						<li><a href="pages/xu-ly/xu-ly-dang-xuat.inc.php"><i class="fa fa-unlock"></i> Đăng xuất</a></li>
					<?php  
						}
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!-- </div> --><!--/header-middle-->
