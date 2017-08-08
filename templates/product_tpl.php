<div class="col-md-9 col-sm-12 wrap_right">
    <div class="row block_list_service">
        <div class="col-md-12">
            <h1><a href="javascript:void(0)">DỊCH VỤ</a></h1>
            
            <div class="row list_service">
            <? for($i=0;$i<count($product);$i++) {?>
                 
                <div class="row block_news">
                    
                    <div class="col-md-3 col-sm-12 img_news">
                        <a href="http://<?=$config_url?>/dich-vu/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" class="thumbnail">
                            <img src="<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten_vi']?>" title="<?=$product[$i]['ten_vi']?>" rel="nofollow">
                        </a>
                    </div>
                    <div class="col-md-9 col-sm-12 info_news">
                        <h3>
                            <a href="http://<?=$config_url?>/dich-vu/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten_vi']?>">
                                <?=$product[$i]['ten_vi']?>                                            </a>
                        </h3>
                        <p><?=_substr($product[$i]['mota_vi'],250)?></p>
                        <p class="chitiet"><a href="http://<?=$config_url?>/dich-vu/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html">Chi tiết &gt;&gt;</a></p>
                    </div>
                    
                </div>
            <? } ?>     
            </div>
            
        </div>
    </div>
</div>