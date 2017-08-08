<h3><a href="index.php?com=ketnoi&act=add_photo">Thêm hình ảnh</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>      
		<th style="width:20%;">Hình ảnh</th>
       
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		
        <td style="width:20%;">
       	<a href="index.php?com=ketnoi&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="<?=_upload_hinhanh.$items[$i]['photo']?>" height="50" /></a>
        </td> 
           		
		<td style="width:5%;"><a href="index.php?com=ketnoi&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=ketnoi&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=ketnoi&act=add_photo&idc=<?=$_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>