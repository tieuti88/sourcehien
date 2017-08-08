<?php  if(!defined('_source')) die("Error");

		$title_bar = "Chương Trình Khuyến Mãi | ";
		$d->reset();
		$sql = "select noidung from #_khuyenmai";
		$d->query($sql);
		$about = $d->fetch_array();

	
	
?>