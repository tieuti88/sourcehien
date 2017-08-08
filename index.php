<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    error_reporting(E_ALL & ~E_NOTICE & ~8192);
    $session=session_id();
    @define ( '_template' , './templates/');
    @define ( '_source' , './sources/');
    @define ( '_lib' , './admin/lib/');
    @define ( _upload_folder , './upload/');
    
    include_once _lib."config.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."functions_giohang.php";
    include_once _lib."class.database.php";
	
    $d = new database($config['database']);
    
    $sql = "select * from #_company limit 0,1";
    $d->query($sql);
    $company= $d->fetch_array();
    
    $lang=$company['lang'];
    $lang_arr=array("vi","en");
    if (isset($_GET['lang']) == true){
          if (in_array($_GET['lang'], $lang_arr)==true) $lang = $_GET['lang'];
        }
    require_once _source."lang_$lang.php";  
    
    include_once _lib."file_requick.php";  
	include_once _source."counter.php";
	
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><!--<![endif]-->
<head>
    <base href="http://<?=$config_url?>/">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
	<meta name="google-site-verification" content="0Y7uUyUUmArG7a9lcFoiWYgltPdD5QTeraaeD70q7lQ" />
    <meta name="description" CONTENT="<?=$description?>" />
    <meta name="keywords" CONTENT="<?=$keywords?>" />
    <title><?=$title_bar?></title>
    <link rel="shortcut icon" href="logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://<?=$config_url?>/js/jquery.1.7.2.min.js"></script>
    <link href="http://<?=$config_url?>/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="http://<?=$config_url?>/css/styles.css" rel="stylesheet"/>
    <link href="http://<?=$config_url?>/css/kmt_responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="http://<?=$config_url?>/css/feature-carousel.css" media="all"/>
    <link href="http://<?=$config_url?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
    <link href="http://<?=$config_url?>/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" />
    


</head>
<body>
    <div id="all">
        <!-- Start Header -->
        <?php include_once _template."layout/menu.php" ?>
        <?php include_once _template."layout/header.php" ?>
        
    	<?php if($_GET['com']=='' || $_GET['com']=='index') {?>
        <div id="home-flexslider" class="clearfix">
            <?php include_once _template."layout/slider.php" ?>
        </div><!-- End Slider -->
    	<?php }?>
        <?php include_once _template."layout/service.php" ?>
        <div class="container wrap_content">
        <div class="row">
            <?php include_once _template."layout/left.php" ?>
            <?php include _template.$template."_tpl.php" ?>
        </div>
        </div><!-- End .contents -->
        <?php include_once _template."layout/quangcao.php" ?>
        <?php include_once _template."layout/social.php" ?>
        <?php include_once _template."layout/address_couter.php" ?>

        <div class="container_face">
            <ul class="thongke">
                <li class="dangonline"><p>Đang Online:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php $count = count_online();  echo $count['dangxem'] + 8 ?></span></p></li>
                <li class="tuanonline"><p>Trong tuần:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$week_visitors?></span></p></li>
                <li class="thangonline"><p>Trong tháng:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$month_visitors?></span></p></li>
                <li class="tongonline"><p>Tổng truy cập:<span>&nbsp;&nbsp;&nbsp;&nbsp;<?=$all_visitors?></span></p></li>
            </ul>
        </div>

    </div>
    <script type="text/javascript">

         jQuery(document).ready(function() {
             jQuery(".container_face").hover(function() {
                 jQuery(this).stop().animate({right: "0"}, "medium");
        }, function() {
            jQuery(this).stop().animate({right: "-240"}, "medium");}, 500);
        });
    </script>
    <script src="http://<?=$config_url?>/js/bootstrap.min.js"></script>
    <script src="http://<?=$config_url?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    
	
<?php include_once("analyticstracking.php") ?>
</body>
</html>