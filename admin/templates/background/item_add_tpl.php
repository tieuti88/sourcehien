<h3> Cập nhật background</h3>

<form name="frm" method="post" action="index.php?com=background&act=save" enctype="multipart/form-data" class="nhaplieu">
<?php if ($_REQUEST['act']=='capnhat')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['photo']?>"  width="450" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 1366px | Height: auto</strong><br />
    <br />		
  <b>Color : </b><input type="text" name="color" value="<?=@$item['color']?>" style="width: 100px;" id="colorpickerField1"/><br>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=background&act=capnhat'" class="btn" />
</form>