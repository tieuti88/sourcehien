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
	if (hoi==true) document.location = "index.php?com=product&act=delete_photo&listid=" + listid;
});
});
</script>
<?php
	
	$sql="select ten_vi from table_product where id=".$_SESSION['id_product'];
	$result=mysql_query($sql);
	$product = mysql_fetch_array($result);
	$title = '<a href="index.php?com=product&act=man">'.$product['ten_vi'].'</a>';
	
?>
<h3><?=$title?></h3>


<table class="blue_table">
	<tr>
    	<th style="width:3%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:6%;">Stt</th>	
		<th style="width:25%;">Photo</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:3%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>	
		<td style="width:6%;"><?=$items[$i]['stt']?></td>		
		<td style="width:25%;"><a href="index.php?com=product&act=edit_photo&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><img src="<?=_upload_sanpham.$items[$i]['thumb']?>" width="120px" /> </a></td>
		<td style="width:5%;">
		<?php if(@$items[$i]['hienthi']==1){?>
        
        <a href="index.php?com=product&act=man_photo&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product&act=man_photo&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>
		<td style="width:6%;"><a href="index.php?com=product&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=product&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>