
<h3><a href="index.php?com=thongtin&act=add">Thêm bài viết</a> &nbsp;&nbsp;&nbsp;Danh mục cấp 1&nbsp;<?=get_main_item();?></h3>

<script language="javascript">	
	function select_onchange()
	{	
		var b=document.getElementById("id_item");
		window.location ="index.php?com=thongtin&act=man&id_item="+b.value;	
		return true;
	}

</script>

<?php function get_main_item()
	{
		$sql_huyen="select * from table_thongtin_item order by stt asc,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<table class="blue_table">

	<tr>
		<th width="5%" style="width:6%;">Stt</th>
        <th style="width:20%;">Cấp 1</th>
        <th style="width:40%;">Tên</th>
	  	<th width="9%" style="width:6%;">Hiển thị</th>
		<th width="9%" style="width:6%;">Sửa</th>
		<th width="9%" style="width:6%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;" align="center"><?=$items[$i]['stt']?></td>
        <td align="center" style="width:20%;"><?php
		$sql_danhmuc="select ten from table_thongtin_item where id='".$items[$i]['id_item']."'";
		$result=mysql_query($sql_danhmuc);
	 	$item_danhmuc =mysql_fetch_array($result);
	 	echo @$item_danhmuc['ten']
	?></td>
		<td style="width:40%;" align="center"><a href="index.php?com=thongtin&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>
  
		<td style="width:6%;">	
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=thongtin&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=thongtin&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
		<td style="width:6%;" align="center"><a href="index.php?com=thongtin&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:6%;"><a href="index.php?com=thongtin&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=thongtin&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>