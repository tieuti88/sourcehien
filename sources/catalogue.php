<?php  if(!defined('_source')) die("Error");

		
		@$id = addslashes($_GET['id']);

		$d->reset();
		if($id){
			
			$sql_detail = "select id,ten from #_catalogue where id='".$id."'";
			$d->query($sql_detail);
			$catalogue_detail = $d->fetch_array();
			$title_bar = $catalogue_detail['ten'].' - ';
			$title_abc = '<a href="catalogue/">Catalogue</a> &raquo; '.$catalogue_detail['ten'];
			
			$d->reset();
			$sql = "select thumb,photo from #_catalogue_photo where id_catalogue=$id";
			$d->query($sql);
			$catalogue_photo = $d->result_array();
			 		
		}else{
			
			$sql = "select id,ten,tenkhongdau,thumb from #_catalogue where hienthi=1";
			
			$sql.= " order by stt asc,id desc";
			$d->query($sql);
			$catalogue = $d->result_array();
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : '1';
			$url = 'catalogue/';
			$maxR=24;
			$maxP=5;
			$paging=paging_home($catalogue, $url, $curPage, $maxR, $maxP);
			$catalogue=$paging['source'];
			
			$title_bar = 'Catalogue - ';
			$title_abc = 'Catalogue';
		}
?>