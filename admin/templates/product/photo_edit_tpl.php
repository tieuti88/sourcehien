<?php
	
	$sql="select ten_vi from table_product where id=".$_SESSION['id_product'];
	$result=mysql_query($sql);
	$product = mysql_fetch_array($result);
	$title = '<a href="index.php?com=product&act=man">'.$product['ten_vi'].'</a>';
	
	
?>
<h3><?=$title?></h3>

<form name="frm" method="post" action="index.php?com=product&act=save_photo&id=<?=$_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?=_upload_sanpham.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 1024px | Height: 910px </strong><br />
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_photo'" class="btn" />
</form>