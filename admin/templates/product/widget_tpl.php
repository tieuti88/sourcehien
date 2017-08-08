<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if (hoi==true) document.location = "index.php?com=product&act=delete_widget&listid=" + listid;
});
});
</script>
<h3><a href="index.php?com=product&act=add_widget">Thêm danh mục</a>&nbsp;&nbsp;</h3>
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
        <th style="width:20%;">Tiêu đề</th>
        <th style="width:20%;">Hình ảnh</th>
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?=$items[$i]['stt']?></td>		      
		<td style="width:30%;"><a href="index.php?com=product&act=man_widget&id_parents=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi'].' ('.coutchild($items[$i]['id']).')'?> </a></td>
        
        <td style="width:20%;"><img src="<?=_upload_sanpham.$items[$i]['photo']?>" border="0" /></td>
         
      <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==0)
		{
		?>        
        <a href="index.php?com=product&act=man_widget&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_parents']!='') echo'&id_parents='. $_REQUEST['id_parents'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
        <a href="index.php?com=product&act=man_widget&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_parents']!='') echo'&id_parents='. $_REQUEST['id_parents'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png"  border="0"/></a>
         <?php
		 }?>        </td>
         
		<td style="width:5%;"><a href="index.php?com=product&act=edit_widget&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=product&act=delete_widget&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product&act=add_widget"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>