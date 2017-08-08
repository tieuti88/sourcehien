<h3><a href="index.php?com=tours&act=add_photo">Thêm hình ảnh</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">ID</th>
        <th style="width:20%;">Tên</th>
		<th style="width:25%;">Hình ảnh</th>
        <th style="width:25%;">Tours</th>		
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['id']?></td>
		<td style="width:20%;">
        
        <?=
		$items[$i]['tenhinh']
		?>
        </td>
        <td style="width:25%;">
       <img src="<?=_upload_tours.$items[$i]['urlhinh']?>" width="100" height="100" />
        </td>
        <td style="width:25%;">
        <?php
		$sql_danhmuc="select tieude from table_tours where id='".$items[$i]['id_tours']."'";
		$result=mysql_query($sql_danhmuc);
	 	$item_danhmuc =mysql_fetch_array($result);
	 	echo @$item_danhmuc['tieude']
		?>
        </td>	
		<td style="width:6%;"><a href="index.php?com=tours&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_tours']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=tours&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=tours&act=add_photo&idc=<?=$_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>