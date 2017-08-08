<div class="info-title" style="margin-bottom: 0px;background: url(images/bg_title.png) no-repeat top center;">
    <h2><?=_newsletter?></h2>
    
    <p><a style="cursor:pointer;" id="send_email_newsletter" class="transitionAll"><?=_dangky?></a></p>
    <p style="margin-right: 20px;"><input type="email" name="email_newsletter" id="email_newsletter"></p>
    <p style="margin-right: 10px;"><input type="radio" name="sex" value="2"> <?=_women?></p>
    <p style="margin-right: 10px;"><input type="radio" name="sex" value="1"> <?=_men?></p>
   
</div>

<script>
    $(document).ready(function(e) {
        $('#send_email_newsletter').click(function(){
            var el = $('#email_newsletter');
			var sex = $('input[type="radio"]:checked');
            var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
            if(el.val()==''){el.focus();alert('Xin vui lòng nhập địa chỉ email của bạn');return false;}
            if(!emailRegExp.test(el.val())){
                el.focus();
                alert('Email không đúng');
            }else{
                $.ajax({
                    type: 'POST',
                    url : 'newsletter.php',
                    data: 'email='+el.val()+'&sex='+sex.val(),
                    success: function(result){
                        alert(result);
                    }
                });	
            }
            return false;
        });
    });
</script>

