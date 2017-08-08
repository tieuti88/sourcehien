<?php  if(!defined('_source')) die("Error");





if(isset($_GET['id'])){

	#tin tuc chi tiet

	$id =  addslashes($_GET['id']);

	$sql = "select ten,mota,noidung,ngaytao,luotxem from #_congtrinh where hienthi=1 and id='".$id."'";

	$d->query($sql);

	$tintuc_detail = $d->fetch_array();

	$title_bar = $tintuc_detail['ten'].' - ';

	$title_abc = '<a href="cong-trinh/">CÔNG TRÌNH ĐÃ & ĐANG THI CÔNG</a> &raquo; '.$tintuc_detail['ten'];

	

	

	$luotxem = $tintuc_detail['luotxem']+1;

	$sql_update = "update #_congtrinh SET luotxem=$luotxem where id=$id";

	$d->query($sql_update);

	

	#các tin cu hon

	$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_congtrinh where hienthi=1 and id !='".$id."' order by stt asc,id desc limit 0,20";

	$d->query($sql_khac);

	$tintuc_khac = $d->result_array();



}else{

	$title_bar= 'CÔNG TRÌNH ĐÃ & ĐANG THI CÔNG - ';

	$title_abc = 'CÔNG TRÌNH ĐÃ & ĐANG THI CÔNG';

	$sql_tintuc = "select ten,tenkhongdau,mota,photo,thumb,id from #_congtrinh where hienthi=1 order by stt asc,id desc";

	

	$d->query($sql_tintuc);

	$tintuc = $d->result_array();

	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;

	$url = 'cong-trinh/';

	$maxR=16;

	$maxP=5;

	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);

	$tintuc=$paging['source'];

}

?>