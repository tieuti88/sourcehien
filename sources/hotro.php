<?php  if(!defined('_source')) die("Error");
		
		@$string = trim($_GET['idc']);
		@$id = addslashes($_GET['id']);
		
		if($string){
		$sql = "select id,ten,tenkhongdau from #_thongtin_item where hienthi=1 and tenkhongdau='".$string."'";
		$d->query($sql);
		$hotro_item = $d->fetch_array();
		$idc = $hotro_item['id'];	
		}
		
		if(isset($_GET['id'])){
		$sql = "select id,id_item,ten,noidung from #_thongtin where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$hotro_detail = $d->fetch_array();
		
		$title_bar=$hotro_detail['ten'].' - ';
		$title_abc=$hotro_detail['ten'];
		
		$sql_khac = "select ten,tenkhongdau,id from #_thongtin where hienthi=1 and id_item=".$hotro_detail['id_item']." order by stt asc,id desc";
		$d->query($sql_khac);
		$hotro_khac = $d->result_array();
		
		}elseif($idc){
		$d->reset();	
		$sql = "select ten,tenkhongdau,id,noidung from #_thongtin where hienthi=1 and id_item=$idc order by stt asc,id desc";
		$d->query($sql);
		$hotro = $d->result_array();
		
		$title_bar=$hotro_item['ten'].' - ';
		$title_abc=$hotro_item['ten'];		
		}else{
		$d->reset();	
		$sql = "select id,ten,tenkhongdau from #_thongtin_item where hienthi=1 order by stt asc,id desc";
		$d->query($sql);
		$hotro_item = $d->result_array();
		$template = "hotro_cat"	;	
		}
	
?>