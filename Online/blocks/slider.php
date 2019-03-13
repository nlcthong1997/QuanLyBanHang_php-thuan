<?php  
	$sql_count = "SELECT COUNT(*) AS SL FROM sanpham";
	$rs_count = load($sql_count);
	$row_count = $rs_count->fetch_assoc();
	$SL = $row_count['SL'];
	$min = 0;
	$max = $SL - 3;
	$vtri_start = rand($min, $max);
	$limit = 3;
	// sắp xếp số lượng bán tăng và xuất ra với giới hạn (được mua ít nhất)
	$sql = "SELECT * FROM sanpham ORDER BY SoLuongDaBan ASC LIMIT $vtri_start, $limit";
	$rs = load($sql);

	$ds_sp = array();

	if ($rs->num_rows > 0) {
		while ($row = $rs->fetch_assoc()){
			$ds_sp[] = $row;	
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="slider-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#slider-carousel" data-slide-to="1"></li>
					<li data-target="#slider-carousel" data-slide-to="2"></li>
				</ol>
				
				<div class="carousel-inner">
					<div class="item active">
						<div class="col-sm-6">
							<h1><span>Giá</span> <?php echo number_format($ds_sp[0]['Gia']) ?> VND</h1>
							<h2><?php echo $ds_sp[0]['TenSP'] ?></h2>
							<p><?php echo $ds_sp[0]['DanhGia'] ?></p>
							<form>
								<input type="hidden" class="MaSP-Them" value="<?php echo $ds_sp[0]['MaSP'] ?>">
								<input type="hidden" class="SoLuong-Them" value="1">
								<div class="hien-an"></div>
								<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
							</form>
						</div>
						<div class="col-sm-6 slider-images">
							<a href="index.php?Page=chi-tiet&idSP=<?php echo $ds_sp[0]["MaSP"] ?>">
								<img src="public/images/SanPham/<?php echo $ds_sp[0]["MaSP"] ?>/big.jpg" class="girl img-responsive" alt=""/>
							</a>
						</div>
					</div>
					<?php for($i=1; $i<=2; $i++): ?>
					<div class="item">
						<div class="col-sm-6">
							<h1><span>Giá</span> <?php echo number_format($ds_sp[$i]['Gia']) ?> VND</h1>
							<h2><?php echo $ds_sp[$i]['TenSP'] ?></h2>
							<p><?php echo $ds_sp[$i]['DanhGia'] ?></p>
							<form>
								<input type="hidden" class="MaSP-Them" value="<?php echo $ds_sp[$i]['MaSP'] ?>">
								<input type="hidden" class="SoLuong-Them" value="1">
								<div class="hien-an"></div>
								<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
							</form>
						</div>
						<div class="col-sm-6 slider-images">
							<a href="index.php?Page=chi-tiet&idSP=<?php echo $ds_sp[$i]["MaSP"] ?>">
								<img src="public/images/SanPham/<?php echo $ds_sp[$i]["MaSP"] ?>/big.jpg" class="girl img-responsive" alt="" />
							</a>
						</div>
					</div>
					<?php endfor; ?>
					
				</div>
				
				<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
			
		</div>
	</div>
</div>