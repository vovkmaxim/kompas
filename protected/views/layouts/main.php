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
						<!-- Calendar -->
						<div class="cal">
						  <table class="cal-table">
							<caption class="cal-caption">
							  <a href="#" class="prev">&laquo;</a>
							  <a href="#" class="next">&raquo;</a>
							  May 2012
							</caption>
							<tbody class="cal-body">
							  <tr>
								<td class="cal-off"><a href="#">30</a></td>
								<td><a href="#">1</a></td>
								<td><a href="#">2</a></td>
								<td class="cal-today"><a href="#">3</a></td>
								<td><a href="#">4</a></td>
								<td><a href="#">5</a></td>
								<td><a href="#">6</a></td>
							  </tr>
							  <tr>
								<td><a href="#">7</a></td>
								<td class="cal-selected"><a href="#">8</a></td>
								<td><a href="#">9</a></td>
								<td><a href="#">10</a></td>
								<td><a href="#">11</a></td>
								<td class="cal-check"><a href="#">12</a></td>
								<td><a href="#">13</a></td>
							  </tr>
							  <tr>
								<td><a href="#">14</a></td>
								<td><a href="#">15</a></td>
								<td><a href="#">16</a></td>
								<td class="cal-check"><a href="#">17</a></td>
								<td><a href="#">18</a></td>
								<td><a href="#">19</a></td>
								<td><a href="#">20</a></td>
							  </tr>
							  <tr>
								<td><a href="#">21</a></td>
								<td><a href="#">22</a></td>
								<td><a href="#">23</a></td>
								<td><a href="#">24</a></td>
								<td><a href="#">25</a></td>
								<td><a href="#">26</a></td>
								<td><a href="#">27</a></td>
							  </tr>
							  <tr>
								<td><a href="#">28</a></td>
								<td><a href="#">29</a></td>
								<td><a href="#">30</a></td>
								<td><a href="#">31</a></td>
								<td class="cal-off"><a href="#">1</a></td>
								<td class="cal-off"><a href="#">2</a></td>
								<td class="cal-off"><a href="#">3</a></td>
							  </tr>
							</tbody>
						  </table>
						</div>
						<!-- End Calendar -->
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
<div id="top-nav">
	<nav class="top-bar row full-width">
		<div class="small-12 columns">
			  <ul class="title-area">
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar"><a href="#"><span>Меню</span></a></li>
			  </ul>

	  <section class="top-bar-section">
		<!-- Left Nav Section -->
		<ul class="left">
		  <li><a href="news.html">Новости</a></li>
		  <li><a href="competition.html">Соревнования</a></li>
		  <li><a href="trennings.html">Тренировки</a></li>
		  <li><a href="article.html">Статьи</a></li>
		  <li><a href="team.html">Члены клуба</a></li>
		  <li><a href="#">Ссылки</a></li>
		  <li><a href="#">Фото-галлерея</a></li>
		  <li><a href="#">О нас</a></li>
		</ul>
	  </section>
	  </div>

	</nav>
</div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Онас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Контакты', 'url'=>array('/site/contact')),
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Ссылки', 'url'=>array('/link/index')),
                                array('label'=>'Регистрация', 'url'=>array('/user/registration')),
			),
		)); ?>
	</div><!-- mainmenu -->
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
