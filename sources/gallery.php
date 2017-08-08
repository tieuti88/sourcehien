<?php
	
	$d->reset();
	$sql = "select * from #_hinhanh where hienthi=1 order by stt asc, id desc";
	$d->query($sql);
	$gallery = $d->result_array();

	
?>