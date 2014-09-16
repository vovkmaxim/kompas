<?php
/* Функция генерации календаря */


    $user = User::model()->findAll('status=:status AND member=:member', array(':status' => 1, ':member' => 1));
    $user_dey_list = array();
    
    $USERS_BIRD = "";
    $USERS_BIRD .= "  var user_day = {";
         
    $user_i = 0;
    foreach ($user as $users) {
        $user_i++;
        $mas_data = explode('-', $users->data_birth);
        $USERS_BIRD .= "".$user_i.": {".
                    " 'data_day':". $mas_data[2] .",".
                    " 'data_mont':". $mas_data[1] .",".
                    " 'id':". $users->id .","
                . "},";
    }
    $USERS_BIRD .=    "'length':".$user_i;
    $USERS_BIRD .=    "};";
    
    $competition = Competition::model()->findAll();
    $competition_data = array();
    $competition_day=' var competitions = {';
    
    $competition_i = 0;
    foreach ($competition as $competitions) {
        $competition_i++;
        
        $start_data = explode('-', $competitions->start_data);
        $start_data1 = explode(' ', $start_data[2]);
        $end_data = explode('-', $competitions->end_data);
        $end_data1 = explode(' ', $end_data[2]);        
        $competition_day .= "".$competition_i.": {".
                    " 'start_data_mont':". $start_data[1] .",".
                    " 'start_data_day':". $start_data1[0] .",".
                    " 'end_data_mont':". $end_data[1] .",".
                    " 'end_data_day':". $end_data1[0] .",".
                    " 'type':". $competitions->type .",".
                    " 'id':". $competitions->id .","
                . "},";
    }
    $competition_day .=    "'length':".$competition_i;
    $competition_day .=    "};";
   

?>
<?php /* @var $this Controller */ ?>
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
        
        
        
        
        <?php
            $sliders = Sliders::model()->findAll();
            $images_sliders = '<ul data-orbit>';
            $headline_sliders = '<div class="orbit-headline">';
            $i = 0;
            foreach ($sliders as $slider) {
                $i++;
               $headline_sliders .= '<a href="#" data-orbit-link="headline-'.$i.'"> --- '.$i.' --- </a>';
               $images_sliders .= '<li data-orbit-slide="headline-'.$i.'">'; 
               $images_sliders .= ' <img src="/sliders/' . $slider->path . '" width="640" height="360"/>'; 
               $images_sliders .= '</li>'; 
            }
            $images_sliders .= '</ul>';
            $headline_sliders .= '</div>';
        ?>
        
        
        <div class="slideshow-holder row">            
            <div class="slideshow-wrapper large-8 columns">
                <?php
                        $request = Yii::app()->request->requestUri;
                        if ($sliders != NULL) {
                            if ($request == '/' || $request == '/index.php/site/index' || $request == '/index.php' ) {
//                                echo $images_sliders;
//                                echo $headline_sliders;
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
                        $Quote = new Quote();
                        $quote = $Quote->getRandQuote();
                            echo '<blockquote>' . $quote->quote . '<cite> ' . $quote->author_quote . '</cite></blockquote>';
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
                            <!--<li><a href="#">О нас</a></li>-->
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
            function get_timer(string) {
                var date_new = string;
                var date_t = new Date(date_new);
                var date = new Date();
                var timer = date_t - date;
                if(date_t > date) {	
                    var day = parseInt(timer/(60*60*1000*24));	
                    if(day < 10) {	
                        day = "0" + day;
                    }
                    day = day.toString();
                    var hour = parseInt(timer/(60*60*1000))%24;
                    if(hour < 10) {
                        hour = "0" + hour;
                    }
                    hour = hour.toString();
                    var min = parseInt(timer/(1000*60))%60;
                    if(min < 10) {
                        min = "0" + min;
                    }
                    min = min.toString();
                    var sec = parseInt(timer/1000)%60;
                    if(sec < 10) {
                        sec = "0" + sec;
                    }
                    sec = sec.toString();
                    timethis = day + " : " + hour + " : " + min + " : " + sec;
                    $(".timerhello p.result .result-day").text(day);
                    $(".timerhello p.result .result-hour").text(hour);
                    $(".timerhello p.result .result-minute").text(min);
                    $(".timerhello p.result .result-second").text(sec);
                }
                else {
                    $(".timerhello p.result .result-day").text("00");
                    $(".timerhello p.result .result-hour").text("00");
                    $(".timerhello p.result .result-minute").text("00");
                    $(".timerhello p.result .result-second").text("00");
                }	 }
            
            function getfrominputs(){
                string = "11/10/2014 12:00"; 
                get_timer(string);
                setInterval(function(){
                    get_timer(string);
                },1000);}
            
            $(document).ready(function(){ 
                getfrominputs();
            });	
        </script>
       
        
        
        
        <script type="text/javascript">
<?php
        echo $USERS_BIRD;
        echo $competition_day;
?> 

if (!fcp)
	var fcp = new Object();
if (!fcp.msg)
	fcp.msg = new Object();
if (!fcp)
	var fcp = new Object();
if (!fcp.msg)
	fcp.msg = new Object();
fcp.week_days = ["Пн", "Вт", "Ср", "Чт", "Пн", "Сб", "Вс"];
fcp.months = ["январь", "февраль", "март", "апрель", "май", "июнь",
	"июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
fcp.msg.prev_year = "пред г";
fcp.msg.prev_month = "пред м";
fcp.msg.next_month = "след м";
fcp.msg.next_year = "след г";
fcp.Calendar = function(element, show_clock) {
	if (!element.childNodes)
		throw "HTML element expected";
	this.element = element;
	this.selection = new Date();
	this.show_clock = show_clock;
	this.selected_cell = undefined;
	this.generate_month();
	this.render_calendar();
}
fcp.Calendar.prototype.set_date_time = function (date_time) {
	if (date_time.constructor == Date) {
		this.selection = date_time;
		this.generate_month();
		this.render_calendar();
	} else {
		throw "Date object expected (in fcp.Calendar.set_date_time)";
	}
}
fcp.Calendar.prototype.next_month = function () {
	var month = this.selection.getMonth();
	if (month == 11) {
		this.selection.setMonth(0);
		this.selection.setYear(this.selection.getFullYear() + 1);
	} else {
		this.selection.setMonth(month + 1);
	}
	this.generate_month();
	this.render_calendar();
}
fcp.Calendar.prototype.prev_month = function () {
	var month = this.selection.getMonth();
	if (month == 0) {
		this.selection.setMonth(11);
		this.selection.setYear(this.selection.getFullYear() - 1);
	} else {
		this.selection.setMonth(month - 1);
	}
	this.generate_month();
	this.render_calendar();
}
fcp.Calendar.prototype.next_year = function () {
	var is_feb29 = (this.selection.getMonth() == 1)
		&& (this.selection.getDate() == 29);
	if (is_feb29) {
		this.selection.setDate(1);
		this.selection.setMonth(2); // March
	}
	this.selection.setFullYear(this.selection.getFullYear() + 1);
	this.generate_month();
	this.render_calendar();
}
fcp.Calendar.prototype.prev_year = function () {
	var is_feb29 = (this.selection.getMonth() == 1)
		&& (this.selection.getDate() == 29);
	if (is_feb29) {
		this.selection.setDate(1);
		this.selection.setMonth(2); // March
	}
	this.selection.setFullYear(this.selection.getFullYear() - 1);
	this.generate_month();
	this.render_calendar();
}
fcp.Calendar.prototype.generate_month = function () {
	this.raw_data = new Array();
	var week = 0;
	this.raw_data[week] = new Array(7);
	var first_of_month = fcp.Calendar.clone_date(this.selection);
	first_of_month.setDate(1);
	var first_weekday = first_of_month.getDay();
	first_weekday = (first_weekday == 0) ? 6 : first_weekday - 1;
	for (var i = 0; i < first_weekday; i++) {
		this.raw_data[week][i] = 0;
	}
	var last_of_month = fcp.Calendar.days_in_month(
		this.selection.getYear(),
		this.selection.getMonth());
	var weekday = first_weekday;
	for (var i = 1; i <= last_of_month; i++) {
		this.raw_data[week][weekday] = i;
		weekday++;
		if (weekday > 6) {
			weekday = 0;
			week++;
			this.raw_data[week] = new Array(7);
		}
	}
	for (var i = weekday; i < 7; i++) {
		this.raw_data[week][i] = 0;
	}
}
fcp.Calendar.prototype.render_calendar = function () {
	this.element.selected_cell = undefined;
	this.element.innerHTML = "";
	this.element.appendChild(this.render_month());
}
fcp.Calendar.prototype.render_heading = function () {
	var heading = document.createElement("caption");
	var prev_year = document.createElement("a");
	prev_year.href = "#";
	prev_year.calendar = this;
	prev_year.onclick = function() {
		this.calendar.prev_year();
		return false;
	};
	prev_year.innerHTML = "пред год |";
	prev_year.title = fcp.msg.prev_year;
	var prev_month = document.createElement("a");
	prev_month.href = "#";
	prev_month.calendar = this;
	prev_month.onclick = function() {
		this.calendar.prev_month();
		return false;
	};
	prev_month.innerHTML = "пред мес|<br>";
	prev_month.title = fcp.msg.prev_month;
	var month_year = document.createTextNode(
		"\u00a0" + fcp.months[this.selection.getMonth()]
		+ " " + this.selection.getFullYear() + "\u00a0");
	var next_month = document.createElement("a");
	next_month.href = "#";
	next_month.calendar = this;
	next_month.onclick = function() {
		this.calendar.next_month();
		return false;
	};
	next_month.innerHTML = "<br>|сл мес";
	next_month.title = fcp.msg.next_month;
	var next_year = document.createElement("a");
	next_year.href = "#";
	next_year.calendar = this;
	next_year.onclick = function() {
		this.calendar.next_year();
		return false;
	};
	next_year.innerHTML = "|сл год";
	next_year.title = fcp.msg.next_year;
	heading.appendChild(prev_year);
	heading.appendChild(document.createTextNode("\u00a0"));
	heading.appendChild(prev_month);
	heading.appendChild(month_year);
	heading.appendChild(next_month);
	heading.appendChild(document.createTextNode("\u00a0"));
	heading.appendChild(next_year);
	return heading;
}
fcp.Calendar.prototype.render_month = function() {
	var html_month = document.createElement("table");
	html_month.className = "calendar";
	html_month.appendChild(this.render_heading());
	var thead = document.createElement("thead");
	var tr = document.createElement("tr");
	for (var i = 0; i < fcp.week_days.length; i++) {
		var th = document.createElement("th");
		th.innerHTML =  fcp.week_days[i];
		tr.appendChild(th);
	}
	thead.appendChild(tr);
	html_month.appendChild(thead);
	var tbody = document.createElement("tbody");
	for (var i = 0; i < this.raw_data.length; i++) {
		tbody.appendChild(this.render_week(this.raw_data[i]));
	}
	html_month.appendChild(tbody);
	return html_month;
}
fcp.Calendar.prototype.render_week = function (day_numbers) {
	var html_week = document.createElement("tr");
	html_week.align = "right";
	for (var i = 0; i < 7; i++) {
		html_week.appendChild(this.render_day(day_numbers[i]));
	}
	return html_week;
}
fcp.Calendar.prototype.render_day = function (day_number) {
	var td = document.createElement("td");
	if (day_number >= 1 && day_number <= 31) {
                var day_flag_link = true;
                var mont = this.selection.getMonth() + 1;
                
                for(var i=1; i <= user_day.length; i++){
                    if(user_day[i]['data_day'] == day_number && user_day[i]['data_mont'] == mont){
                        day_flag_link = false;
                        var anchor = document.createElement("a");
                        anchor.href = "#";
                        anchor.innerHTML = '--' +day_number + '--';
                        anchor.calendar = this;
                        anchor.date = day_number;
                        td.appendChild(anchor);
                        if (day_number == this.selection.getDate()) {
                                this.selected_cell = td;
                                td.className = "in_month selected";
                        } else {
                                td.className = "in_month";
                        }
                    }
                }
                
                for(var i=1; i <= competitions.length; i++){
                    if( ( competitions[i]['start_data_day'] == day_number && mont == competitions[i]['start_data_mont'] ) ){// || ( competitions[i]['end_data_day'] == day_number && mont == competitions[i]['end_data_mont'] ) ){
                        if(competitions[i]['type'] == 1){
                            // Trening
                            day_flag_link = false;
                            var anchor = document.createElement("a");
                            anchor.href = "#";
                            anchor.innerHTML = '+1+' +day_number + '+1+'; 
                            anchor.calendar = this;
                            anchor.date = day_number;
                            td.appendChild(anchor);
                            if (day_number == this.selection.getDate()) {
                                    this.selected_cell = td;
                                    td.className = "in_month selected";
                            } else {
                                    td.className = "in_month";
                            }
                            break;
                        } 
                    if(competitions[i]['type'] == 2){
                            // Competitions
                            day_flag_link = false;
                            var anchor = document.createElement("a");
                            anchor.href = "#";
                            anchor.innerHTML = '+2+' +day_number + '+2+';
                            anchor.calendar = this;
                            anchor.date = day_number;
                            td.appendChild(anchor);
                            if (day_number == this.selection.getDate()) {
                                    this.selected_cell = td;
                                    td.className = "in_month selected";
                            } else {
                                    td.className = "in_month";
                            }
                            break;
                        }
                        
                    }
                }
                
                
                
                if(day_flag_link){
                   var anchor = document.createElement("a");
                    anchor.href = "#";
                    anchor.innerHTML = '' +day_number + '';
                    anchor.calendar = this;
                    anchor.date = day_number;
    //		anchor.onclick = fcp.Calendar.handle_select;
                    td.appendChild(anchor);
                    if (day_number == this.selection.getDate()) {
                            this.selected_cell = td;
                            td.className = "in_month selected";
                    } else {
                            td.className = "in_month";
                    } 
                }		
	}
	return td;
}
fcp.Calendar.prototype.onselect = function () {}
fcp.Calendar.clone_date = function (date_obj) {
	if (date_obj.constructor != Date)
		throw "Date object expected (in fcp.Calendar.clone_date)";
	else
		return new Date(
			date_obj.getFullYear(),
			date_obj.getMonth(),
			date_obj.getDate(),
			date_obj.getHours(),
			date_obj.getMinutes(),
			date_obj.getSeconds());
}
fcp.Calendar.days_in_month = function (year, month) {
	if (month < 0 || month > 11)
		throw "Month must be between 0 and 11";
	var day_count = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	if (month != 1) {
		return day_count[month];
	} else if ((year % 4) != 0) {
		return 28;
	} else if ((year % 400) == 0) {
		return 29;
	} else if ((year % 100) == 0) {
		return 28;
	} else {
		return 29;
	}
}
fcp.Calendar.handle_select = function () {
	if (this.calendar.selected_cell)
		this.calendar.selected_cell.className = "in_month";
	this.calendar.selected_cell = this.parentNode;
	this.parentNode.className = "in_month selected";
	this.calendar.selection.setDate(this.date);
	this.calendar.onselect(this.calendar.selection);
	return false;
}
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}
addLoadEvent(function() {
  cal = new fcp.Calendar(document.getElementById("cal_placeholder"));
  cal.onselect = function(date) {alert(date);}; 
  } )
//-->
        </script>
<style>
table.calendar, table.calendar caption, table.calendar td.in_month {	border: 1px solid black; background-color: #FFFFCC;  text-align: center; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
table.calendar td.in_month {  width:18px; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
table.calendar td.selected {  background-color: yellow; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
table.calendar a {	display: block; 	font-weight: bold; 	text-decoration: none; 	color: #0000ff;  text-align: center; FONT-WEIGHT: normal; FONT-SIZE: 8pt; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
table.calendar caption a { 	display: inline;  FONT-WEIGHT: normal; FONT-SIZE: 8pt;  COLOR: red;  FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif}
</style>
        
        <div id="cal_placeholder"></div> 
    </body>
</html>