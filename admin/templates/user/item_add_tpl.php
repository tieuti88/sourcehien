<script language="javascript" src="media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.frm.username, "Chưa nhập tên đăng nhập.")){
		return false;
	}
	
	if(isEmpty(document.frm.oldpassword, "Chưa nhập mật khẩu.")){
		return false;
	}
	
	if(document.frm.oldpassword.value.length<5){
		alert("Mật khẩu phải nhiều hơn 4 ký tự.");
		document.frm.oldpassword.focus();
		return false;
	}
	
	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){
		alert('Email không hợp lệ.');
		document.frm.email.focus();
		return false;
	}
}
</script>
<h3>Hội viên</h3>

<form name="frm" method="post" action="index.php?com=user&act=save" enctype="multipart/form-data" class="nhaplieu" onSubmit="return js_submit();">

	<b>Tên đăng nhập</b> <input type="text" name="username" id="username" value="<?=$item['username']?>" class="input" /><span class="require">*</span><br />
	<b>Mật khẩu</b> <input type="password" name="password" id="password" value="" class="input" /><span class="require">*</span><br />
    <b>Họ tên</b> <input type="text" name="ten" id="ten" value="<?=$item['ten']?>" class="input" /><br />
	<b>Email</b> <input type="text" name="email" id="email" value="<?=$item['email']?>" class="input" /><br />
	<b>Điện thoại</b> <input type="text" name="dienthoai" value="<?=$item['dienthoai']?>" class="input" /><br />
	<b>Ngày sinh </b> <input type="text" name="ngaysinh" value="<?=$item['ngaysinh']?>" class="input" /><br />
	<b>Địa chỉ</b> <input type="text" name="diachi" id="diachi" value="<?=$item['diachi']?>" class="input" /><br />
	<!--
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	-->
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=user&act=man'" class="btn" />
</form>