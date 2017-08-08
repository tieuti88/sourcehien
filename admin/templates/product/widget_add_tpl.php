
<h3>Thêm danh mục</h3>
<?php
$result = mysql_query("SELECT * FROM table_product_widget");

$categoryData = array();
while ($row = mysql_fetch_array($result)) {
     $categoryData[$row['id_parents']][$row['id']] = $row['ten_vi'];
}
mysql_free_result($result);
?>
<form name="frm" method="post" action="index.php?com=product&act=save_widget" enctype="multipart/form-data" class="nhaplieu">	
	<b>Danh mục</b>
    	<select name="id_cat" id="id_cat">
        	<option value="0">Danh mục chính</option>
			<?=getcat($item['id'],$item['id_parents'],$categoryData,'0');?>
        </select><br/><br/>
        
    <?php if ($_REQUEST['act']=='edit_widget')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['photo']?>"  width="150" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png</strong><br />
    <br /><br />
        
    <b>Tiêu đề (VI)</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
    <b>Tiêu đề (EN)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />	
    <b>Tiêu đề (CN)</b> <input type="text" name="ten_cn" value="<?=@$item['ten_cn']?>" class="input" /><br />  
    <b>Giá bán</b> <input type="text" name="giaban" value="<?=$item['giaban']?>" class="input" /><br />
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_widget'" class="btn" />
</form>