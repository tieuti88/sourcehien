<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
if(isset($_REQUEST['id_catalogue'])){$_SESSION['id_catalogue']=(int)$_REQUEST['id_catalogue'];}
switch($act){

	case "man":
		get_items();
		$template = "catalogue/items";
		break;
	case "add":		
		$template = "catalogue/item_add";
		break;
	case "edit":		
		get_item();
		$template = "catalogue/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
			
	#=======================================================	
	case "man_photo":
		get_photos();
		$template = "catalogue/photo";
		break;
	case "add_photo":		
		$template = "catalogue/photo_add";
		break;
	case "edit_photo":		
		get_photo();
		$template = "catalogue/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
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
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_catalogue where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_catalogue SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_catalogue SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_catalogue where id !=0";
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=catalogue&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=catalogue&act=man");
	
	$sql = "select * from #_catalogue where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=catalogue&act=man");
	$item = $d->fetch_array();
	
}

function save_item(){
	global $d, $name;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=catalogue&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_hinhanh,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 350, 350, _upload_hinhanh,$name."_".time(),2);
			$d->setTable('catalogue');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
		}
					
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		
		
		
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('catalogue');
		$d->setWhere('id', $id);
		if($d->update($data)){			
			redirect("index.php?com=catalogue&act=man&curPage=".$_REQUEST['curPage']."");
		}else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=catalogue&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_hinhanh,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 350, 350, _upload_hinhanh,$name."_".time(),2);
		}						
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		
		
		
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('catalogue');
		if($d->insert($data)){
			redirect("index.php?com=catalogue&act=man");
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=catalogue&act=man");
	}
}

function delete_item(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_catalogue where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
			$sql = "delete from #_catalogue where id='".$id."'";
		}
		if($d->query($sql)){
			$sql = "select photo,thumb from #_catalogue_photo where id_catalogue='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
			}
			redirect("index.php?com=catalogue&act=man");
		}else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=catalogue&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=catalogue&act=man");
}

#========================================================
function get_photos(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_catalogue_photo where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_catalogue_photo SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_catalogue_photo SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_catalogue_photo";
	
	if(isset($_SESSION['id_catalogue'])){
	$sql.=" where id_catalogue=".$_SESSION['id_catalogue'];	
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=catalogue&act=man_photo";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_photo(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=catalogue&act=man_photo");
	
	$sql = "select * from #_catalogue_photo where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=catalogue&act=man_photo");
	$item = $d->fetch_array();
}

function save_photo(){
	global $d, $name;
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=catalogue&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_hinhanh,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 350, 350, _upload_hinhanh,$name."_".time(),2);
			$d->setTable('catalogue_photo');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
		}				
		$data['id_catalogue'] = $_SESSION['id_catalogue'];
		$data['color'] = $_POST['color'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('catalogue_photo');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=catalogue&act=man_photo&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=catalogue&act=man_photo");
	}else{
		for($i=0; $i<5; $i++){
			$name = $_FILES['file'.$i]['name'];
			$name = explode('.',$name);
			$name = changeTitle($name[0]);
			
			if($photo = upload_image("file$i", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_hinhanh,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 350, 350, _upload_hinhanh,$name."_".time(),2);
									
			$data['id_catalogue'] = $_SESSION['id_catalogue'];
			$data['color'] = $_POST['color'.$i];
		
			$data['stt'] = $_POST['stt'.$i];
			$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
			$d->setTable('catalogue_photo');
			if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=catalogue&act=man_photo");
			}
		}
		redirect("index.php?com=catalogue&act=man_photo");
	}
}

function delete_photo(){
	global $d;
	if($_REQUEST['curPage']!='')
	{ $id_catt="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_catalogue_photo where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
			$sql = "delete from #_catalogue_photo where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=catalogue&act=man_photo".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=catalogue&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=catalogue&act=man_photo");
}


?>