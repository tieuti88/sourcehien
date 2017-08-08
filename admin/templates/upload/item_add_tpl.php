<script>
	$(document).ready(function(e) {
		$('#ok').click(function(){
			$('#load').css({visibility: "visible"});
		});    
    });
</script>
<?php
if(isset($_POST['ok'])){
$file_type=$_FILES['linkfile']['type'];
		if($file_type=="application/vnd.ms-excel" || $file_type=="application/x-ms-excel")
		{	
				$filename=$_FILES["linkfile"]["name"];
				move_uploaded_file($_FILES["linkfile"]["tmp_name"],$filename);
					
		
require_once('reader.php'); 
// Init Reader
$excel = new Spreadsheet_Excel_Reader();
//$excel->setUTFEncoder('mb');
$excel->setOutputEncoding('UTF-8');
$excel->read($filename);

for ($i = 2; $i <=  $excel->sheets[0]['numRows']; $i++) {
	
	$masp = trim($excel->sheets[0]['cells'][$i][1]);	
	$gia = trim($excel->sheets[0]['cells'][$i][2]);
	$km = trim($excel->sheets[0]['cells'][$i][3]);
	$bh = trim($excel->sheets[0]['cells'][$i][4]);
	$kho = trim($excel->sheets[0]['cells'][$i][5]);
	
	$d->reset();
	$sql = "select id from #_product where masp='".$masp."'";
	$d->query($sql);
	if($d->num_rows()>0){
		$sqlUpdate = "update #_product set masp='".$masp."', giaban=$gia, kmai='".$km."', baohanh='".$bh."', kho='".$kho."' where masp='".$masp."'";
		if(!$d->query($sqlUpdate)){ echo "Update lỗi Mã sản phẩm : ".$masp;exit;}
	}
	//echo $masp." ".$gia." ".$km." ".$bh." ".$kho."<br/>";
} 

echo "<b>Import thành công!</b>";
unlink($filename) or DIE("couldn't delete $dir$file<br />");
}else
		{
	?>
	<script language="javascript">
		alert("Không hỗ trợ kiểu file này");
	</script>
	<?php
	}
}
?>

<h3>Import bảng giá <span id="load" style="visibility: hidden;"><img border="0" src="media/images/ajaxloader.gif" align="absmiddle"></span></h3>
<form name="form1" id="from1" action="" method="post" enctype="multipart/form-data" class="nhaplieu">
	
    <b>File: </b><input type="file" name="linkfile"  size="25" maxlength="255"  /> <strong>Loại : .xls (Ms.Excel 2003)</strong><br />
       <input type="submit" name="ok" id="ok" value="Upload" style="margin-left: 125px; margin-top: 10px;"/>

    


</form>