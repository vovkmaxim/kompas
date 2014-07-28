<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicons/apple-touch-icon-144x144-precomposed.png"/>
	<!-- For iPhone with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-114x114-precomposed.png"/>
	<!-- For first- and second-generation iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-72x72-precomposed.png"/>
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.png"/>
	<link rel="icon" href="img/favicons/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"/>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
	<!--<title><?php // echo CHtml::encode($this->pageTitle); ?></title>-->
</head>

<body>

<div class="container" id="page">

<!--	<div id="header">
		<div id="logo"><?php // echo CHtml::encode(Yii::app()->name); ?></div>
	</div> header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Banners', 'url'=>array('banners/index')),
                                array('label'=>'Ссылки', 'url'=>array('link/index')),
                                array('label'=>'Quote', 'url'=>array('quote/index')),
                                array('label'=>'Group', 'url'=>array('group/index')),
                                array('label'=>'Users', 'url'=>array('user/index')),
                                array('label'=>'Role', 'url'=>array('role/index')),
                                array('label'=>'Ranks', 'url'=>array('rank/index')),
                                array('label'=>'Group Photo', 'url'=>array('groupPhoto/index')),
                                array('label'=>'Events', 'url'=>array('events/index')),
                                array('label'=>'Competition', 'url'=>array('competition/index')),
                                array('label'=>'File', 'url'=>array('file/index')),
                                array('label'=>'Photo', 'url'=>array('photo/index')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
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
                <br/><br/><br/><br/>
             
	<?php echo $content; ?>

	<div class="clear">

        </div>

	<div id="footer">
            	Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		Author Maxim Vovk
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
