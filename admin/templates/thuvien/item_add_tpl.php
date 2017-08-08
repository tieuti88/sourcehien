<h3>Sản phẩm</h3>
<?php
function get_main_cat()
	{
		$sql="select * from table_thuvien_item order by stt,id desc ";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_item" name="id_item" class="main_font" onchange="select_onchange()">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	?>
<form name="frm" method="post" action="index.php?com=thuvien&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
    <b>Danh mục:</b><?=get_main_cat()?><br /><br />
	<?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['photo']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" id="file" /> <strong>.jpg|.gif|.png</strong><br />
    <br />
      <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>File hiện tại:</b><a href="<?=_upload_file.$item['urlfile']?>" title="NO FILE">Download</a><br/>  <br />
	<?php }?>   
    <b>Upload file:</b> <input type="file" name="filett" /> <strong>.pdf|.doc|.docx</strong><br /><br />
    <b>Tiêu đề</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br />       
      <b>Mô tả</b>
    <div><textarea name="mota" cols="50" rows="5" id="mota"><?=@$item['mota']?></textarea></div>
           
   <b>Nội dung</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('noidung') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 400;
	$oFCKeditor->Value		= $item['noidung'];
	$oFCKeditor->Create() ;
	?></div>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuvien&act=man'" class="btn" />
</form>