<?php  if(!defined('_source')) die("Error");

		if(isset($_GET['id'])){
		#tin tuc chi tiet
		$id =  addslashes($_GET['id']);
		$sql = "select ten,noidung from #_baohanh where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$tintuc_detail = $d->fetch_array();
		$title_bar=$tintuc_detail['ten'].' | ';
		$title_abc=$tintuc_detail['ten'];
		#các tin cu hon
		$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_baohanh where hienthi=1 order by stt asc,id desc";
		$d->query($sql_khac);
		$tintuc_khac = $d->result_array();
		}
	
	
?>