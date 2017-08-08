<?php
	$template = "counter/items";
	
	global $d;
	
	$day             =    date('d');
    $month             =    date('n');
    $year             =    date('Y');
    $daystart         =    mktime(0,0,0,$month,$day,$year);
	$yesterdaystart     =    $daystart - (24*60*60);
	$group = date('d/m/Y');
    $query             =    "SELECT date, COUNT(*) AS soluot FROM counter GROUP BY date order by id desc";
    $yesrec  = $d->result_array($d->query($query));
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=counter&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($yesrec, $url, $curPage, $maxR, $maxP);
	$yesrec=$paging['source'];
    
?> 