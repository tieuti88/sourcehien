<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



<div class="col-md-9 col-sm-12 wrap_right">
    <div class="row block_list_service">
        <div class="col-md-12">
            <h1><a href="javascript:void(0)"><?=stripcslashes($product_detail['ten_'.$lang])?></a></h1>
            <div class="row article_content">
              <div class="col-md-12">
                  <div class="row content_1">
                    <p>Đăng ngày - (<?=date('d-m-Y - h:i A',$product_detail['ngaytao'])?>) - <?=_view?>: <?=$product_detail['luotxem']?></p>
                    <p style="margin: 10px 0px; font-weight: bold; line-height: 1.5em;"><?=stripcslashes($product_detail['mota_'.$lang])?></p>
                      <?=stripcslashes($product_detail['noidung_'.$lang])?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9 col-sm-12 wrap_right">
    <div class="row block_list_service">
        <div class="col-md-12">
            <h1><a href="javascript:void(0)">CÁC DỊCH VỤ LIÊN QUAN</a></h1>
            <div class="row article_content">
              <div class="col-md-12">
                  <div class="row content_1">
                    <?php if($product){?>

                    <ul style="margin-left: -35px">

                      <?php for($i=0;$i<count($product); $i++){?>

                      <li style="list-style: none"><i class="fa fa-star-o"></i><a href="http://<?=$config_url?>/dich-vu/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" class="transitionAll">

                        <?=stripcslashes($product[$i]['ten_'.$lang])?>

                        (<?=make_date($product[$i]['ngaytao'])?>)</a></li>

                      <?php } ?>

                    </ul>

                    <?php }else{?><div style="color:#F00; padding: 10px; font-size: 20px;"><?=_tb?></div><?php } ?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>


