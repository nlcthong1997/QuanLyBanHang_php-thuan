<?php 
	$sql = "SELECT * FROM danhmuc";
	$rs = load($sql);
	$row = $rs->fetch_assoc();

	$sql_1 = "SELECT * FROM nsx";
	$rs_1 = load($sql_1);
	$row_1 = $rs_1->fetch_assoc();	
 ?>
	<div class="container">		
		<div class="row">
			<div class="col-sm-9">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="mainmenu pull-left">
					<ul class="nav navbar-nav collapse navbar-collapse">
						<li><a href="index.php" class="active">Trang Chính</a></li>
						<li class="dropdown"><a href="#">Loại<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                            	<!-- xử lý THEO LOẠI-->
                        	<?php 
                        		if ($rs->num_rows > 0) :
									while ($row = $rs->fetch_assoc()) :
                        	?>
                                <li><a href="index.php?Page=loai&idloai=<?= $row["MaLoai"]?>"><?= $row["TenLoai"] ?></a></li>
							<?php
									endwhile;
								endif;
							?>
								<!--/xử lý THEO LOẠI -->
                            </ul>
                        </li> 
						<li class="dropdown"><a href="#">Nhà Sản Xuất<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                            	<!-- xử lý THEO NHÀ SẢN XUẤT-->
                        	<?php 
                        		if ($rs_1->num_rows > 0) :
									while ($row_1 = $rs_1->fetch_assoc()) :
                        	?>
                                <li><a href="index.php?Page=nsx&idnsx=<?= $row_1["MaNSX"]?>"><?= $row_1["TenNSX"] ?></a></li>
							<?php
									endwhile;
								endif;
							?>
								<!--/xử lý THEO NHÀ SẢN XUẤT -->
                            </ul>
                        </li> 
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="search_box pull-right">
					<input type="text" id="thanh-tim-kiem" placeholder="Tìm kiếm"/>
				</div>
			</div>
		</div>
	</div>