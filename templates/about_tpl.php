<div class="col-md-9 col-sm-12 wrap_right">
    <div class="row block_list_service">
        <div class="col-md-12">
            <h1><a href="javascript:void(0)">Giới thiệu về công ty</a></h1>
            <div class="row article_content">
              <div class="col-md-12">
                  <div class="row content_1">
                    <p>Đăng ngày - (<?=date('d-m-Y - h:i A',$about['ngaytao'])?>) - <?=_view?>: <?=$about['luotxem']?></p>
                    <p style="margin: 10px 0px; font-weight: bold; line-height: 1.5em;"><?=stripcslashes($about['mota_'.$lang])?></p>
                      <?=stripcslashes($about['noidung_'.$lang])?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>




