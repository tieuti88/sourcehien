<h3>Hình ảnh nội thất</h3>

<form name="frm" method="post" action="index.php?com=lienket&act=save_photo" enctype="multipart/form-data" class="nhaplieu">

<?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" />width:195px-height:94px<br />
    <b>Tên: </b> <input type="text" name="ten<?=$i?>" />	<br />
	<b>Link </b> <input type="text" name="url<?=$i?>" />	<br />
	<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lienket&act=man_photo'" class="btn" />
</form>