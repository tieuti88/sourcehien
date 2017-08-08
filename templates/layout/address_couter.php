<?php

    $d->reset();

    $sql = "select noidung_vi from #_footer";

    $d-> query($sql);

    $footer = $d->fetch_array();

?>
<div class="container-fluid wrap_address_counter">
	<div class="container">
    	<div class="row">
            <div class="col-md-8 col-sm-12 wrap_address">
            	<?=$footer['noidung_vi']?>
            </div>
			<div class="col-md-4 col-sm-12 wrap_address" style="text-align:right;padding-top:35px;">
            	Designed by Nguyen Chat Hien
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script type="text/javascript" src="http://<?=$config_url?>/js/jquery.featureCarousel.min.js"></script>
    <script type="text/javascript">
              $(document).ready(function() {
                $("#carousel img").addClass('carousel-image');
                var carousel = $("#carousel").featureCarousel({
                    smallFeatureHeight:260,
                });
        
                $("#but_prev").click(function () {
                  carousel.prev();
                });
                $("#but_pause").click(function () {
                  carousel.pause();
                });
                $("#but_start").click(function () {
                  carousel.start();
                });
                $("#but_next").click(function () {
                  carousel.next();
                });
                
                $("#kmt_vote_bt").click(function () {
                    var rs_v = $('input[name=inlineRadioOptions]:checked').val();
                    $("#rs_v").val(rs_v);
                });
                
              });
      </script>
    <script type="text/javascript" src="http://<?=$config_url?>/js/ymslider.min.js"></script>
    <script language="javascript">
    $(document).ready(function(){
        $("#Picactive").SoSlider({
            auto        :   3000,
            type        :   '',
            speed       :   500,
            visible     :   4,
            show_buttons:   0,
            start       :   0,
            scroll      :   1,
            divIds      :   '',
            pause       :   1,
            btnPrev     :   '#so_basic_pre_picactive',
            btnNext     :   '#so_basic_next_picactive',
            navigation  :   '#so_navigation_basic_picactive'
        });   
    }); 
    </script>
    <script src="http://<?=$config_url?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
            (function($){
                $(window).load(function(){
                    $("#content_1").mCustomScrollbar({
                        autoHideScrollbar:false,
                        theme:"light-thin"
                    });
                });
            })(jQuery);
            
    </script>