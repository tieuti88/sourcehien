<h3>Catalogue</h3>

<form name="frm" method="post" action="index.php?com=catalogue&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
	<?php if ($_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 1024px | Height: 1024px</strong><br />
    <br />
    <b>Tiêu đề</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br />
  
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=catalogue&act=man'" class="btn" />
</form>