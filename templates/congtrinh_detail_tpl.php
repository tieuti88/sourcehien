
  <div class="info-title"><span><?=$title_abc?></span></div>
  <div class="info-content">
    <div class="text">
    
    <h2>
      <?=$tintuc_detail['ten']?>
    </h2>
    <p style="font-style: italic;">(
      <?=date('d-m-Y - h:i A',$tintuc_detail['ngaytao'])?>
      ) - Lượt xem: <?=$tintuc_detail['luotxem']?>
    </p>
    <p style="margin: 10px 0px; font-weight: bold; line-height: 1.5em;">
      <?=$tintuc_detail['mota']?>
    </p>
	<?=$tintuc_detail['noidung']?>
    
    </div>
  </div>
  <div class="info-title"><span>Các công trình khác</span></div>
  <div class="info-content">
  <div class="text">
  <?php if($tintuc_khac){?>
    <ul style=" list-style: url(images/icon.png) inside;">
      <?php for($i=0;$i<count($tintuc_khac); $i++){?>
      <li><a href="cong-trinh/<?=$tintuc_khac[$i]['tenkhongdau']?>-<?=$tintuc_khac[$i]['id']?>.html">
        <?=$tintuc_khac[$i]['ten']?>
        (
        <?=make_date($tintuc_khac[$i]['ngaytao'])?>
        )</a></li>
      <?php } ?>
    </ul>
    <?php }else{?><div style="color:#F00; padding: 10px; font-size: 17px;">Nội dung chưa cập nhật. Xin xem các chuyên mục khác</div><?php } ?>
  </div>
  </div>

