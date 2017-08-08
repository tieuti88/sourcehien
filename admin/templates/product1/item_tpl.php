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
	if (hoi==true) document.location = "index.php?com=product1&act=delete&listid=" + listid;
});
});
</script>
<h3><a href="index.php?com=product1&act=add">Thêm danh mục cấp 1</a></h3>

<table class="blue_table">
	<tr>
    	<th style="width:3%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:3%;">Stt</th>		       
        <th style="width:20%;">Tên</th>
       
        <th style="width:5%;">Hiển thị</th>
		<th style="width:3%;">Sửa</th>
		<th style="width:3%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:3%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
		<td style="width:3%;"><?=$items[$i]['stt']?></td>		
        <td style="width:20%;" align="center"><a href="index.php?com=product1&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none; font-weight:bold;"><?=$items[$i]['ten_vi']?></a></td>            
    	
		
        <td style="width:6%;">
		<?php
		 if(@$items[$i]['hienthi']==1)
		 {
		 ?>
         <a href="index.php?com=product1&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" /></a>
		 <? 
		 }
		 else
		 {
		 ?>
          <a href="index.php?com=product1&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png" /></a>
          <?php
		  }?>
         </td>
		<td style="width:3%;"><a href="index.php?com=product1&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" / border="0"></a></td>
		<td style="width:3%;"><a href="index.php?com=product1&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product1&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>