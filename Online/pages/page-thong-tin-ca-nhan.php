<?php
	if(!isset($_SESSION['dang_nhap']) || $_SESSION['dang_nhap'] == 0){
?>
<div>
	<center>
		<img src="public/images/404/page-not-found.jpg" alt="">
	</center>
</div>
<?php		
	} else {
		if(isset($_SESSION['thong_tin_khach_hang'])){
			$info_kh = $_SESSION['thong_tin_khach_hang']->MaKH;
		}
		$sql = "SELECT * FROM khachhang WHERE MaKH=$info_kh";
		$rs = load($sql);
?>
<div class="row">  	
	<div class="col-sm-8">
		<div class="contact-form">
			<h2 class="title text-center">CHỈNH SỬA THÔNG TIN</h2>
			<center id="ketquachinhsua"></center>
			<div class="status alert alert-success" style="display: none"></div>
	    	<form id="main-contact-form" class="contact-form row" name="contact_form" method="post" action="">
	    		<input type="hidden" id="maKH-chinhsua" value="<?= $info_kh ?>">
	            <div class="form-group col-md-6">
	                <input type="text" name="TenKH" id="TenKH-chinhsua" class="form-control" required="required" placeholder="Tên">
	            </div>
	            <div class="form-group col-md-6">
	                <input type="email" name="email" id="email-chinhsua" class="form-control" required="required" placeholder="Email   @gmail.com | @yahoo.com">
	            </div>
	            <div class="form-group col-md-12">
	                <input type="text" name="dienthoai" id="dienthoai-chinhsua" class="form-control" required="required" placeholder="Di Động" onkeypress="return keypress(event)">
	            </div>
	            <div class="form-group col-md-6">
	                <input type="password" name="matkhau" id="matkhau-chinhsua" class="form-control" required="required" placeholder="Mật khẩu">
	            </div>
	            <div class="form-group col-md-6">
	                <input type="password" name="xacnhanmatkhau" id="xacnhanmatkhau-chinhsua" class="form-control" required="required" placeholder="Xác nhận mật khẩu">
	            </div>
	            <div class="form-group col-md-12">
	                <textarea name="diachi" id="diachi-chinhsua" required="required" class="form-control" rows="8" placeholder="Địa Chỉ"></textarea>
	            </div>                       
	            <div class="form-group col-md-12">
	                <input type="button" name="btn-chinh-sua-thong-tin" id="btn-chinh-sua-thong-tin" class="btn btn-primary pull-right" value="Chỉnh sửa">
	            </div>
	        </form>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="contact-info">
			<h2 class="title text-center">THÔNG TIN HIỆN TẠI</h2>
			<address>
				<?php  
					if ($rs->num_rows > 0):
						while ($row = $rs->fetch_assoc()):
				?>
				<p><?= $row['TenKH'] ?>.</p>
				<p>Ngày sinh: <?= $row['NgaySinh'] ?></p>
				<p><?= $row['DiaChi']?></p>
				<p>Di động: <?= $row['SDT']?></p>
				<p>Email: <?= $row['Email'] ?></p>
				<?php  
						endwhile;
					endif;
				?>
			</address>
			<div class="social-networks">
				<h2 class="title text-center">LIÊN KẾT MẠNG</h2>
				<ul>
					<li>
						<a href="#"><i class="fa fa-facebook"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-twitter"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-youtube"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>    			
</div>
<?php  
	}
?>