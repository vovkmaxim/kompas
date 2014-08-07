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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sliders.css" />
        
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js" type="text/javascript"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/holder.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/zepto.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.horizontalNav.js" type="text/javascript"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/lib/jquery-1.10.1.min.js"></script>
        
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
	<!--<title><?php // echo CHtml::encode($this->pageTitle); ?></title>-->
</head>

<body>

<div class="container" id="page">
<div id="header">
	<div class="header-top">
	<div class="row">
		<div class="small-12 columns">
			<div class="logo small-4 large-3 large-uncentered columns">
				<a href="index.php" class="">
					<img id="logo1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_1.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
				</a>
			</div>
			
			<div class="top-login small-4 large-3 columns">
				<div class="top-user">
					<a href="#" data-dropdown="profile" data-options="is_hover:true" class="top-user-link" alt="Вход" title="Вход">Войти</a>
					<ul id="profile" class="f-dropdown" data-dropdown-content>
					  <li><a href="#">Личные данные</a></li>
					  <li><a href="#">Заявки</a></li>
					  <li><a href="#">Клубная форма</a></li>
					  <li><a href="#">Вопросы</a></li>
					  <li><a href="#">Выход</a></li>
					</ul>
				</div>
				<div class="top-contact">
					<a href="#" data-dropdown="calendar" data-options="is_hover:true" class="calendar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-calendar.png" alt="Календарь" title="Календарь"/></a>
					<div id="calendar" class="f-dropdown" data-dropdown-content>
					</div>
					<div class="top-tell"><span></span>+3(067) 857 75 86</div>
					<div class="top-email">example@gmail.com</div>
				</div>
			</div>
			<div class="top-banner small-12 large-6 small-centered large-uncentered columns">
				<img data-src="holder.js/100%x72/social" alt="top banner">
			</div>
		</div>
	</div>
	</div>
</div>
<!--	<div id="header">
		<div id="logo"><?php // echo CHtml::encode(Yii::app()->name); ?></div>
	</div> header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Новости', 'url'=>array('/events/news')),
                                array('label'=>'Соревнования', 'url'=>array('/competition/index')),
                                array('label'=>'Тренировки', 'url'=>array('/competition/training')),
                                array('label'=>'Статьи', 'url'=>array('/events/article')),
                                array('label'=>'Члены клуба', 'url'=>array('/user/index')),
                                array('label'=>'Ссылки', 'url'=>array('/link/index')),
                                array('label'=>'Регистрация', 'url'=>array('/user/registration')),
                                array('label'=>'Фото-галерея', 'url'=>array('/photo/galery')),
				array('label'=>'Онас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Контакты', 'url'=>array('/site/contact')),
			),
		)); ?>
	</div><!-- mainmenu -->
        
        <?php
        $sliders = Sliders::model()->findAll();
        $request = Yii::app()->request->requestUri;
        if($sliders!=NULL){
            if($request == '/' || $request == '/index.php?r=site/index'){ ?>
        <!--<div class="slideshow-holder row">-->
	  <!--<div class="slideshow-wrapper large-8 columns">-->
<div id="slider-wrap">
	<div id="slider">
		
<?php
foreach($sliders as $slider){
?>
            <div class="slide"><img src="sliders/<?php echo $slider->path; ?>" width="640" height="360"></div>
<?php } ?>
	</div>
</div>
       
        <?php 
            }
        }       
        ?>
           <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sliders.js"></script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript">
		$(document).ready(function() {
			
			$('.fancybox').fancybox();

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
        
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
