<h3>Nội quy dành cho cha mẹ</h3>
<form name="frm" method="post" action="index.php?com=noiquy&act=save" enctype="multipart/form-data" class="nhaplieu">
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
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=noiquy&act=capnhat'" class="btn" />
</form>