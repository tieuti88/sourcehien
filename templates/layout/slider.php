<?php	
	$d->reset();
	$sql = "select photo,link,mota from #_slider where hienthi=1 order by stt asc,id desc";
	$d->query($sql);
	$slider = $d->result_array() ;
?>

<link rel="stylesheet" type="text/css" href="css/slider.css" />

<div class="container-fluid wrap_slide">
    <div class="row">
        <section id="dg-container" class="dg-container">
            <div class="dg-wrapper">
            <? for($i=0;$i<count($slider);$i++){?>
                <a href="#"><img src="<?=_upload_hinhanh_l.$slider[$i]['photo']?>" width="950px" height="400px" alt="image01"></a>
            <?}?>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript" src="http://<?=$config_url?>/js/jquery.gallery.min.js"></script>
<script type="text/javascript" src="http://<?=$config_url?>/js/modernizr.custom.53451.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#dg-container').gallery({
            autoplay    :   true
        });
})
</script>