<?php  
	if(!isset($_GET['idloai']) || $_GET['idloai'] == ''){
?>
	<div>
		<center>
			<img src="public/images/404/page-not-found.jpg" alt="">
		</center>
	</div>
<?php
	} else {
		$idloai = $_GET['idloai'];
		
		$sql = "SELECT * FROM danhmuc WHERE MaLoai=$idloai";
		$rs = load($sql);
		$row = $rs->fetch_assoc();
		// ------------------------------------
		$current_page = isset($_GET['idpage']) ? $_GET['idpage'] : 1;
		$next_page = $current_page + 1;
		$prev_page = $current_page - 1;
		$limit = 8;

		$sql_total = "SELECT COUNT(*) AS total FROM sanpham WHERE MaLoai=$idloai";
		$rs_total = load($sql_total);
		$row_total = $rs_total->fetch_assoc();

		$total = $row_total['total'];
		$num_pages = ceil($total / $limit);

		if($current_page > $num_pages || $current_page < 1){
			$current_page = 1;
		}

		//ban đầu trong data là vị trí of = 0
		$of = ($current_page - 1) * $limit;
		// -------------------------------------
		$sql_sp = "SELECT * FROM sanpham WHERE MaLoai=$idloai LIMIT $of, $limit";
		$rs_sp = load($sql_sp);
?>
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">MÁY ẢNH <?= $row['TenLoai'] ?></h2>
		<?php  
			while($row_sp = $rs_sp->fetch_assoc()):
		?>
		<div class="col-sm-3">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center khung-sp-nd">
						<a href="index.php?Page=chi-tiet&idSP=<?= $row_sp['MaSP'] ?>">
							<img class="images-trang-chinh" src="public/images/SanPham/<?= $row_sp['MaSP'] ?>/small.jpg" alt="" />
						</a>
						<h2><?= number_format($row_sp['Gia']) ?> VND</h2>
						<p><?= $row_sp['TenSP'] ?></p>
						<form class="form">
							<input type="hidden" class="MaSP-Them" value="<?= $row_sp["MaSP"] ?>">
							<input type="hidden" class="SoLuong-Them" value="1">
							<div class="hien-an"></div>
							<input type="button" class="btn btn-default add-to-cart btn-themgio" value="Thêm vào giỏ">
						</form>
					</div>
				</div>
				<div class="choose luotxem-soluong">
					<ul class="nav nav-pills nav-justified">
						<li><center>Lượt xem: <?= $row_sp["LuotXem"] ?></center></li>
						<li><center>Còn: <?= $row_sp["SoLuong"] ?> chiếc</center></li>
					</ul>
				</div>
			</div>
		</div>
		<?php  
			endwhile;
		?>
	</div><!--features_items-->
	<div>
		<center>
		<ul class="pagination">
			<?php if($prev_page > 0): ?>
		  		<li><a href="index.php?Page=loai&idloai=<?= $idloai ?>&idpage=<?= $prev_page ?>"> < </a></li>
			<?php endif; ?>
		  	<?php for ($i=1; $i <= $num_pages; $i++) : ?>
			  	<li class="<?php if($i == $current_page) echo 'active'?>">
			  		<a href="index.php?Page=loai&idloai=<?= $idloai ?>&idpage=<?= $i ?>"> <?= $i ?></a>
			  	</li>
			<?php endfor; ?>
			<?php if($next_page <= $num_pages): ?>
		  		<li><a href="index.php?Page=loai&idloai=<?= $idloai ?>&idpage=<?= $next_page ?>"> > </a></li>
			<?php endif; ?>
		</ul>
		</center>
	</div>
<?php  
	}
?>