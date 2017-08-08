<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=tours&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>Danh mục</b><?=$list_cat?><br /><br />
    
	<b>Tên: </b> <input name="mota" value="<?=$item['tenhinh']?>" type="text" size="40"   />	
	<br /><br />
     <b>Hình hiện tại:</b>   <img src="<?=_upload_tours.$item['urlhinh']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <?=_hinhanh_type?><br />
	
    
    
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tours&act=man_photo'" class="btn" />
</form>