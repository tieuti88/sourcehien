<h3><a href="index.php?com=catalogue&act=add_photo">Thêm hình ảnh</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">STT</th>
		<th style="width:25%;">Photo</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>		
		<td style="width:25%;"><a href="index.php?com=catalogue&act=edit_photo&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><img src="<?=_upload_hinhanh.$items[$i]['thumb']?>" width="120px" /> </a></td>
		<td style="width:5%;">
		<?php if(@$items[$i]['hienthi']==1){?>
        
        <a href="index.php?com=catalogue&act=man_photo&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=catalogue&act=man_photo&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>
		<td style="width:6%;"><a href="index.php?com=catalogue&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=catalogue&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=catalogue&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>