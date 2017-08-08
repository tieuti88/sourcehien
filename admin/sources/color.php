<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "color/item";
		break;
	case "add":	
		$template = "color/item_add";
		break;
	case "edit":
		get_item();
		$template = "color/item_add";
		break;
	case "save":
		save_cat();
		break;
	case "delete":
		delete();
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
	
	$sql = "select * from #_product_color order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=color&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=color&act=man");
	
	$sql = "select * from #_product_color where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=color&act=man");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=color&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_color');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=color&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=color&act=man");
	}else{		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_color');
		if($d->insert($data))
			redirect("index.php?com=color&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=color&act=man");
	}
}

function delete(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$sql = "delete from #_product_color where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=color&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=color&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=color&act=man");
}
?>