<?php

    $d->reset();
    $sql = "select * from #_lkweb where hienthi = 1 order by stt asc,id desc";
    $d->query($sql);
    $lkweb = $d->result_array();

?>
<div class="row">
    <div class="span12">
        <section class="brands-carousel  clearfix">
            <h3><span>Hình ảnh nổi bật</span></h3>
            <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal">
                <div style="position: relative;" class="jcarousel-clip jcarousel-clip-horizontal">
                    <ul style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 1524px;" class="brands-carousel-list clearfix jcarousel-list jcarousel-list-horizontal">
                        <?php for($i=0;$i<count($lkweb);$i++) {?>
                        <li jcarouselindex="1" style="float: left; list-style: outside none none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal">
                            <a target="_blank" href="<?=$lkweb[$i]['link']?>" title="themeforest">
                                <img src="<?=_upload_hinhanh_l.$lkweb[$i]['photo']?>" alt="themeforest" title="themeforest">
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div disabled="disabled" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div>
                <div style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div>
            </div>
        </section>
    </div>
</div>