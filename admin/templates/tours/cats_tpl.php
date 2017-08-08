<h3><a href="index.php?com=tours&act=add_cat">Thêm danh mục</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">ID</th>
		<th style="width:76%;">Tiêu đề  </th>		
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['idloai']?></td>
		<td style="width:76%;"><a href="index.php?com=tours&act=edit_cat&id=<?=$items[$i]['idloai']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['tenloai']?> </a></td>		
		<td style="width:6%;"><a href="index.php?com=tours&act=edit_cat&id=<?=$items[$i]['idloai']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=tours&act=delete_cat&id=<?=$items[$i]['idloai']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=tours&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>