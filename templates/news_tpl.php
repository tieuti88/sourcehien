<div class="col-md-9 col-sm-12 wrap_right">
    <div class="row block_list_service">
        <div class="col-md-12">
            <h1><a href="javascript:void(0)">TIN TỨC</a></h1>
            
            <div class="row list_service">
            <? for($i=0;$i<count($tintuc);$i++) {?>
                 
                <div class="row block_news">
                    
                    <div class="col-md-3 col-sm-12 img_news">
                        <a href="http://<?=$config_url?>/news/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" class="thumbnail">
                            <img src="<?=_upload_tintuc_l.$tintuc[$i]['thumb']?>" alt="<?=$tintuc[$i]['ten_vi']?>" title="<?=$tintuc[$i]['ten_vi']?>" rel="nofollow">
                        </a>
                    </div>
                    <div class="col-md-9 col-sm-12 info_news">
                        <h3>
                            <a href="http://<?=$config_url?>/news/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" title="<?=$tintuc[$i]['ten_vi']?>">
                                <?=$tintuc[$i]['ten_vi']?>                                            </a>
                        </h3>
                        <p><?=_substr($tintuc[$i]['mota_vi'],250)?></p>
                        <p class="chitiet"><a href="http://<?=$config_url?>/news/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html">Chi tiết &gt;&gt;</a></p>
                    </div>
                    
                </div>
            <? } ?>
            <ul class="pagination pagination-sm pull-right"><li><?=$paging['paging']?></li></ul>
            </div>
            
        </div>
    </div>
</div>





