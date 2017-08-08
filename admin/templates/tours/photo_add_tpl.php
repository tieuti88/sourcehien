<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=tours&act=save_photo" enctype="multipart/form-data" class="nhaplieu">

<b>Danh mục</b><?=$list_cat?><br /><br />
<?php for($i=0; $i<5; $i++){?>
	<b>Tên: </b> <input name="mota<?=$i?>" type="text" size="40"   />	
	<br /> 
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <?=_hinhanh_type?><br />
    <br />
	   
	
<? }?>
	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tours&act=man_photo'" class="btn" />
</form>