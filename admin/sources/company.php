<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "company/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_company limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=company&act=capnhat");
	
	$data['lang'] = $_POST['lang'];
	
	$data['ten_vi'] = $_POST['ten_vi'];
	$data['title_vi'] = $_POST['title_vi'];
	$data['description_vi'] = $_POST['description_vi'];
	$data['keywords_vi'] = $_POST['keywords_vi'];
	
	$data['ten_en'] = $_POST['ten_en'];
	$data['title_en'] = $_POST['title_en'];
	$data['description_en'] = $_POST['description_en'];
	$data['keywords_en'] = $_POST['keywords_en'];
	
	$data['address_vi'] = $_POST['address_vi'];
	$data['address_en'] = $_POST['address_en'];
	$data['hotline'] = $_POST['hotline'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['website'] = $_POST['website'];
	
	$d->reset();
	$d->setTable('company');
	if($d->update($data))
		//transfer("Dữ liệu đã được cập nhật", "index.php?com=company&act=capnhat");
		header("Location:index.php?com=company&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=company&act=capnhat");
}



?>