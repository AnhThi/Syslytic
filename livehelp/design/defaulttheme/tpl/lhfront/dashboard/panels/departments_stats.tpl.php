<div class="panel panel-default panel-dashboard" data-panel-id="departments_stats">
	<div class="panel-heading">
		<i class="material-icons chat-active">home</i> <?php include(erLhcoreClassDesign::designtpl('lhfront/dashboard/panels/titles/departmetns_stats.tpl.php'));?> ({{departments_stats.list.length}}{{departments_stats.list.length == lhc.limitd ? '+' : ''}})</a>
		<?php if ($currentUser->hasAccessTo('lhstatistic', 'exportxls')) : ?><a class="pull-right material-icons" target="_blank" href="<?php echo erLhcoreClassDesign::baseurl('statistic/departmentstatusxls')?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Download XLS');?>">file_download</a><?php endif;?>
	</div>
	<div>
	    <?php $optinsPanel = array('panelid' => 'departmentd','limitid' => 'limitd'); ?>
		<?php include(erLhcoreClassDesign::designtpl('lhfront/dashboard/panels/parts/options.tpl.php'));?>
		
		<div class="panel-list">
			<table class="table table-condensed mb0 table-small table-fixed">
				<thead>
					<tr>
						<th width="60%"><i title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmininterface','Department');?>" class="material-icons">home</i></th>
						<th width="20%"><i title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmininterface','Pending chats');?>" class="material-icons chat-pending">chat</i></th>
						<th width="20%"><i title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmininterface','Active chats');?>" class="material-icons chat-active">chat</i></th>
					</tr>
				</thead>
				<tr ng-repeat="department in departments_stats.list track by department.id">
					<td>
						<div class="abbr-list" title="{{department.name}}">{{department.name}}</div>
					</td>
					<td>{{department.pending_chats_counter ? department.pending_chats_counter : 0}}</td>
					<td>{{department.active_chats_counter ? department.active_chats_counter : 0}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
