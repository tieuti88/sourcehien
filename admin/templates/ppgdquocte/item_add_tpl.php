<h3>Phương pháo giáo dục quốc tế</h3>
<form name="frm" method="post" action="index.php?com=ppgdquocte&act=save" enctype="multipart/form-data" class="nhaplieu">
     <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_tintuc.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_news_type?><br /><br />
	<b>Tiêu đề</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />
	<b>Mô tả</b>
	
    
    <div>
    
    <textarea name="mota" cols="50" rows="5" id="mota"><?=@$item['mota']?></textarea>
    
    
  </div>
	
    <b>Nội dung</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('noidung') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 400;
	$oFCKeditor->Value		= $item['noidung'];
	$oFCKeditor->Create() ;
	?></div>
    	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=ppgdquocte&act=capnhat'" class="btn" />
</form>