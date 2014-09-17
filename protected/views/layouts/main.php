<?php /* @var $this Controller */ ?>
<?php require_once 'functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicons/apple-touch-icon-144x144-precomposed.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-114x114-precomposed.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-72x72-precomposed.png"/>
        <link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.png"/>
        <link rel="icon" href="img/favicons/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sliders.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/lib/jquery-1.10.1.min.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/lib/jquery-1.10.1.min.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.interchange.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.abide.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.dropdown.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.placeholder.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.forms.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.alerts.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.magellan.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.reveal.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.tooltips.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.clearing.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.cookie.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.joyride.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.orbit.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.section.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.topbar.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/holder.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/timers.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/calendar.js"></script>
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
        <!--<title><?php // echo CHtml::encode($this->pageTitle);  ?></title>-->
    </head>
    <body>
        <div id="header">
            <div class="header-top">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="logo small-4 large-3 large-uncentered columns">
                            <a href="<?php echo Yii::app()->homeUrl; ?>" class="">
                                <img id="logo1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_1.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
                            </a>
                        </div>
                        <div class="top-login small-4 large-3 columns">
                            <div class="top-user">
                                <?php
                                if (Yii::app()->user->isGuest) {
                                    echo'<a href="' . $this->createUrl('/site/login') . '" data-dropdown="profile" data-options="is_hover:true" class="top-user-link" alt="Вход" title="Вход">Войти</a>';
                                } else {
                                    echo'<a href="' . $this->createUrl('/site/logout') . '" class="top-user-link" alt="Выйти" title="Выйти">Выйти</a>';
                                }
                                ?>
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
                            <div class="first-my timerhello">
                                <div class="first-my-content">
					<p class="titloftimer">До ближайшего события:</p> 
					<p class="titles">
                                            <span class="dd">дней</span>
                                            <span class="hh">часов</span>
                                            <span class="mm">минут</span>
                                            <span class="ss">секунд</span>
					</p>
                                        <p class="result">
                                            <span style="color: rgb(0, 0, 0);" class="result-day">59</span>
                                            <span style="color: rgb(0, 0, 0);" class="result-hour">01</span>  
                                            <span style="color: rgb(0, 0, 0);" class="result-minute">16</span>
                                            <span style="color: rgb(0, 0, 0);" class="result-second">11</span> 
                                        </p> 
                                    <div class="clear"></div>
				</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="top-nav">
            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Главная', 'url' => array('/site/index')),
                        // array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        // array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label' => 'Новости', 'url' => array('/events/news')),
                        array('label' => 'Соревнования', 'url' => array('/competition/index')),
                        array('label' => 'Тренировки', 'url' => array('/competition/training')),
                        array('label' => 'Статьи', 'url' => array('/events/article')),
                        array('label' => 'Члены клуба', 'url' => array('/user/index')),
                        array('label' => 'Ссылки', 'url' => array('/link/index')),
                        array('label' => 'Регистрация', 'url' => array('/user/registration')),
                        array('label' => 'Фото-галерея', 'url' => array('/photo/galery')),
                        // array('label'=>'Онас', 'url'=>array('/site/page', 'view'=>'about')),
                        // array('label'=>'Контакты', 'url'=>array('/site/contact')),
                    ),
                ));
                ?>	
            </div>
        </div>
        <div class="slideshow-holder row">            
            <div class="slideshow-wrapper large-8 columns">
                <?php
                        $request = Yii::app()->request->requestUri;
                        $sliders = Sliders::model()->findAll();
                        if ($sliders != NULL) {
                            if ($request == '/' || $request == '/index.php/site/index' || $request == '/index.php' ) {
                                echo get_sliders();
                            }
                        }
                ?>
            <?php if (isset($this->breadcrumbs)): $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs)); endif ?>
            </div>
            <div class="cal large-4 columns">
                <div id="cal_placeholder"></div> 
            </div>
        </div>
        <div class="row">
            <div id="news-content" class="large-8 small-12 columns">
                <div id="page">
                    <div class="row">
                        <div class="section-container">
                            <section>
                                <div class="content" data-section-content>
                                     <?php echo $content; ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div id="banner-content" class="large-4 small-12 columns">
                <div class="row">
                    <div class="small-12 columns">
                        <ul class="no-bullet small-block-grid-4 large-block-grid-1">
                            <?php
                                 echo Banners::getAllBanners();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="large-12 columns">
                <div class="quote">
                    <?php
                        echo get_quote();
                    ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="row">
                <div class="large-12 small-11 columns">
                    <div class="large-4 columns">
                        <ul class="no-bullet left">
                            <li><a href="/index.php/competition/index">Соревнования</a></li>
                            <li><a href="/index.php/competition/training">Тренировки</a></li>
                            <li><a href="/index.php/events/article">Статьи</a></li>
                            <li><a href="/index.php/user/index">Члены клуба</a></li>
                            <li><a href="/index.php/link/index">Ссылки</a></li>
                            <li><a href="/index.php/photo/galery">Фото-галлерея</a></li>
                        </ul>
                    </div>
                    <div class="large-4 columns">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    <div class="large-4 columns">
                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?98"></script>
                        <div class="small-12 small-centered large-8 large-centered columns">
                            <!-- VK Widget -->
                            <div id="vk_groups"></div>
                            <script type="text/javascript">
//                                 VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "200", color1: 'D02B23', color2: 'FFFFFF', color3: 'EA5F58'}, 20003922);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="row">
                    <div class="small-12 columns">
                        <span>&#169; КСО Компас, Харьков 2013</span>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            <?php
                echo get_competition_day_for_calendar();
            ?> 
            $(document).ready(function(){ 
                getfrominputs();
            });	
       
            addLoadEvent(function() {
            cal = new fcp.Calendar(document.getElementById("cal_placeholder"));
//            cal.onselect = function(date) {alert(date);}; 
            } )
        </script>
        <style>
            table.calendar, table.calendar caption, table.calendar td.in_month {	border: 1px solid black; background-color: #FFFFCC;  text-align: center; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
            table.calendar td.in_month {  width:18px; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
            table.calendar td.selected {  background-color: yellow; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
            table.calendar a {	display: block; 	font-weight: bold; 	text-decoration: none; 	color: #0000ff;  text-align: center; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
            table.calendar caption a { 	display: inline;  FONT-WEIGHT: normal; FONT-SIZE: 8pt;  COLOR: red;  FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
        </style>
    </body>
</html>