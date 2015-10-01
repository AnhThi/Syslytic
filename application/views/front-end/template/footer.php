
<div style="z-index: 800; position: relative; background-color: #ffffff; height: 40px; overflow: hidden;">
    <div class="container ulcen" id="nav_social">
        <ul style="margin-top: -8px;">
            <?php 
                if (isset($social)) {
                    foreach ($social as $so) {
            ?>
            <li>
                <a href="<?php echo $so['sn_link']; ?>" class="navbar-brand">
                  <i class="fa <?php echo $so['sn_id']; ?> fa-lg"></i>
                </a>
            </li>
            <?php                   
                    }
                }
            ?>
            <li>
                <a href="<?php echo base_url(); ?>company/about-us" class="navbar-brand" style="font-family: 'OpenSans Regular'; font-size: 1.1em !important; margin-top: 0px;">
                    Contact    
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>company/jobs" class="navbar-brand" style="font-family: 'OpenSans Regular'; font-size: 1.1em !important; margin-top: 0px;">
                    Jobs  
                </a>
            </li>
            <!--<li>
                <a class="navbar-brand" href="#">
                    <button class="for_button" style="font-family: 'OpenSans Bold';font-size: 14px;">Live Chat</button>
                </a>
            </li>-->
        </ul>      
    </div>
</div>
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'Syslytic.com'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//syslytic.com/livehelp/index.php/vnm/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/1?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
