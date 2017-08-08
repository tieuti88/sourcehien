<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "capnhat":
		get_color();
		$template = "background/item_add";
		break;
	case "save":
		save();
		break;

		
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}


function get_color(){
	global $d, $item;

	$sql = "select * from #_background";
	$d->query($sql);
	$item = $d->fetch_array();
}

function save(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if($_POST['id']){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('background');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
			}
		}
		$data['color'] = $_POST['color'];
		$d->setTable('background');
		$d->setWhere('id', $_POST['id']);
		if($d->update($data))
			redirect("index.php?com=background&act=capnhat");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=background&act=capnhat");
	}
}

?>