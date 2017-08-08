<h3>Thêm danh mục Room</h3>
<?php
function get_main_category()
	{
		$sql="select * from table_product_cat order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat"  class="main_font">
			 <option value="0">Chọn danh mục</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>


<form name="frm" method="post" action="index.php?com=product&act=save_room" enctype="multipart/form-data" class="nhaplieu">	
    
    <?php if ($_REQUEST['act']=='edit_room')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['photo']?>"  width="130" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: Auto | Height: Auto</strong><br />
    <br />
    
	<b>Tiêu đề (VI)</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
    <b>Tiêu đề (EN)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />
    <b>Tiêu đề (CN)</b> <input type="text" name="ten_cn" value="<?=@$item['ten_cn']?>" class="input" /><br />
	
	<b>Title</b> <input type="text" name="title_vi" value="<?=$item['title_vi']?>" class="input" style="width:500px" /><br /><br />
	<b>Description</b>
	<div>
	 <textarea name="description_vi" id="description_vi" cols="50" rows="5"><?=$item['description_vi']?></textarea></div>
    <br />
	<b>Keywords</b>
	<div>
	 <textarea name="keywords_vi" id="keywords_vi" cols="50" rows="5"><?=$item['keywords_vi']?></textarea></div>
    <br />
	
	
	
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_room'" class="btn" />
</form>