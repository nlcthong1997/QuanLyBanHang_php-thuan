<?php
	if(!isset($_SESSION['dang_nhap'])){
		// nếu 0: chưa đăng nhập.
		// nếu 1: đã đăng nhập.
		$_SESSION['dang_nhap'] = 0;
	}
	if($_SESSION['dang_nhap'] == 0){
?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="login-form"><!--login form-->
			<h2>Đăng nhập 
				<?php  
					if(isset($_SESSION['thong_bao_dang_nhap']) && $_SESSION['thong_bao_dang_nhap'] == 'False'){
						echo "<b class=\"dang-nhap-that-bai\"> Thất bại</b>";
						unset($_SESSION['thong_bao_dang_nhap']);
					}
				?>
			</h2>
			<form method="POST" action="pages/xu-ly/xu-ly-dang-nhap.inc.php">
				<input type="text" name="TaiKhoan" required="required" placeholder="Tài khoản" />
				<input type="password" name="MatKhau" required="required" placeholder="Mật khẩu" />
				<span>
					<input type="checkbox" name="NhoMatKhau" value="yes" class="checkbox"> 
					Nhớ mật khẩu.
				</span>
				<button type="submit" class="btn btn-default" name="btnDangNhap">Đăng nhập</button>
			</form>
			<br>
			<a href="index.php?Page=dang-ky" class="active">Đăng ký nếu chưa có tài khoản.</a>
		</div><!--/login form-->
	</div>
</div>
<?php
	} else {
?>
	<div>
		<center>
			<h4>Bạn đã đăng nhập</h4>
		</center>
	</div>
<?php 
	}
?>