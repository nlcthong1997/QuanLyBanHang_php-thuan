/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

// chỉ cho nhập số.
function keypress(e){
	var keypressed = null;
	if (window.event){
  		keypressed = window.event.keyCode;
	}
	else{
  		keypressed = e.which;
	}

	if ((keypressed < 48 || keypressed > 57) && keypressed!=190){
		if (keypressed == 8 || keypressed == 127){
		   	return;
  		}
  		return false;
	}
}


//------------thông báo kiểm tra. Chỉnh sửa thông tin cá nhân
$('#btn-chinh-sua-thong-tin').on('click', function(){
	var ten_kh = $('#TenKH-chinhsua').val();
	var email = $('#email-chinhsua').val();
	var dienthoai = $('#dienthoai-chinhsua').val();
	var matkhau = $('#matkhau-chinhsua').val();
	var xacnhanmatkhau = $('#xacnhanmatkhau-chinhsua').val();
	var diachi = $('#diachi-chinhsua').val();
	var maKH = $('#maKH-chinhsua').val();

	data = {
		ten_kh: ten_kh,
		email: email,
		dienthoai: dienthoai,
		matkhau: matkhau,
		xacnhanmatkhau: xacnhanmatkhau,
		diachi: diachi,
		maKH: maKH
	};

	if(ten_kh.length == 0 && email.length == 0 && dienthoai.length == 0 && matkhau.length == 0 && 
		xacnhanmatkhau.length == 0 && diachi.length == 0){
		$('#ketquachinhsua').html('<span style="color: orange">Hãy nhập thông tin cần chỉnh sữa.</span>');
	}else{
		$.post("pages/xu-ly/ajax-kiem-tra-chinh-sua-thong-tin.php", data, function(data){
			setTimeout(function(){
				$('#ketquachinhsua').html(data);
				setTimeout(function(){
					window.location.reload();
				}, 500)
			}, 10)
		});
	}
	
});

//------------thông báo kiểm tra tài khoản đăng ký
$('#taikhoanDK').blur(function(){
	var tk = $(this).val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {kttk: tk}, function(data){
		$('#kt-tk').html(data);
	});
});

$('#matkhauDK').blur(function(){
	var mk = $(this).val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {ktmk: mk}, function(data){
		$('#kt-mk').html(data);
	});
});

$('#xacnhanmatkhauDK').blur(function(){
	var xnmk = $(this).val();
	var mk = $('#matkhauDK').val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {ktxnmk: xnmk, ktmk1: mk}, function(data){
		$('#kt-xnmk').html(data);
	});
});

$('#emailDK').blur(function(){
	var email = $(this).val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {ktemail: email}, function(data){
		$('#kt-email').html(data);
	});
});

$('#diachiDK').blur(function(){
	var diachi = $(this).val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {ktdc: diachi}, function(data){
		$('#kt-dc').html(data);
	});
});

$('#dienthoaiDK').blur(function(){
	var dienthoai = $(this).val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {ktdt: dienthoai}, function(data){
		$('#kt-dt').html(data);
	});
});

$('#tenKHDK').blur(function(){
	var tenkh = $(this).val();
	$.post("pages/xu-ly/ajax-kiem-tra-tk-dang-ky.php", {ktten: tenkh}, function(data){
		$('#kt-tenkh').html(data);
	});
});

//---------Thông báo khi thêm vào giỏ hàng.
$('.btn-themgio').on('click', function(){

	var pos = $(this).parent();
	var soluong = pos.find('.SoLuong-Them').val();
	if(soluong == 0 ){
		soluong = 1;
	}
	var masp = pos.find('.MaSP-Them').val();
	$.post("pages/xu-ly/ajax-xu-ly-them-vao-gio-hang.php", {sl: soluong, msp: masp}, function(){
		setTimeout(function(){
			pos.find('.hien-an').html('<b>Đã thêm</b>').css('color', 'green');
			setTimeout(function(){
				pos.find('.hien-an').html('');
			}, 350);
		}, 10);
	});
});

//--------Cập nhật số lượng sản phẩm trong giỏ hàng
$('.btn-capnhat-gio').on('click', function(){

	var pos = $(this).closest('tr');
	var masp = pos.find('.ma-sp-gio').val();
	var soluong = pos.find('.soluong-sp').val();
	if( soluong == 0){
		soluong = 1;
	}
	$.post("pages/xu-ly/ajax-cap-nhat-sl-sp-gio.php", {sl: soluong, msp: masp}, function(){
		setTimeout(function(){
			pos.find('.thongbao-sua').html('<b>Đã thay đổi</b>').css('color', 'green');
			setTimeout(function(){
				pos.find('.thongbao-sua').html('');
				window.location.reload();
			}, 500)
		}, 10);

	});
});
//--------Xóa sản phẩm trong giỏ
$('.btn-xoa-sp-gio').on('click', function(){

	var pos = $(this).closest('tr');
	var masp = pos.find('.ma-sp-gio').val();
	$.post("pages/xu-ly/ajax-xoa-sp-gio.php", {msp: masp}, function(){
		window.location.reload();
	});
});

//------------Thanh toán giỏ hàng.
$('.btn-thanhtoan').on('click', function(){

	var pos = $(this).closest('tr');
	var makh = pos.find('#MaKH').val();
	var tongtien = pos.find('#tongtien').val();
	$.post("pages/xu-ly/ajax-thanh-toan.php", {mkh: makh, tong: tongtien}, function(data){
		if(data == 1){
			setTimeout(function(){
				$('#thong-bao-thanh-toan').html('Thanh toán thành công.').css("color","green");
				setTimeout(function(){
					window.location.reload();
				}, 1500);
			}, 10);
		}
	});
});

//--------------Xử lý tìm kiếm
$('#thanh-tim-kiem').keypress(function(e){
	var keycode = (e.keyCode ? e.keyCode : e.which);
	var val = $('#thanh-tim-kiem').val();
	if(keycode == 13){
		window.location="index.php?Page=tim-kiem&id="+val;
	}
});