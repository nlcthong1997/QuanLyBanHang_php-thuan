<?php  
	if(isset($_SESSION['dang_nhap']) && $_SESSION['dang_nhap'] == 1) {
?>
	<div>
		<center>
			<img src="public/images/404/page-not-found.jpg" alt="">
		</center>
	</div>
<?php  
	} else {	
?>
<div class="col-sm-8 col-sm-offset-3">
	<div class="signup-form"><!--sign up form-->
		<div class="col-md-12 col-sm-6">
			<h2>
				Đăng Ký Tài Khoản
				<?php 
					if(isset($_SESSION['thong_bao_dang_ky'])){
						if($_SESSION['thong_bao_dang_ky'] == 'False'){
							echo "<b class=\"dang-ky-that-bai\"> Thất bại</b>";
						}
						if($_SESSION['thong_bao_dang_ky'] == 'True'){
							echo "<b class=\"dang-ky-thanh-cong\"> Thành công</b>";
						}
						unset($_SESSION['thong_bao_dang_ky']);
					}
				?>
			</h2>
		</div>
		<form method="POST" action="pages/xu-ly/xu-ly-dang-ky.inc.php" name="dangky_form" class="contact-form row">
			
			<div class="col-md-8 col-sm-6">
				<input type="text" name="taikhoan" id="taikhoanDK" required="required" placeholder="Tài khoản ( <20 ký tự và có chữ.)"/>
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-tk"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<input type="password" name="matkhau" id="matkhauDK" required="required" placeholder="Mật khẩu."/>
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-mk"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<input type="password" name="xacnhanmatkhau" id="xacnhanmatkhauDK" required="required" placeholder="Nhập lại mật khẩu"/>	
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-xnmk"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<input type="email" name="email" id="emailDK" required="required" placeholder="Email.   @gmail.com | @yahoo.com"/>
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-email"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<input type="text" name="diachi" id="diachiDK" required="required" placeholder="Địa chỉ."/>
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-dc"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<input type="text" name="dienthoai" id="dienthoaiDK" required="required" placeholder="Di động" onkeypress="return keypress(event)" />
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-dt"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<input type="text" name="TenKH" id="tenKHDK" required="required" placeholder="Tên sử dụng. ( <100 ký tự và có chữ.)"/>	
			</div>
			<div class="col-md-4 col-sm-6">
				<span id="kt-tenkh"></span>
			</div>
			<div class="col-md-8 col-sm-6">
				<select name="ngay" id="ngay" class="col-md-3 col-sm-6">
					<?php for($ngay=1; $ngay <= 31; $ngay++) { ?>
					<option value="<?= $ngay ?>"> <?= $ngay ?> </option>
					<?php } ?>
				</select>
				<select name="thang" id="thang" class="col-md-4 col-md-offset-1 col-sm-6">
					<?php for($thang=1; $thang <= 12; $thang++) { ?>
					<option value="<?= $thang ?>">Tháng <?= $thang ?> </option>
					<?php } ?>
				</select>
				<select name="nam" id="nam" class="col-md-3 col-md-offset-1 col-sm-6">
					<?php for($nam=2018; $nam >= 1905; $nam--) { ?>
					<option value="<?= $nam ?>"> <?= $nam ?> </option>
					<?php } ?>
				</select>
				<br><br>
			</div>
			<div class="col-md-12 col-sm-6">
				<button type="submit" id="btnDK" class="btn btn-default" name="btnDangKy">Đăng ký</button>
			</div>
		</form>
		<br>
		<a href="index.php?Page=dang-nhap" class="active">Quay lại đăng nhập.</a>
	</div><!--/sign up form-->
</div>
<?php  
	}
?>