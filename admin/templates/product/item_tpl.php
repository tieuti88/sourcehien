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
	if (hoi==true) document.location = "index.php?com=product&act=delete&listid=" + listid;
});
});
</script>

<h3><a href="index.php?com=product&act=add">Thêm dịch vụ</a></h3>
<script language="javascript">	
	function select_onchange()
	{	
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=man&id_cat="+b.value;	
		return true;
	}
	
	function select_onchange1()
	{	
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		window.location ="index.php?com=product&act=man&id_cat="+b.value+"&id_item="+c.value;	
		return true;
	}
	
	function select_onchange2()
	{	
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		var d=document.getElementById("id_cat1");
		window.location ="index.php?com=product&act=man&id_cat="+b.value+"&id_item="+c.value+"&id_cat1="+d.value;	
		return true;
	}

</script>
<?php
function get_main_category()
	{
		$sql="select * from table_product_cat order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
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
	
	
	function get_main_item()
	{
		$sql_huyen="select * from table_product_item where id_cat=".$_REQUEST['id_cat']." order by stt desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_cat1()
	{
		$sql_huyen="select * from table_product_cat1 where id_item=".$_REQUEST['id_item']." order by stt asc,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat1" name="id_cat1" onchange="select_onchange2()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat1"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_team($id=0)
	{
		
		global $d;
		if($id){
		$sql="select id_cat1 from table_product_team where id_product=$id";
		$d->query($sql);
		$team = $d->result_array();
		
		for($i=0;$i<count($team);$i++){
			$temp[$i]=$team[$i]['id_cat1'];	
		}
		}
		$d->reset();
		$sql="select ten_vi,id from table_product_cat1 order by stt asc,id desc";
		$d->query($sql);
		$row = $d->result_array();
		
		$str='';
		for($i=0;$i<count($row);$i++)
		{
			if($temp){	
				if(in_array($row[$i]['id'],$temp)){
					$str.=$row[$i]["ten_vi"].' | ';
				}
			}
						
		}
		return $str;
	}
	
?>
<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">
  <table class="blue_table">
    <tr>
      <th style="width:3%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>	
      <th style="width:3%;">Stt</th>
      <th style="width:20%;">Tên dịch vụ</th>
	  <th style="width:5%;">Hình ảnh</th>
      <th style="width:5%;">Hiển thị</th>
      <th style="width:3%;">Sửa</th>
      <th style="width:3%;">Xóa</th>
      
    </tr>
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
    <tr>
    	<td style="width:3%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>	
      <td style="width:3%;"><?=$items[$i]['stt']?></td>

      <td align="center" style="width:20%;"><a href="index.php?com=product&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id_cat1=<?=$items[$i]['id_cat1']?>&id_color=<?=$items[$i]['id_color']?>&id_type=<?=$items[$i]['id_type']?>&id_room=<?=$items[$i]['id_room']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
        <?=$items[$i]['ten_vi']?>
        </a></td>
		
		
		<td align="center" style="width:5%;"><a href="index.php?com=product&act=man_photo&id_product=<?=$items[$i]['id']?>">Thêm</a></td>
       
      <td style="width:5%;"><?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=product&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['id_cat1']!='') echo'&id_cat1='. $_REQUEST['id_cat1'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
        <? 
		}
		else
		{
		?>
        <a href="index.php?com=product&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['id_cat1']!='') echo'&id_cat1='. $_REQUEST['id_cat1'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
        <?php
		 }?></td>
      <td style="width:3%;"><a href="index.php?com=product&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id_cat1=<?=$items[$i]['id_cat1']?>&id_color=<?=$items[$i]['id_color']?>&id_type=<?=$items[$i]['id_type']?>&id_room=<?=$items[$i]['id_room']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
      <td style="width:3%;"><a href="index.php?com=product&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['id_cat1']!='') echo'&id_cat1='. $_REQUEST['id_cat1'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
    </tr>
    <?php	}?>
  </table>
  <div style="text-align: center;clear: both;padding: 5px;"><b>Tìm kiếm</b>
    <input type="text" name="search" class="input" value="<?= $_POST['search'];?>">
    <input type="button" value="Search" onclick="if(document.frmLIST_PRODUCT.search.value== '') return false; else document.frmLIST_PRODUCT.submit();">
  </div>
</form>
<a href="index.php?com=product&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>
<div class="paging">
  <?=$paging['paging']?>
</div>
