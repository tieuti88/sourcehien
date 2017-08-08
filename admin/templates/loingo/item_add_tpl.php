<h3>Thông tin lời ngỏ</h3>
<form name="frm" method="post" action="index.php?com=loingo&act=save" enctype="multipart/form-data" class="nhaplieu">
   
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['photo']?>"  width="120" alt="NO PHOTO" /><br />	
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <br />
    
    <b>Lời ngỏ</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('mota') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= $item['mota'];
	$oFCKeditor->Create() ;
	?></div>
    
    <b>Nội dung</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('noidung') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 500;
	$oFCKeditor->Value		= $item['noidung'];
	$oFCKeditor->Create() ;
	?></div>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=loingo&act=capnhat'" class="btn" />
</form>