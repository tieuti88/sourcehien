<?php
	
	$sql="select ten_vi from table_product where id=".$_SESSION['id_product'];
	$result=mysql_query($sql);
	$product = mysql_fetch_array($result);
	$title = '<a href="index.php?com=product&act=man">'.$product['ten_vi'].'</a>';
?>
<h3><?=$title?></h3>
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
	
	function get_main_team($id=0)
	{
		
		global $d;
		if($id){
		$sql="select id_size from table_product_team_size where id_color=$id";
		$d->query($sql);
		$team = $d->result_array();
		
		for($i=0;$i<count($team);$i++){
			$temp[$i]=$team[$i]['id_size'];	
		}
		}
		$d->reset();
		$sql="select ten_vi,id from table_product_size order by stt asc,id desc";
		$d->query($sql);
		$row = $d->result_array();
		
		$str='';
		for($i=0;$i<count($row);$i++)
		{
			if($temp){	
				if(in_array($row[$i]['id'],$temp)){ $check = 'checked="checked"';}else{$check='';}
			}
			$str.=' | <input name="team[]" type="checkbox" value="'.$row[$i]["id"].'" '.$check.' /> '.$row[$i]["ten_vi"];			
		}
		return $str;
	}
	
?>

<script language="javascript">			

	$(document).ready(function() {
		$("#all").click(function(){
			var status=this.checked;
			$("input[name='team[]']").each(function(){this.checked=status;})
		});
	});

</script>

<form name="frm" method="post" action="index.php?com=product&act=save_color" enctype="multipart/form-data" class="nhaplieu">	
	
    <b>Danh mục size:</b><input type="checkbox" id="all">All <?=get_main_team($item['id']);?><br /><br /><br />
    
    <?php if ($_REQUEST['act']=='edit_color')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['photo']?>" alt="NO PHOTO" width="30"/><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 30px | Height: 15px</strong><br />
    <br />
    
	<b>Tiêu đề (VI)</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
    <b>Tiêu đề (EN)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />
   
	
	
	
	
	
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_color'" class="btn" />
</form>