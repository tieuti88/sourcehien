<h3><a href="index.php?com=thongtin&act=add_cat">Thêm danh mục cấp 1</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>
		<th style="width:80%;">Tên</th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td style="width:80%;"><a href="index.php?com=thongtin&act=edit_cat&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['ten']?> </a></td>
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=thongtin&act=man_cat&hienthi=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>"><img src="media/images/active_1.png" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=thongtin&act=man_cat&hienthi=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>"><img src="media/images/active_0.png" /></a>
         <?php
		 }?>
        
        </td>
		<td style="width:5%;"><a href="index.php?com=thongtin&act=edit_cat&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=thongtin&act=delete_cat&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=thongtin&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>