

<h3>Bảng Giá</h3>

<form name="frm" method="post" action="index.php?com=banggia&act=save" enctype="multipart/form-data" class="nhaplieu">   
    <b>File hiện tại:</b><br> 
	<?php
	 if($item['photo']!=NULL)
	 {
	 ?>
    
		<iframe src="https://docs.google.com/gview?url=http://<?=$config_url?>/<?=_upload_file_l.$item['photo']?>&embedded=true" style="width:1000px; height:1000px;" frameborder="0"></iframe>

	 <?php 
	 } 
	 else 
	 {
	 echo "Chưa có file"; 
	 }
	 ?><br /><br />
	<b>File: </b> 
    <input type="file" name="file" /> <strong>Type:&nbsp;.pdf | .doc | .docx</strong><br />                
   	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=banggia&act=capnhat'" class="btn" />
</form>