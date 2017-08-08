<h3>Liên kết website</h3>

<form name="frm" method="post" action="index.php?com=lkweb&act=save" enctype="multipart/form-data" class="nhaplieu">
	
    <?php if ($_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['photo']?>"  width="40" height="40" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 40px | Height: 40px</strong><br />
    <br />
    
	<b>Tên:</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /><br />
    
	<b>Link</b> <input type="text" name="link" value="<?=$item['link']?>" class="input" />
&nbsp;Dạng:&nbsp;http://www.tenmien.com

<br />

	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lkweb&act=man'" class="btn" />
</form>