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
	if (hoi==true) document.location = "index.php?com=product&act=delete_cat&listid=" + listid;
});
});
</script>

<h3><a href="index.php?com=product&act=add_cat">Thêm danh mục cấp 2</a>&nbsp;&nbsp;&nbsp;&nbsp;Danh mục cấp 1&nbsp;<?=get_main_category();?></h3>

<script language="javascript">
function select_onchange1()
	{
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=man_cat&id_cat="+b.value;	
		return true;
	}
</script>
<?php

function get_main_category()
	{
		$sql="select * from table_product_cat  order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange1()" class="main_font">
			 <option value="0">Chọn danh mục</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>


<table class="blue_table">
	<tr>
    	<th style="width:3%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:3%;">Stt</th>		
		<th style="width:15%;">Cấp 1</th>
        <th style="width:25%;">Tên</th>
       
		<th style="width:6%;">Hiển thị</th>
		<th style="width:3%;">Sửa</th>
		<th style="width:3%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:3%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
		<td style="width:3%;"><?=$items[$i]['stt']?></td>		
        <td style="width:25%;">		
		<?php
		$sql_danhmuc1="select ten_vi from table_product_cat where id='".$items[$i]['id_cat']."'";
		$result=mysql_query($sql_danhmuc1);
	 	$item_danhmuc1 =mysql_fetch_array($result);
	 	echo @$item_danhmuc1['ten_vi'];
		?>
        
        </td>
		<td style="width:25%;"><a href="index.php?com=product&act=edit_cat&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?> </a></td>
		<td style="width:6%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=product&act=man_cat&hienthi=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>"><img src="media/images/active_1.png" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product&act=man_cat&hienthi=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>"><img src="media/images/active_0.png" /></a>
         <?php
		 }?>
        
        </td>
		<td style="width:3%;"><a href="index.php?com=product&act=edit_cat&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:3%;"><a href="index.php?com=product&act=delete_cat&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>