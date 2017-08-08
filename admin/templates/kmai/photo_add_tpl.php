<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=kmai&act=save_photo" enctype="multipart/form-data" class="nhaplieu">		
  <?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong> .jpg|.gif|.png - Width: 204px | Height: auto</strong><br />	 <br />
    <b>Liên kết </b> <input type="text" name="link<?=$i?>" value="" style="width:230px" />	<br /><br />	       	
    <b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br /><br />	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=kmai&act=man_photo'" class="btn" />
</form>