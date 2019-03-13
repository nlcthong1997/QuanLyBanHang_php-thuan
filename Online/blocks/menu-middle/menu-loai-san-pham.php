<?php 
	$sql = "SELECT * FROM danhmuc";
	$rs = load($sql);
	$row = $rs->fetch_assoc();
?>
<h2>Loại Sản Phẩm</h2>
<div class="panel-group category-products" id="accordian"><!--menu-loai-san-pham-->
		<!-- xử lý THEO LOẠI-->
	<?php 
		if ($rs->num_rows > 0) :
			while ($row = $rs->fetch_assoc()) :
	?>
        <div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="index.php?Page=loai&idloai=<?= $row["MaLoai"]?>"><span class="pull-right"> >> </span>MÁY ẢNH - <?= $row["TenLoai"] ?></a></h4>
			</div>
		</div>
	<?php
			endwhile;
		endif;
	?>
		<!--/xử lý THEO LOẠI -->
</div><!--/menu-loai-san-pham-->