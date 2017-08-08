<h3><a href="index.php?com=video&act=add">Thêm Video</a></h3>
<script language="javascript">	
	function select_onchange()
	{	
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=video&act=man&id_cat="+b.value;	
		return true;
	}
	
	function select_onchange1()
	{	
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		window.location ="index.php?com=video&act=man&id_cat="+b.value+"&id_item="+c.value;	
		return true;
	}

</script>
<?php
function get_main_category()
	{
		$sql="select * from table_video_cat order by stt asc,id desc";
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
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	function get_main_item()
	{
		$sql_huyen="select * from table_video_item where id_cat=".$_REQUEST['id_cat']." order by stt desc ";
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
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<form action="#" method="post" name="frmLIST_video" id="frmLIST_video">
  <table class="blue_table">
    <tr>
      <th style="width:3%;">Stt</th>
    
      <th style="width:25%;">Tiêu đề</th>
	
      <th style="width:4%;">Hiển thị</th>
      <th style="width:3%;">Sửa</th>
      <th style="width:3%;">Xóa</th>
      <input name="ids" type="hidden" id="ids">
      <input name="mod" type="hidden" id="mod">
      <input name="strID" type="hidden" id="strID">
      <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?=$_POST['txtLIST_ID']?>">
    </tr>
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
    <tr>
      <td style="width:3%;"><a href="index.php?com=video&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;">
        <?=$items[$i]['stt']?>
        </a></td>
     
      <td align="center" style="width:25%;"><a href="index.php?com=video&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
        <?=$items[$i]['ten_vi']?>
        </a></td>
      

      <td style="width:4%;"><?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=video&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
        <? 
		}
		else
		{
		?>
        <a href="index.php?com=video&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
        <?php
		 }?></td>
      <td style="width:3%;"><a href="index.php?com=video&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
      <td style="width:3%;"><a href="index.php?com=video&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
    </tr>
    <?php	}?>
  </table>
<div style="text-align: center;clear: both;padding: 5px;"><b>Tìm kiếm</b> <input type="text" name="search" class="input" value="<?= $_POST['search'];?>"> <input type="button" value="Search" onclick="if(document.frmLIST_video.search.value== '') return false; else document.frmLIST_video.submit();"></div>
  
</form>
<a href="index.php?com=video&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging">
  <?=$paging['paging']?>
</div>
