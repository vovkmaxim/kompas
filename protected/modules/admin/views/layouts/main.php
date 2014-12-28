<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="icon" href="img/favicons/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css.map" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css.map" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css" />
        
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js" />
        
        
        
        
        
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
</head>

<body>

<div id="page">

<!--	<div id="header">
		<div id="logo"><?php // echo CHtml::encode(Yii::app()->name); ?></div>
	</div> header -->

	<div id="mainmenu">
		<?php 
                
                $mainmenu = array();
                $mainmenu['items'] = array();
                 array_push($mainmenu['items'], array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest));
                 array_push($mainmenu['items'], array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest));
                 if(Yii::app()->user->role != 'moderator'){
                    array_push($mainmenu['items'], array('label'=>'Слайдер', 'url'=>array('sliders/index')));
                    array_push($mainmenu['items'], array('label'=>'Таймер', 'url'=>array('timers/index')));
                    array_push($mainmenu['items'], array('label'=>'Банера', 'url'=>array('banners/index')));
                    array_push($mainmenu['items'], array('label'=>'Ссылки', 'url'=>array('link/index')));
                    array_push($mainmenu['items'], array('label'=>'Цитаты(Высказывания)', 'url'=>array('quote/index')));
                    array_push($mainmenu['items'], array('label'=>'Группы', 'url'=>array('group/index')));
                    array_push($mainmenu['items'], array('label'=>'Пользователи', 'url'=>array('user/index')));
                    array_push($mainmenu['items'], array('label'=>'Роли', 'url'=>array('role/index')));
                    array_push($mainmenu['items'], array('label'=>'Разряды', 'url'=>array('rank/index')));
                 }
                 array_push($mainmenu['items'], array('label'=>'Группа для фото', 'url'=>array('groupPhoto/index')));
                 array_push($mainmenu['items'], array('label'=>'Новости(Статьи)', 'url'=>array('events/index')));
                 array_push($mainmenu['items'], array('label'=>'Соревнования(Тренировки)', 'url'=>array('competition/index')));
                 array_push($mainmenu['items'], array('label'=>'Файлы', 'url'=>array('file/index')));
                 array_push($mainmenu['items'], array('label'=>'Фото', 'url'=>array('photo/index')));
                 if(Yii::app()->user->role != 'moderator'){
                    array_push($mainmenu['items'], array('label'=>'Заявки на соревнования(тренировки)', 'url'=>array('competitionRequest/index')));
                    array_push($mainmenu['items'], array('label'=>'Комментарии', 'url'=>array('comments/index')));
                 }
                 $this->widget('zii.widgets.CMenu',$mainmenu);

                ?>
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
        
        <div  class="container"><?php echo $content; ?></div>
	<div class="clear"></div>

	<div id="footer">
            	Copyright &copy; <?php echo date('Y'); ?> by O-KOMPAS.<br/>
		All Rights Reserved.<br/>
		Author Maxim Vovk
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
