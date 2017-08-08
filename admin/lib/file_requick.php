<?php

	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$d = new database($config['database']);

	switch($com){

	

		case 'tuyen-dung':

			$source = "tuyendung";

			$template ="tuyendung";

			break;

			

		case 'about':

			$source = "about";

			$template = isset($_GET['id']) ? "about_detail" : "about";

			break;

		


		case 'bai-viet-cong-ty':

			$source = "branch";

			$template = isset($_GET['id']) ? "branch_detail" : "branch";

			break;	

		

		case 'collaboration':

			$source = "hoptac";

			$template = isset($_GET['id']) ? "hoptac_detail" : "hoptac";

			break;

		

		case 'catalogue':

			$source = "catalogue";

			$template = isset($_GET['id']) ? "catalogue_detail" : "catalogue";

			break;	

			

		case 'ban-do':

			$source = "map";

			$template = "map";

			break;

		

		case 'news':

			$source = "news";

			$template = isset($_GET['id']) ? "news_detail" : "news";

			break;

			

		case 'account':

			$source = "account";

			break;



		case 'video':

			$source = "video";

			$template = isset($_GET['id']) ? "video_detail" : "video";

			break;	

		

		case 'service':

			$source = "service";

			$template = isset($_GET['id']) ? "service_detail" : "service";

			break;	

		

		case 'cong-trinh':

			$source = "congtrinh";

			$template = isset($_GET['id']) ? "congtrinh_detail" : "congtrinh";

			break;	

		

		case 'phuong-thuc-thanh-toan':

			$source = "ptthanhtoan";

			$template = "ptthanhtoan";

			break;

		

		case 'khuyen-mai':

			$source = "khuyenmai";

			$template = "khuyenmai";

			break;

				

		case 'tutorial':

			$source = "tutorial";

			$template = isset($_GET['id']) ? "tutorial_detail" : "tutorial";				

			break;

		

		case 'ho-tro':

			$source = "hotro";

			$template = isset($_GET['id']) ? "hotro_detail" : "hotro";				

			break;			

								

		case 'contact':

			$source = "contact";

			$template = "contact";

			break;

		

		case 'search':

			$source = "search";

			$template = "search";

			break;

		case 'basket':

			

			$source = "giohang";

			$template = "giohang";

			break;	

		case 'orders':

			

			$source = "orders";

			$template = "orders";

			break;		

		case 'dich-vu':

			$source = "product";

			$template = isset($_GET['id']) ? "product_detail" : "product";	

			break;



		case 'thong-tin-bao-hanh':

			$source = "baohanh";

			$template = "baohanh";

			break;	

		

		case 'thong-tin-web-site':

			$source = "infoweb";

			$template = "infoweb";

			break;	

		

		case 'login':

			$source = "login";

			$template = "login";

			break;

		

		case 'logout':

			$source = "logout";

			$template = "logout";

			break;	

		

		case 'thu-vien-anh':

			$source = "gallery";

			$template = "gallery";

			break;		

		

		case 'forgot-password':

			$source = "re_pass";

			$template = "re_pass";

			break;

			

		default: 

			$source = "index";

			$template = "index";

			break;

	}

	

	if($source!="") include _source.$source.".php";

	

	



	

?>