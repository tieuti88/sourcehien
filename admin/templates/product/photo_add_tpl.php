<?php
	
	$sql="select ten_vi from table_product where id=".$_SESSION['id_product'];
	$result=mysql_query($sql);
	$product = mysql_fetch_array($result);
	$title = '<a href="index.php?com=product&act=man">'.$product['ten_vi'].'</a>';
	
	
?>
<h3><?=$title?></h3>

<form name="frm" method="post" action="index.php?com=product&act=save_photo" enctype="multipart/form-data" class="nhaplieu">	
	<?php for($i=0; $i<7; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong> .jpg|.gif|.png - Width: 1024px | Height: 910px</strong><br />	 <br />	
    <b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />       	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br /><br />

	
<? }?>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_photo'" class="btn" />
</form>