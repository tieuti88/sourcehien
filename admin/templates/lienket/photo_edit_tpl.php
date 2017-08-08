<h3>Hình ảnh nội thất</h3>

<form name="frm" method="post" action="index.php?com=lienket&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
	
	<b>&nbsp;</b> <img src="<?=_upload_lienket.$item['image']?>" /><br />
	<b>Hình ảnh </b> <input type="file" name="file" />width:195px-height:94px<br />
    <b>Tên </b> <input type="text" name="ten" value="<?=$item['ten']?>" />	<br />
	<b>Link </b> <input type="text" name="url" value="<?=$item['url']?>" />	<br />
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lienket&act=man_photo'" class="btn" />
</form>