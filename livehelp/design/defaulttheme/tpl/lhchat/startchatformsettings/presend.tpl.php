<div id="messages" class="mb10">
    <div class="msgBlock" <?php if (erLhcoreClassModelChatConfig::fetch('mheight')->current_value > 0) : ?>style="height:<?php echo (int)erLhcoreClassModelChatConfig::fetch('mheight')->current_value?>px"<?php endif?> id="messagesBlock">
        <?php $formIdentifier = '#form-start-chat';?>
     	<?php include(erLhcoreClassDesign::designtpl('lhchat/startchatformsettings/presend_script.tpl.php'));?>
   </div>
</div>