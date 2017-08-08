<?php
    $d->reset();

    $sql = "select ten_vi,id, tenkhongdau from #_product where hienthi=1 order by stt asc, id desc";

    $d->query($sql);

    $service = $d->result_array();



    $d->reset();

    $sql = "select ten_vi,id, tenkhongdau from #_news where hienthi=1 order by stt asc, id desc";

    $d->query($sql);

    $news = $d->result_array();
?>



<div class="col-md-9 col-sm-12 wrap_right">
                
    <div class="row visible-lg">
        <div class="col-md-12">
            <h1><span>TOÀN LIÊM COMPANY</span> - DỊCH VỤ HOÀN HẢO TẠO NÊN SỰ KHÁC BIỆT! </h1>
                <div class="wrap_icon_service">
                            
                            <div class="row">
                                <? for($i=0; $i<count($branch_index); $i++){ ?>
                                <div class="col-md-4 col-xs-12 block_icon_service hi-icon-effect-1 hi-icon-effect-1a">
                                    <a href="http://<?=$config_url?>/bai-viet-cong-ty/<?=$branch_index[$i]['tenkhongdau']?>-<?=$branch_index[$i]['id']?>.html" class="hi-icon">
                                        <img class="img-circle" src="http://<?=$config_url?>/<?=_upload_tintuc_l.$branch_index[$i]['photo']?>" alt="" title="" rel="nofollow">
                                    </a>
                                    <p>
                                        <a href="http://<?=$config_url?>/bai-viet-cong-ty/<?=$branch_index[$i]['tenkhongdau']?>-<?=$branch_index[$i]['id']?>.html" title="<?=$branch_index[$i]['ten_vi']?>"><?=$branch_index[$i]['ten_vi']?></a>
                                    </p>
                                </div>
                                <? } ?>    
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="row block_list_service">
                    <div class="col-md-12">
                        
                        <h1><a href="javascript:void(0)">DỊCH VỤ</a></h1>
                        
                        <div class="row list_service">
                        <? for($i=0;$i<count($service_index);$i++) {?>
                             
                            <div class="col-md-6 col-sm-12 element_list_service">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 img_list_service">
                                        <a href="http://<?=$config_url?>/dich-vu/<?=$service_index[$i]['tenkhongdau']?>-<?=$service_index[$i]['id']?>.html" class="thumbnail">
                                            <img src="<?=_upload_sanpham_l.$service_index[$i]['photo']?>" alt="<?=$service_index[$i]['ten_vi']?>" title="<?=$service_index[$i]['ten_vi']?>" rel="nofollow">
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-12 info_list_service">
                                        <p class="kmt_title" style="font-size: 14px;">
                                            <a href="http://<?=$config_url?>/dich-vu/<?=$service_index[$i]['tenkhongdau']?>-<?=$service_index[$i]['id']?>.html" title="<?=$service_index[$i]['ten_vi']?>">
                                                <?=$service_index[$i]['ten_vi']?>                                            </a>
                                        </p>
                                        <p><?=_substr($service_index[$i]['mota_vi'],100)?></p>
                                        <p class="chitiet"><a href="http://<?=$config_url?>/dich-vu/<?=$service_index[$i]['tenkhongdau']?>-<?=$service_index[$i]['id']?>.html">Chi tiết &gt;&gt;</a></p>
                                    </div>
                                </div>
                            </div>
                        <? } ?>     
                        </div>
                        
                    </div>
                </div>
                
            
</div>

