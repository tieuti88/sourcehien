<h3><a href="index.php?com=lkweb&act=add">Thêm mới liên kết</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:20%;">Tên</th>
        <th style="width:30%;">Hình ảnh</th>
        <th style="width:20%;">Link</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
        <td style="width:20%;"><a href="index.php?com=lkweb&act=edit&id=<?=$items[$i]['id']?>"><?=$items[$i]['ten']?></a></td>
        <td style="width: 30px;"><a href="index.php?com=lkweb&act=edit&id=<?=$items[$i]['id']?>"><img src="<?=_upload_hinhanh.$items[$i]['photo']?>" width="40" height="40"></a></td>
		<td style="width:20%;">
		<a href="index.php?com=lkweb&act=edit&id=<?=$items[$i]['id']?>"><?=$items[$i]['link']?></a>
        </td>
		<td style="width:6%;">
		<?php if(@$items[$i]['hienthi'] ==1 ){?>
        	<a href="index.php?com=lkweb&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png" /></a>
		<? }else{?>
        	<a href="index.php?com=lkweb&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" /></a>
        <?php } ?>
        </td>
		<td style="width:6%;"><a href="index.php?com=lkweb&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=lkweb&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=lkweb&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>