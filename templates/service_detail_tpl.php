<div class="col-md-9 col-sm-12 wrap_right">
	<div class="row block_list_service">
		<div class="col-md-12">
			<h1><a href="javascript:void(0)"><?=stripcslashes($tintuc_detail['ten_'.$lang])?></a></h1>
			<div class="row article_content">
			  <div class="col-md-12">
				  <div class="row content_1">
					<p>Đăng ngày - (<?=date('d-m-Y - h:i A',$tintuc_detail['ngaytao'])?>) - <?=_view?>: <?=$tintuc_detail['luotxem']?></p>
					<p style="margin: 10px 0px; font-weight: bold; line-height: 1.5em;"><?=stripcslashes($tintuc_detail['mota_'.$lang])?></p>
					  <?=stripcslashes($tintuc_detail['noidung_'.$lang])?>
				  </div>
			  </div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-9 col-sm-12 wrap_right">
    <div class="row block_list_service">
        <div class="col-md-12">
            <h1><a href="javascript:void(0)">CÁC BÀI VIẾT LIÊN QUAN</a></h1>
            <div class="row article_content">
              <div class="col-md-12">
                  <div class="content_1">
                    <?php if($tintuc_khac){?>

                    <ul style="margin-left: -35px">

                      <?php for($i=0;$i<count($tintuc_khac); $i++){?>

                      <li style="list-style: none"><i class="fa fa-star-o"></i><a href="http://<?=$config_url?>/service/<?=$tintuc_khac[$i]['tenkhongdau']?>-<?=$tintuc_khac[$i]['id']?>.html" class="transitionAll">

                        <?=stripcslashes($tintuc_khac[$i]['ten_'.$lang])?>

                        (<?=make_date($tintuc_khac[$i]['ngaytao'])?>)</a></li>

                      <?php } ?>

                    </ul>

                    <?php }else{?><div style="color:#F00; padding: 10px; font-size: 20px;"><?=_tb?></div><?php } ?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

