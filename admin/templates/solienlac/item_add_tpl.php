<h3>Sổ liên lạc</h3>
<form name="frm" method="post" action="index.php?com=solienlac&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">   	
     <b>Mã hs</b> <input type="text" name="maso" value="<?=$item['maso']?>" class="input" /><br /> 
    <b>Họ tên hs</b> <input type="text" name="hoten" value="<?=$item['hoten']?>" class="input" /><br />       
    <b>Lớp</b> <input type="text" name="lop" value="<?=$item['lop']?>" class="input" /><br />   
    <b>Họ tên cha</b> <input type="text" name="hotencha" value="<?=$item['hotencha']?>" class="input" /><br />
    <b>Họ tên mẹ</b> <input type="text" name="hotenme" value="<?=$item['hotenme']?>" class="input" /><br />       
   <b>Thông tin dinh dưỡng</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('thongtindinhduong') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= $item['thongtindinhduong'];
	$oFCKeditor->Create() ;
	?></div>
    <br />  
     <b>Thông tin giáo dục</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('thongtingiaoduc') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= $item['thongtingiaoduc'];
	$oFCKeditor->Create() ;
	?></div>
    <br />  
     <b>Thông tin nề nếp</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('thongtinnenep') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= $item['thongtinnenep'];
	$oFCKeditor->Create() ;
	?></div>
    <br />  
      <b>Đánh giá sự phát triển</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('danhgia') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= $item['danhgia'];
	$oFCKeditor->Create() ;
	?></div>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=solienlac&act=man'" class="btn" />
</form>