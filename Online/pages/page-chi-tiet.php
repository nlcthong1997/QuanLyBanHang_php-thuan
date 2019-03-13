<?php 
	if(!isset($_GET['idSP']) || $_GET['idSP']==''){
?>
<div>
	<center>
		<img src="public/images/404/page-not-found.jpg" alt="">
	</center>
</div>
<?php
	} else {
		$idsp = $_GET['idSP'];

		$luotxem_sql = "UPDATE sanpham SET LuotXem = LuotXem + 1 WHERE MaSP = $idsp";
		load($luotxem_sql);
		
		$sql = "SELECT * FROM sanpham WHERE	MaSP=$idsp";
		$rs = load($sql);
?>
<div class="product-details"><!--product-details-->
	<?php  
		if($rs->num_rows > 0):
				while ($row = $rs->fetch_assoc()) :
	?>
	<div class="col-sm-5">
		<div class="view-product">
			<img src="public/images/SanPham/<?= $row['MaSP']?>/big.jpg" width='266' height="381" alt=""/>
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
			<h2><?= $row['TenSP']?></h2>
			<p>
				<?= $row['ChiTiet']?>
			</p>
			<span>
				<span><?= number_format($row['Gia'])?> VND</span>
			</span>
			<img src="images/product-details/rating.png" alt="" />
			<span>
				<!-- <span>US $59,000,000</span> -->
				<label>Số lượng:</label>
				<div>
					<input type="text" class="SoLuong-Them" onkeypress="return keypress(event)" />
					<input type="hidden" class="MaSP-Them" value="<?= $row["MaSP"] ?>">
					<button type="button" class="btn btn-fefault cart btn-themgio">
						<i class="fa fa-shopping-cart"></i>
						Thêm vào giỏ
					</button>
					<div class="hien-an"></div>
				</div>
			</span>
			<?php
				$MaNSX = $row['MaNSX']; 
				$sql_1 = "SELECT * FROM nsx WHERE MaNSX=$MaNSX";
				$rs_1 = load($sql_1);
				if($rs_1->num_rows > 0):
					while ($row_1 = $rs_1->fetch_assoc()) :
			?>

			<p><b>Nhà sản xuất:</b> <?= $row_1['TenNSX'] ?></p>
			
			<?php  
					endwhile;
				endif;
			?>
			<p><b>Còn lại:</b> <?= $row['SoLuong']?></p>
			<p><b>Lượt xem:</b> <?= $row['LuotXem']?></p>
			<a href=""><img src="public/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
	<?php  
			endwhile;
		endif;
	?>
</div><!--/product-details-->


<?php 
	$sql_count = "SELECT COUNT(*) AS SL FROM sanpham";
	$rs_count = load($sql_count);
	$row_count = $rs_count->fetch_assoc();
	$SL = $row_count['SL'];
	$min = 0;
	$max = $SL - 9;
	$vtri_start = rand($min, $max);
	$limit = 9;

	$sql_2 = "SELECT * FROM sanpham LIMIT $vtri_start, $limit";
	$rs_2 = load($sql_2);

	$ds_sp = array();
	if($rs_2->num_rows > 0){
		while($row_2 = $rs_2->fetch_assoc()){
			$ds_sp[] = $row_2;
		}
	}

?>
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">SẢN PHẨM KHÁC</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
			<?php for($i=0; $i <= 2; $i++): ?>	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="index.php?Page=chi-tiet&idSP=<?php echo $ds_sp[$i]["MaSP"] ?>">
									<img src="public/images/SanPham/<?php echo $ds_sp[$i]['MaSP'] ?>/big.jpg" alt="" />
								</a>
								<h2><?php echo number_format($ds_sp[$i]['Gia']) ?></h2>
								<p><?php echo $ds_sp[$i]['TenSP'] ?></p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
			</div>

			<?php for($i=0; $i <= 3; $i = $i+3): ?>
			<div class="item">	
				<?php for($j=$i+3; $j <= $i+5; $j++): ?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="index.php?Page=chi-tiet&idSP=<?php echo $ds_sp[$j]["MaSP"] ?>">
									<img src="public/images/SanPham/<?php echo $ds_sp[$j]['MaSP'] ?>/big.jpg" alt="" />
								</a>
								<h2><?php echo number_format($ds_sp[$j]['Gia']) ?></h2>
								<p><?php echo $ds_sp[$j]['TenSP'] ?></p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
<?php 
	}
?>
