<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Giỏ hàng của bạn</h2>
<div class="col-md-10 col-md-offset-1">
	<table class="table" border="1">
		<thead>
			<tr>
				<th>Tên Sản Phẩm</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng tiền</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($_SESSION['gio_hang'])) {
					$TongTien = 0;
					foreach ($_SESSION['gio_hang'] as $masp => $sl):
						$sql = "SELECT * FROM sanpham WHERE MaSP = $masp";
						$rs = load($sql);
						$row = $rs->fetch_assoc();
						$Tongtien_1_sp = $sl * $row["Gia"];
						$TongTien += $Tongtien_1_sp;
			?>
			<tr>
				<td><?= $row['TenSP'] ?></td>
				<td><?= number_format($row['Gia']) ?></td>
				<td>
					<div class="col-md-6">
						<input style="width: 60%" type="text" class="soluong-sp" onkeypress="return keypress(event)" value="<?= $sl ?>">
					</div>
					<input type="hidden" class="ma-sp-gio" value="<?= $row['MaSP'] ?>">
					<input type="button" class="btn btn-default add-to-cart btn-capnhat-gio" value="Thay đổi">
					<div class="thongbao-sua"></div>
				</td>
				<td><?= number_format($Tongtien_1_sp) ?></td>
				<td>
					<input type="button" class="btn btn-default add-to-cart btn-xoa-sp-gio" value="Xóa">
				</td>
			</tr>
			<?php  
					endforeach;
			?>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th><?= number_format($TongTien) ?></th>
				<th></th>
			</tr>
			<?php 
				} 
				if(!empty($_SESSION['gio_hang'])){
			?>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				
				<?php if(isset($_SESSION['dang_nhap']) && $_SESSION['dang_nhap'] == 1){ ?>
					<th>
						<input type="hidden" id="tongtien" value="<?= $TongTien ?>">
						<input type="hidden" id="MaKH" value="<?= $_SESSION['thong_tin_khach_hang']->MaKH ?>">
						<input type="button" class="btn btn-default add-to-cart btn-thanhtoan" value="Thanh Toán">
					</th>
				<?php } else {?>
					<th>
						<a href="index.php?Page=dang-nhap">
							<input type="button" class="btn btn-default add-to-cart" value="Thanh Toán">
						</a>
					</th>
				<?php } ?>

				<th></th>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<center>
		<h3 id="thong-bao-thanh-toan"></h3>
	</center>
</div>
</div>