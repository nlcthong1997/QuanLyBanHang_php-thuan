<?php
	$limit = 4;
	// sắp xếp ngày nhập giảm dần từ trên xuống và xuất ra với giới hạn
	$sql = "SELECT * FROM sanpham ORDER BY NgayNhap DESC LIMIT $limit";
	$rs = load($sql);
?>
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">SẢN PHẨM MỚI</h2>
	<?php 
		if ($rs->num_rows > 0):
			while ($row = $rs->fetch_assoc()):
	?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center khung-sp-nd">
					<a href="index.php?Page=chi-tiet&idSP=<?= $row["MaSP"] ?>">
						<img src="public/images/SanPham/<?= $row["MaSP"] ?>/small.jpg" alt="" />
					</a>
					<h2><?= number_format($row["Gia"]) ?> VND</h2>
					<p><?= $row["TenSP"] ?></p>
					<form class="form">
						<input type="hidden" class="MaSP-Them" value="<?= $row["MaSP"] ?>">
						<input type="hidden" class="SoLuong-Them" value="1">
						<div class="hien-an"></div>
						<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
					</form>
				</div>
				<img src="public/images/home/new.png" class="new" alt="" />
			</div>
			<div class="choose luotxem-soluong">
				<ul class="nav nav-pills nav-justified">
					<li><center>Lượt xem: <?= $row["LuotXem"] ?></center></li>
					<li><center>Còn: <?= $row["SoLuong"] ?> chiếc</center></li>
				</ul>
			</div>
		</div>
	</div>
	<?php 
			endwhile;
		endif;
	?>
</div><!--features_items-->

<?php
	$limit = 4;
	// sắp xếp số lượng bán giảm dần từ trên xuống và xuất ra với giới hạn
	$sql_1 = "SELECT * FROM sanpham ORDER BY SoLuongDaBan DESC LIMIT $limit";
	$rs_1 = load($sql_1);
?>					
<div class="features_items"><!--category-tab-->
	<h2 class="title text-center">BÁN CHẠY NHẤT</h2>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
		<?php 
			if ($rs_1->num_rows > 0):
				while ($row_1 = $rs_1->fetch_assoc()):
		?>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center trangchinh-images">
							<a href="index.php?Page=chi-tiet&idSP=<?= $row_1["MaSP"] ?>">
								<img src="public/images/SanPham/<?= $row_1["MaSP"] ?>/small.jpg" alt="" />
							</a>
							<h2><?= number_format($row_1["Gia"]) ?> VND</h2>
							<p style="height: 40px"><?= $row_1["TenSP"] ?> VND</p>
							<form>
								<input type="hidden" class="MaSP-Them" value="<?= $row_1["MaSP"] ?>">
								<input type="hidden" class="SoLuong-Them" value="1">
								<div class="hien-an"></div>
								<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
							</form>
						</div>
						<img src="public/images/home/sale.png" class="new" alt="" />
					</div>
					<div class="choose luotxem-soluong">
						<ul class="nav nav-pills nav-justified">
							<li><center>Lượt xem: <?= $row_1["LuotXem"] ?></center></li>
							<li><center>Còn: <?= $row_1["SoLuong"] ?></center></li>
						</ul>
					</div>
				</div>
			</div>
		<?php 
				endwhile;
			endif;
		?>
		</div>
	</div>
</div><!--/category-tab-->


<?php
	$limit = 9;
	// sắp xếp số lượt xem giảm dần từ trên xuống và xuất ra với giới hạn
	$sql_2 = "SELECT * FROM sanpham ORDER BY LuotXem DESC LIMIT $limit";
	$rs_2 = load($sql_2);

	$ds_sp = array();
	
	if ($rs_2->num_rows > 0) {
		while ($row_2 = $rs_2->fetch_assoc()){
			$ds_sp[] = $row_2;	
		}
	}
?>					
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">XEM NHIỀU NHẤT</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
			<?php for($i = 0; $i <= 2; $i++): ?>
				<!-- vòng loop active -->
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="index.php?Page=chi-tiet&idSP=<?php echo $ds_sp[$i]["MaSP"] ?>">
									<img src="public/images/SanPham/<?php echo $ds_sp[$i]["MaSP"] ?>/big.jpg" alt="" />
								</a>
								<h2><?php echo number_format($ds_sp[$i]['Gia']); ?> VND</h2>
								<p><?php echo $ds_sp[$i]['TenSP'] ?></p>
								<form class="form">
									<input type="hidden" class="MaSP-Them" value="<?php echo $ds_sp[$i]['MaSP'] ?>">
									<input type="hidden" class="SoLuong-Them" value="1">
									<div class="hien-an"></div>
									<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>	
			</div>

			<?php for($i = 0; $i <= 3; $i=$i+3 ): ?>
			<!-- lặp 2 lần class item -->
			<div class="item">
				<?php for($j=$i+3; $j <= $i+5; $j++): ?>
					<!-- tiếp nối chỉ số mảng ds_sp trên class active -->
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="index.php?Page=chi-tiet&idSP=<?php echo $ds_sp[$j]["MaSP"] ?>">
										<img src="public/images/SanPham/<?php echo $ds_sp[$j]["MaSP"] ?>/big.jpg" alt="" />
									</a>
									<h2><?php echo number_format($ds_sp[$j]['Gia']); ?> VND</h2>
									<p><?php echo $ds_sp[$j]['TenSP'] ?></p>
									<form class="form">
										<input type="hidden" class="MaSP-Them" value="<?php echo $ds_sp[$j]['MaSP'] ?>">
										<input type="hidden" class="SoLuong-Them" value="1">
										<div class="hien-an"></div>
										<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
									</form>
								</div>
								
							</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>
			<?php endfor; ?>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->