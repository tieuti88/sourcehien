<h3><a href="index.php?com=news&act=add">Thêm tin tức</a></h3>

<table class="blue_table">

	<tr>
		<th width="5%" style="width:6%;">Stt</th>
        <th style="width:40%;">Tên</th>
        <th width="9%" style="width:6%;">Hiện trang chủ</th>
	  	<th width="9%" style="width:6%;">Hiển thị</th>
		<th width="9%" style="width:6%;">Sửa</th>
		<th width="9%" style="width:6%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;" align="center"><?=$items[$i]['stt']?></td>
		<td style="width:40%;" align="center"><a href="index.php?com=news&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>
        
        <td style="width:6%;">	
		<?php 
		if(@$items[$i]['tinmoi']==1)
		{
		?>
        <a href="index.php?com=news&act=man&tinmoi=<?=$items[$i]['id']?>"><img src="media/images/yes-km.gif"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=news&act=man&tinmoi=<?=$items[$i]['id']?>"><img src="media/images/no-km.gif" border="0" /></a>
         <?php
		 }?>        </td>
         
		<td style="width:6%;">	
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=news&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=news&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
		<td style="width:6%;" align="center"><a href="index.php?com=news&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:6%;"><a href="index.php?com=news&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=news&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>