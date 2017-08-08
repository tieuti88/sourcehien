<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "branch/items";
		break;
	case "add":		
		$template = "branch/item_add";
		break;
	case "edit":		
		get_item();
		$template = "branch/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "branch/cats";
		break;
	case "add_cat":		
		$template = "branch/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "branch/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
					
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging;
	
	
	if($_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	$sql_spmoi = "SELECT id,tinnoibat FROM table_branch where id='".$id_up."' ";
	$d->query($sql_spmoi);
	$row_spmoi= $d->result_array();
	$spmoi1=$row_spmoi[0]['tinnoibat'];
	if($spmoi1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_branch SET tinnoibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_branch SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_branch where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_branch SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_branch SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_branch where id !=0";
	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".(int)$_REQUEST['id_cat']."";
	}
	
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".(int)$_REQUEST['id_item']."";
	}
	
	if((int)$_REQUEST['id_cat1']!='')
	{
	$sql.=" and id_cat1=".(int)$_REQUEST['id_cat1']."";
	}
	
	if($_REQUEST['search']!='')
	{
	$ten = trim($_REQUEST['search']);
	$sql.=" and ten_vi like '%$ten%'";
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=branch&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=branch&act=man");
	
	$sql = "select * from #_branch where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=branch&act=man");
	$item = $d->fetch_array();
	
	
}

function save_item(){
	global $d, $name;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=branch&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_tintuc,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 180, 150, _upload_tintuc,$name."_".time(),2);
			$d->setTable('branch');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
		}
					
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['ten_vi'] = addslashes($_POST['ten_vi']);
		$data['ten_en'] = addslashes($_POST['ten_en']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		$data['noidung_en'] = addslashes($_POST['noidung_en']);
		
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('branch');
		$d->setWhere('id', $id);
		if($d->update($data)){			
			redirect("index.php?com=branch&act=man&curPage=".$_REQUEST['curPage']."");
		}else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=branch&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_tintuc,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 180, 150, _upload_tintuc,$name."_".time(),2);
		}						
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['ten_vi'] = addslashes($_POST['ten_vi']);
		$data['ten_en'] = addslashes($_POST['ten_en']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_vi'] = addslashes($_POST['noidung_vi']);
		$data['noidung_en'] = addslashes($_POST['noidung_en']);
		
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('branch');
		if($d->insert($data)){
			redirect("index.php?com=branch&act=man");
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=branch&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_branch where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_branch where id='".$id."'";
		}
		if($d->query($sql)){
			redirect("index.php?com=branch&act=man".$id_catt."");
		}else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=branch&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=branch&act=man");
}

#====================================

function get_cats(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_spmoi = "SELECT id,hienthi FROM table_branch_item where id='".$id_up."' ";
	$d->query($sql_spmoi);
	$row_spmoi= $d->result_array();
	$spmoi1=$row_spmoi[0]['hienthi'];
	if($spmoi1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_branch_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_branch_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	$sql = "select * from #_branch_item";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=branch&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=branch&act=man_cat");
	
	$sql = "select * from #_branch_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=branch&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=branch&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('branch_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=branch&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=branch&act=man_cat");
	}else{

		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('branch_item');
		if($d->insert($data))
			redirect("index.php?com=branch&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=branch&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();			
		$sql = "delete from #_branch_item where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=branch&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=branch&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=branch&act=man_cat");
}

function get_list_cat($id=0){
	global $d, $list_cat;
	
	$sql = "select * from #_branch_cat order by stt asc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list_cat = '<select name="id_cat" class="input">
	<option >Chọn danh mục cấp 1</option>
	
	';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list_cat .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['ten'].'</option>';
	$list_cat .= '</select>';
}

function get_list($id=0){
	global $d, $list;
	$sql = "select * from #_branch_item order by id desc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list = '<select name="id_item" class="input">
	
	<option >Chọn danh mục cấp 2</option>
	';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['ten'].'</option>';
	$list .= '</select>';
}


?>