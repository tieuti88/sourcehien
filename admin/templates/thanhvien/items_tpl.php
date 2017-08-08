<script language="javascript">
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
	if (hoi==true) document.location = "index.php?com=thanhvien&act=delete&listid=" + listid;
});
});
</script>
<h3>Thành viên</h3>

<table class="blue_table">
	<tr>
    	<th style="width:3%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th>Stt</th>
		<th>Tên tài khoản</th>
		<th>Email</th>
        <th>Ngày đăng ký</th>
		<th>Hiển thị</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:3%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
		<td style="width:38%;"><a href="index.php?com=thanhvien&act=edit&id=<?=$items[$i]['id']?>"><?=$items[$i]['ten']?></a></td>
		<td style="width:38%;"><a href="index.php?com=thanhvien&act=edit&id=<?=$items[$i]['id']?>"><?=$items[$i]['email']?></a></td>
		<td style="width:8%;"><?=date('d/m/Y',$items[$i]['ngaytao'])?></td>	
        <td style="width:6%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=thanhvien&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=thanhvien&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>
        
		<td style="width:6%;"><a href="index.php?com=thanhvien&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=thanhvien&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>