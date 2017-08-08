<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	
	$sBasePath = "../FCKeditor/";
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'AMTECOL';
	
	$d = new database($config['database']);
	
	switch($com){
		case 'user':
			$source = "user";
			break;
		
		case 'upload':
			$source = "upload";
			break;
		case 'address':
			$source = "address";
			break;
		case 'catalogue':
			$source = "catalogue";
			break;	
		case 'branch':
			$source = "branch";
			break;
		case 'banggia':
			$source = "banggia";
			break;
		case 'hoptac':
			$source = "hoptac";
			break;
		case 'ttkh':
			$source = "ttkh";
			break;	
		case 'congtrinh':
			$source = "congtrinh";
			break;		
			
		case 'color':
			$source = "color";
			break;
		
		case 'newsletter':
			$source = "newsletter";
			break;	
		
		case 'thugian':
			$source = "thugian";
			break;
		
		case 'thongtin':
			$source = "thongtin";
			break;	
			
		case 'popup':
			$source = "popup";
			break;
				
		case 'order':
			$source = "donhang";
			break;
		case 'huongdan':
			$source = "huongdan";
			break;
		
		case 'counter':
			$source = "counter";
			break;
		
		case 'background':
			$source = "background";
			break;
			
		case 'baohanh':
			$source = "baohanh";
			break;
		case 'infoweb':
			$source = "infoweb";
			break;		
		case 'about':
			$source = "about";
			break;
		case 'slider':
			$source = "slider";
			break;	
		case 'footer':
			$source = "footer";
			break;		
		case 'video':
			$source = "video";
			break;
		case 'title':
			$source = "title";
			break;
			
		case 'news':
			$source = "news";
			break;
		
		case 'news1':
			$source = "news1";
			break;	
		
		case 'khuyenmai':
			$source = "khuyenmai";
			break;
		
		case 'thanhvien':
			$source = "thanhvien";
			break;		
		
		case 'kmai':
			$source = "kmai";
			break;
		case 'ketnoi':
			$source = "ketnoi";
			break;
		
		case 'ptthanhtoan':
			$source = "ptthanhtoan";
			break;	
				
		case 'meta':
			$source = "meta";
			break;

		case 'company':
			$source = "company";
			break;
		case 'lkweb':
			$source = "lkweb";
			break;
		case 'bannerqc':
			$source = "bannerqc";
			break;
		case 'hinhanh':
			$source = "hinhanh";
			break;
	
		case 'careers':
			$source = "careers";
			break;
		
		case 'quangcao':
			$source = "quangcao";
			break;
			
		case 'lienket':
			$source = "lienket";
			break;
		case 'product':
			$source = "product";
			break;
		case 'product1':
			$source = "product1";
			break;
			
		case 'yahoo':
			$source = "yahoo";
			break;
			
		case 'doitac':
			$source = "doitac";
			break;

		case 'contact':
			$source = "contact";
			break;
		
		case 'hotline':
			$source = "hotline";
			break;
			
		case 'service':
			$source = "service";
			break;
		case 'service1':
			$source = "service1";
			break;	
		case 'lienhe':
			$source = "lienhe";
			break;
			
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
	
	if($source!="") include _source.$source.".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Administration</title>
<link href="media/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.20.custom.min.js"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<!-- /TinyMCE -->

<link href="../css/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
<script src="../js/colorpicker/colorpicker.js"></script>
<script src="../js/colorpicker/eye.js"></script>
<script src="../js/colorpicker/utils.js"></script>
<script src="../js/colorpicker/layout.js?ver=1.0.2"></script>
<script type="text/javascript">
$('#colorpicker').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});
</script>

</head>

<body>

<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  
<div id="wrapper">
	<?php include _template."header_tpl.php"?>
    
    <div id="main"> 
		 
        <!-- Right col -->
        <div id="contentwrapper">
        <div id="content">
          <?php include _template.$template."_tpl.php"?>
        </div>
        </div>
        <!-- End right col -->
        
        <!-- Left col -->
        <div id="leftcol">
          <div class="innertube">
           <?php include _template."menu_tpl.php";?>
          </div>
        </div>
        <!-- End Left col -->
		
			<div class="clr"></div>
    </div>
  <div id="footer">
		<?php include _template."footer_tpl.php"?>
	</div>
</div>
<?php }else{?>   
				<?php include _template.$template."_tpl.php"?>
		<?php }?>
</body>
</html>
