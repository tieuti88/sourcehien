<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=doitac&act=save_photo" enctype="multipart/form-data" class="nhaplieu">

<?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong>width:245px,Height:150px&nbsp;-&nbsp;.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png</strong><br />
    <br />
	<b>Link: </b> <input name="mota<?=$i?>" type="text" size="40"   /> <strong>Example: <span style="color: #F00">http://google.com.vn</span></strong>	
	<br />
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man_photo'" class="btn" />
</form>