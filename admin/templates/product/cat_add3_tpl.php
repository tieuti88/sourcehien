<h3>Thêm danh mục cấp 3</h3>
<script language="javascript">
function select_onchange()
	{
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act'] == 'edit_cat3'){ echo 'edit_cat3';}else{ echo 'add_cat3';}?>&id_cat="+b.value+"&id=<?=$_REQUEST["id"]?>";	
		return true;
	}
		
</script>
<?php
function get_main_category()
	{
		$sql="select * from table_product_cat order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat"  class="main_font" onchange="select_onchange()">
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

function get_main_item()
	{
		$sql="select * from table_product_item  where id_cat='".$_REQUEST["id_cat"]."' order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_item" name="id_item"  class="main_font">
			 <option value="0">Chọn danh mục</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}	
	
?>


<form name="frm" method="post" action="index.php?com=product&act=save_cat3" enctype="multipart/form-data" class="nhaplieu">	
	<b>Danh mục cấp 1:</b><?=get_main_category();?><br /><br />
    <b>Danh mục cấp 2:</b><?=get_main_item();?><br /><br />
	<table style="width:100%" border="0">
    	<tr>
        	<td align="left">
            	<b>Tiêu đề (VI)</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br /><br />
                <b>Title (VI)</b> <input type="text" name="title_vi" value="<?=$item['title_vi']?>" class="input" /><br />
                <b>Keywords (VI)</b>
                
                 <textarea name="keywords_vi" id="keywords_vi" cols="40" rows="7" class="input"><?=$item['keywords_vi']?></textarea>
                <br />
                
                <b>Description (VI)</b>
                
                 <textarea name="description_vi" id="description_vi" cols="40" rows="7" class="input"><?=$item['description_vi']?></textarea>
                <br />
                
            </td>
            <td>
            	<b>Tiêu đề (EN)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br /><br />
                <b>Title (EN)</b> <input type="text" name="title_en" value="<?=$item['title_en']?>" class="input" /><br />
                <b>Keywords (EN)</b>
                
                 <textarea name="keywords_en" id="keywords_en" cols="40" rows="7" class="input"><?=$item['keywords_en']?></textarea>
                <br />
                
                <b>Description (EN)</b>
               
                 <textarea name="description_en" id="description_en" cols="40" rows="7" class="input"><?=$item['description_en']?></textarea>
                <br />
                
            </td>
        </tr>
    </table>
	<br /><br />
    
    
	
	
	
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_cat3'" class="btn" />
</form>