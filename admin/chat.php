<?php
        $chatter = fopen("../data/chat.html", "a") or die("Chat System Failure!!");
    
        $ip_address = $_SERVER['REMOTE_ADDR'] or die("IP Log Failed");
        //Log some IP
        date_default_timezone_set("Asia/Seoul");
        $current_date = date("Y-m-d");
        $current_time = date("h:i:sa");
        

        $username = "ADMIN";
        $message = $_GET["chat"] or $skip = "activate";
        
        if($skip != "activate")
        {
        $chat = ("<span style=\"color:#2980b9\"><strong>[" . $username . "]</strong></span> " . $message . " <span style=\"font-size:8px\">" . $current_date . " " . $current_time . " at IP:" . $ip_address . "</span> <br> \n");
        }
    
             
        fwrite($chatter, $chat);
        fclose($chatter);
		//echo ("<br><br><br>if page doesn't redirect back to admin page, then, please use <a href=\"index.html\"> this link. </a>");	
?>

<html>

<head>
    <meta charset=utf-8>
    <title>ViCue Recoded - ADMIN Chat</title>
    <link rel=stylesheet href=../css/foundation.css>
    <link rel=stylesheet href=../css/app.css>
    <script src="../js/jquery.js"></script>
    <script src="../js/vendor/foundation.js"></script>
    <script src="../js/vendor/what-input.js"></script>
    <meta name=viewport content=width=600px>
    <script src="../ckeditor/ckeditor.js"></script>
    <meta name="viewport" content="width=600px">
</head>

<body style="background-color:#242424 !important;" onLoad=refresh_all_data();fill_today();>
    <div class=off-canvas-wrapper style="background:#454545 !important;">
        <div class="off-canvas position-left" id=offCanvasLeft data-off-canvas data-position=left style="background:#454545 !important;">
            <button class=close-button aria-label="Close menu" type=button data-close> <span aria-hidden=true style=color:#FFF>&times;</span> </button>
            <ul class="mobile-ofc vertical menu" style=color:#FFF>
                <p>&nbsp;</p>
                <ul class="vertical menu" data-accordion-menu>
                    <li><a href=#><B>로그인</B></a>
                        <ul class="menu vertical nested">
                            <li><a href=../standby/index.html>대기실</a></li>
                            <li><a href=../prep/index.html>준비실</a></li>
                            <li><a href=../cast/index.html>방송실</a></li>
                            <li><a href=../stage/index.html>무대</a></li>
                        </ul>
                    </li>
                    <br />
                    <li><a href=index.html>ADMIN</a></li>
                    <br />
                    <br />
                  
                </ul>
            </ul>
        </div>
    </div>
    <br />
    <div class=row>
        <div class="medium-12 columns" style=padding-bottom:10px>
            <div style=padding:10px;text-align:left;width:100%;background:#454545;color:#FFF>
                <button class=menu-icon type=button data-open=offCanvasLeft></button>&nbsp;&nbsp;&nbsp; <span id=event_name>Loading...</span> - ViCue Recoded - Admin Chat - <span id=clock>Current Time</span></div>
        </div>
    </div>
    <div class=row>
        <div class="medium-12 columns" align=center style=color:#FFFFFF;>Chat
            <div class=chat id=chat align=left style="width: 100%; background-color: #333 !important; text-align: left !important; line-height: 15pt; font-size: 14pt; padding:10px; overflow-y:scroll; height:600px">Loading...</div>
            <form name="chat" id="chat_send" action="">
                <fieldset>
                    <textarea name="chat" id="chat_type"></textarea>
                    <input type="submit" id="submit" name="submit" class="alert button">
                    <script>
                        $(function() {
                            $("#submit").click(function() {
                                
                                var chat = $("input#chat").val();
                                var dataString = '&chat='+ chat;
                                
                                $.ajax({
                                    type: "POST",
                                    url: "chat.php",
                                    data: dataString,
                                    success: function() {
                                    $( '#chat_send' ).each(function(){
                                        this.reset();
                                    });
                                    
                                    }
                                });
    
                                });
                            });
                    </script>
                </fieldset>
                
            </form>
        </div>
    </div>
    <br>
    <br />
    <br />
    <br />
    
    <div class=row>
        <div class="small-12 columns" align=center style=color:#FFF><img src=../favicon_appletouch.png width=15px height=15px>&nbsp; ViCue Recoded. built by 박상희 (YiT Leader) (<a href=mailto:psh010209@naver.com>psh010209@naver.com</a>) &amp; 문보건 (<a href=mailto:moonbogun@naver.com>moonbogun@naver.com</a>)
		<br> Copyright (C) 2017 Alex Park
                <br> 이 프로그램은 제품에 대한 어떠한 형태의 보증도 제공되지 않습니다.
                <br> 이 프로그램은 <a href=http://www.fsf.org/>자유 소프트웨어</a>이며 <a href=https://github.com/Alex4386/ViCue_Recoded/blob/master/LICENSE>Apache License 2.0</a>를 만족시키는 조건 아래 자유롭게 재배포할 수 있습니다.
                <br> 이에 대한 자세한 사항은 본 프로그램의 구현을 담은 다음 레포지토리에서 확인하십시오: <a href=https://github.com/Alex4386/ViCue_Recoded>https://github.com/Alex4386/ViCue_Recoded</a></div>
    </div>
	
	<script>
	$(document).foundation();
	</script>
			
	<script src="js/chat.js"></script>
			
	<script>
                CKEDITOR.replace( 'chat_type' , {
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        toolbarGroups: [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	],
        removeButtons: 'Save,Form,Checkbox,HiddenField,ImageButton,Radio,TextField,Textarea,Select,Button,Flash,HorizontalRule,PageBreak,Iframe',
        
    });
       countdown();


	</script>
    

    
</body>

</html>