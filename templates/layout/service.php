<?php
    $d->reset();
    $sql = "select * from #_service where hienthi=1 order by stt asc,id desc";
    $d->query($sql);
    $service = $d->result_array() ;
?>

<div class="container wrap_service_home">
       <div class="row">
        <? for($i=0;$i<count($service); $i++) {?>
           <div class="col-md-4 col-sm-12">
                <div class="block_service_home">
                    <h1><a href="service/<?=$service[$i]['tenkhongdau']?>-<?=$service[$i]['id']?>.html" title="<?=$service[$i]['ten_vi']?>"><?=$service[$i]['ten_vi']?></a></h1>
                    <div class="img_service_home">
                        <a href="service/<?=$service[$i]['tenkhongdau']?>-<?=$service[$i]['id']?>.html" class="thumbnail">
                            <img src="<?=_upload_tintuc_l.$service[$i]['photo']?>" alt="<?=$service[$i]['ten_vi']?>" title="<?=$service[$i]['ten_vi']?>" rel="nofollow">
                        </a>
                    </div>
                    <div class="des_service_home">
                        <?=_substr($service[$i]['mota_vi'],100)?>
                    </div>
                    <div class="des_service_link">
                        <a href="service/<?=$service[$i]['tenkhongdau']?>-<?=$service[$i]['id']?>.html" title="Readmore">chi tiết <i class="fa fa-angle-double-right"></i></a>  
                    </div>
                </div>
           </div>
        <? } ?>
        </div>
</div>