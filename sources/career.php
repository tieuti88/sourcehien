<?php  if(!defined('_source')) die("Error");
	$d->setTable('career');
	$d->select("noidung");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_tuyendung= $row['noidung'];
	}
	
	// thanh tieu de
	$title_bar .= " - tuyendung.html";
?>