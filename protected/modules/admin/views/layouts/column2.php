<?php /* @var $this Controller */ ?>
<?php // $this->beginContent('//application.modules.admin.views.layouts.main'); ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
    222222222222222222222222
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>