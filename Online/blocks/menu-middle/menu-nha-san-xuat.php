<?php 
	$sql = "SELECT * FROM nsx";
	$rs = load($sql);
	$row = $rs->fetch_assoc();
?>
<h2>Nhà Sản Xuất</h2>
<div class="brands-name">
	<ul class="nav nav-pills nav-stacked">
		<!-- xử lý THEO NSX-->
	<?php 
		if ($rs->num_rows > 0) :
			while ($row = $rs->fetch_assoc()) :
	?>
		<li><a href="index.php?Page=nsx&idnsx=<?= $row['MaNSX']?>"> <span class="pull-right"> >> </span>NSX - <?= $row["TenNSX"] ?></a></li>
	<?php
			endwhile;
		endif;
	?>
		<!-- xử lý THEO NSX-->
	</ul>
</div>