<h3><?php if (@$_REQUEST['act']=='edit')
	{?>Sửa tours<?php }else { ?>Thêm tours<?php } ?> </h3>

<form name="frm" method="post" action="index.php?com=tours&act=save" enctype="multipart/form-data" class="nhaplieu">
	
   
<br />
   <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_tours.$item['urlhinh']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_news_type?><br /><br />
	<b>Tiêu đề</b> <input type="text" name="ten" value="<?=@$item['tieude']?>" class="input" /><br />
    <b>Thời gian</b> <input type="text" name="thoigian" value="<?=@$item['thoigian']?>" class="input" /><br />
    <b>Khởi hành</b> <input type="text" name="khoihanh" value="<?=@$item['khoihanh']?>" class="input" /><br />
    <b>Giá</b> <input type="text" name="gia" value="<?=@$item['gia']?>" class="input" /><br />
    <b>Phương tiện</b> <input type="text" name="phuongtien" value="<?=@$item['phuongtien']?>" class="input" /><br />
    <b>Điện thoại</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br />
    <b>Liên lạc ngoài giờ</b> <input type="text" name="llngoaigio" value="<?=@$item['dtngoaigio']?>" class="input" /><br />
	<b>Danh mục</b> <?=$list;?><br />
	
	
       
	
	<b>Chi tiết chương trình</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('chuongtrinh') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= @$item['chuongtrinh'];
	$oFCKeditor->Create() ;
	?></div>
    
    <b>Chi tiết giá</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('chitietgia') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= @$item['chitietgia'];
	$oFCKeditor->Create() ;
	?></div>
					
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tours&act=man'" class="btn" />
</form>