
  <div class="info-title"><h2><?=$title_abc?></h2></div>
  <div class="info-content">
    <div class="text">
	<h2>
      <?=stripcslashes($tintuc_detail['ten_'.$lang])?>
    </h2>
    <p>(
      <?=date('d-m-Y - h:i A',$tintuc_detail['ngaytao'])?>
      ) - <?=_view?>: <?=$tintuc_detail['luotxem']?>
    </p>
    <p style="margin: 10px 0px; font-weight: bold; line-height: 1.5em;">
      <?=stripcslashes($tintuc_detail['mota_'.$lang])?>
    </p>
	<?=stripcslashes($tintuc_detail['noidung_'.$lang])?>
    
    </div>
  </div>
  <div class="info-title"><h2><?=_other_baiviet?></h2></div>
  <div class="info-content">
  <div class="text">
  <?php if($tintuc_khac){?>
    <ul style=" list-style: url(images/arrow2.png) inside;">
      <?php for($i=0;$i<count($tintuc_khac); $i++){?>
      <li><a href="<?=$lang?>/about/<?=$tintuc_khac[$i]['tenkhongdau']?>-<?=$tintuc_khac[$i]['id']?>.html" class="transitionAll">
        <?=stripcslashes($tintuc_khac[$i]['ten_'.$lang])?>
        (
        <?=make_date($tintuc_khac[$i]['ngaytao'])?>
        )</a></li>
      <?php } ?>
    </ul>
    <?php }else{?><div style="color:#F00; padding: 10px; font-size: 20px;"><?=_tb?></div><?php } ?>
  </div>
  </div>

