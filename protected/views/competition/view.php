<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs = array(
    'Сореноание' => array('index'),
    $model->title,
);
?>

<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript">
		$(document).ready(function() {
                        $(".fancybox").fancybox({
                                openEffect	: 'none',
                                closeEffect	: 'none'
                        });
                });
	</script>


<div class="large-12 columns">
    <div id="news-item" class="large-12 small-12 columns">
        <h3>«<?php echo $model->title . ' (' . $model->getThisDate() . ')'; ?>»</h3>
        <?php
        if ($file->itemCount) {
            echo $model->getFileForThisCompetition();
        }
        ?>
        <!--<span class="date-time"><p>Дата начала: <?php echo $model->start_data; ?>  - время начала: <?php echo $model->start_time; ?></p></span>-->
        <!--<span class="date-time"><p>Дата окончания: <?php echo $model->end_data; ?>  - время окончания: <?php echo $model->end_time; ?></p></span>-->
        <div class="img-content">
            
            <div class="small-3 large-4 columns">
                <a class="fancybox th radius"  href="/logo_competition/<?php echo $model->logo_desc; ?>">
                    <?php echo $model->getLogoImage(); ?>
                </a>
            </div>
        </div>
        <p><?php echo $model->text; ?></p>
        <div id="mymap" class="large-12 small-12 columns"></div>
        <div class="row">
            <div class="large-6 small-12 columns">
                <!--<div class="tags">Теги: ориентирование, компас</div>-->
                <!--<div><img src="/images/ico-socials.png" alt="socials"></div>-->
            </div>
            <!--<div class="large-6 small-12 columns" style="text-align: center;">-->

            <!--</div>-->
            <!--<span class="date-time"><p>Дата создания: </h4><?php // echo $model->create_date; ?></p></span>-->                       
            <?php
            if ($model->enable_registration_flag == 1) {
                echo '<h6>Окончание регистрации: ' . $model->explodeThisDate($model->close_registration_data) .  '</h6>';
                if (!Yii::app()->user->isGuest) {
                    echo '<p><span class="button1"><a href="#">Подать заявку</a></span></P>';
                } else {
                    echo '<h6> Для подачи заявки нужно войти в систему! </h6>';
                }
            }
            ?>   
        </div>
        <script type="text/javascript">
            
            $( ".button1" ).click(function() {
                $( ".form-competition" ).toggle( "slow" );
            });
            
            
            
            function submmitCompetitionRequest(form){
                var send_flag = true;
                competition_id = form.elements["CompetitionRequest[competition_id]"].value;
                lastname = form.elements["CompetitionRequest[lastname]"].value;
                user_id = form.elements["CompetitionRequest[user_id]"].value;
                coutry = form.elements["CompetitionRequest[coutry]"].value;
                dyusch = form.elements["CompetitionRequest[dyusch]"].value;
                status = form.elements["CompetitionRequest[status]"].value;
                coach = form.elements["CompetitionRequest[coach]"].value;
                name = form.elements["CompetitionRequest[name]"].value;
                chip = form.elements["CompetitionRequest[chip]"].value;
                sity = form.elements["CompetitionRequest[sity]"].value;
                team = form.elements["CompetitionRequest[team]"].value;
                fst = form.elements["CompetitionRequest[fst]"].value;
                year_bird = form.elements["year_bird"].value;
                group_id = form.elements["group_id"].value;
                rank = form.elements["rank"].value;
                check_data_element = document.getElementById('check_data');
                var result_check_data = [];
                var options = check_data_element && check_data_element.options;
                var opt;

                for (var i=0, iLen=options.length; i<iLen; i++) {
                    opt = options[i];
                    if (opt.selected) {
                      result_check_data.push(opt.value || opt.text);
                    }
                }
                check_data = result_check_data.join(', ');
                
                if(check_data == ''){
                    document.getElementById('CompetitionRequest_check_data_error').innerHTML = "Необходимо указать дни участия.";
                    send_flag = false;
                }
                
                if(lastname == 'Фамилия'){
                    document.getElementById('CompetitionRequest_lastname_error').innerHTML = "Необходимо заполнить поле «Фамилия».";
                    send_flag = false;
                }
                if(coutry == 'Страна'){
                    document.getElementById('CompetitionRequest_coutry_error').innerHTML = "Необходимо заполнить поле «Страна».";
                    send_flag = false;
                }
                if(coach == 'Тренер'){
                    document.getElementById('CompetitionRequest_coach_error').innerHTML = "Необходимо заполнить поле «Тренер».";
                    send_flag = false;
                }
                if(name == 'Ваше имя'){
                    document.getElementById('CompetitionRequest_name_error').innerHTML = "Необходимо заполнить поле «Имя».";
                    send_flag = false;
                }
                if(sity == 'Город'){
                    document.getElementById('CompetitionRequest_sity_error').innerHTML = "Необходимо заполнить поле «Город»."
                    send_flag = false;
                }
                if(fst == 'ФСТ'){
                    document.getElementById('CompetitionRequest_fst_error').innerHTML = "Необходимо заполнить поле «ФСТ»."
                    send_flag = false;
                }
                if(group_id == 0){
                    document.getElementById('CompetitionRequest_group_id_error').innerHTML = "Необходимо указать группу. "
                    send_flag = false;
                }
                if(rank == 0){
                    document.getElementById('CompetitionRequest_rank_error').innerHTML = "Необходимо указать Ваш «Разряд». "
                    send_flag = false;
                }
                if(team == "Команда"){
                    document.getElementById('CompetitionRequest_team_error').innerHTML = "Необходимо заполнить поле «Команда»."
                    send_flag = false;
                }
                if(year_bird == "Год рождения"){
                    document.getElementById('CompetitionRequest_year_bird_error').innerHTML = "Необходимо заполнить поле «Год рождения»."
                    send_flag = false;
                }
                
                if(!send_flag){
                    form.elements["CompetitionRequest[competition_id]"].value = competition_id;
                    form.elements["CompetitionRequest[lastname]"].value = lastname;
                    form.elements["CompetitionRequest[user_id]"].value = user_id;
                    form.elements["CompetitionRequest[coutry]"].value = coutry;
                    form.elements["CompetitionRequest[dyusch]"].value = dyusch
                    form.elements["CompetitionRequest[status]"].value = status;
                    form.elements["CompetitionRequest[coach]"].value = coach;
                    form.elements["CompetitionRequest[name]"].value = name;
                    form.elements["CompetitionRequest[chip]"].value = chip;
                    form.elements["CompetitionRequest[sity]"].value = sity;
                    form.elements["CompetitionRequest[team]"].value = team;
                    form.elements["CompetitionRequest[fst]"].value = fst;
                    form.elements["year_bird"].value = year_bird;
                    form.elements["group_id"].value = group_id;
                    form.elements["rank"].value = rank;
                } else {
                    CompetitionRequest = [];
                    document.getElementById('CompetitionRequest_lastname_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_coutry_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_coach_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_name_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_sity_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_fst_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_group_id_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_rank_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_team_error').innerHTML = "";
                    document.getElementById('CompetitionRequest_year_bird_error').innerHTML = "";
                    
                    CompetitionRequest = {};
                    CompetitionRequest["lastname"] = lastname;
                    CompetitionRequest["user_id"] = user_id;
                    CompetitionRequest["coutry"] = coutry;
                    CompetitionRequest["dyusch"] = dyusch;
                    CompetitionRequest["status"] = status;
                    CompetitionRequest["coach"] = coach;
                    CompetitionRequest["name"] = name;
                    CompetitionRequest["chip"] = chip;
                    CompetitionRequest["sity"] = sity;
                    CompetitionRequest["team"] = team;
                    CompetitionRequest["fst"] = fst;
                    CompetitionRequest["year_bird"] = year_bird;
                    CompetitionRequest["group_id"] = group_id;
                    CompetitionRequest["rank"] = rank;
                    CompetitionRequest["competition_id"] = competition_id;
                    $.ajax({
                        type: "POST",
                        url: "/index.php/competition/addrequest/<?php echo $model->id; ?>",
                        data: ({
                            CompetitionRequest: CompetitionRequest,     
                            year_bird: year_bird,
                            group_id: group_id,
                            rank: rank,
                            check_data: check_data
                        }),
                        success: function(data) {
                          var obj = jQuery.parseJSON( data );
                          if(obj.success){
                               alert(obj.message);
                               $.ajax({
                                    type: "POST",
                                    url: "/index.php/competition/updatevievs/<?php echo $model->id; ?>",
                                    data: ({
                                        id: <?php echo $model->id; ?>
                                    }),
                                    success: function(data) {
                                        document.getElementById('vidjet_views').innerHTML = data;
                                      
                                    }
                                });
                          } else {
                              alert(obj.message);
                          }
                        }
                    });
                }
                return false;
            }
        </script>
         <?php
            if ($model->enable_registration_flag == 1) {
                if (!Yii::app()->user->isGuest) {
         ?>
            <div class="form-competition" style="display: none">
                <form id="competition-request-form" method="post" action="/index.php/competitionRequest/addrequest/<?php echo $model->id; ?>" enctype="multipart/form-data">
                    <div class="box1">
                        <input name="CompetitionRequest[status]" id="CompetitionRequest_status" type="hidden" value="0" maxlength="10" size="10"/>
                        <input name="CompetitionRequest[competition_id]" id="CompetitionRequest_competition_id" type="hidden" value="<?php echo $model->id; ?>" maxlength="10" size="10"/>
                        <input name="CompetitionRequest[user_id]" id="CompetitionRequest_user_id" type="hidden" value="<?php echo Yii::app()->user->id; ?>" maxlength="10" size="10"/>
                        <div id="CompetitionRequest_name_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[name]" id="CompetitionRequest_name" type="text"maxlength="255" value="Ваше имя" onfocus="if (this.value == 'Ваше имя') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Ваше имя'; this.style.color = '#777';}" />
                        <div id="CompetitionRequest_lastname_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[lastname]" id="CompetitionRequest_lastname" type="text" maxlength="255" size="60" value="Фамилия" onfocus="if (this.value == 'Фамилия') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Фамилия'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_year_bird_error" class="errorMessage"></div>
                        <input name="year_bird" type="text" maxlength="4" value="Год рождения" onfocus="if (this.value == 'Год рождения') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Год рождения'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_group_id_error" class="errorMessage"></div>
                        Укажите группу:  </br><?php echo $model->getCheckListGroup(); ?></br>
                        <div id="CompetitionRequest_rank_error" class="errorMessage"></div>
                        Укажите разряд: </br><?php echo $model->getRanksList(); ?></br>
                        <input name="CompetitionRequest[chip]" id="CompetitionRequest_chip" type="text" maxlength="255" value="ЧИП№" onfocus="if (this.value == 'ЧИП№') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'ЧИП№'; this.style.color = '#777';}"/>
                    </div>
                    <div class="box2">
                        <input name="CompetitionRequest[dyusch]" id="CompetitionRequest_dyusch" type="text" maxlength="255" value="ДЮСШ" onfocus="if (this.value == 'ДЮСШ') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'ДЮСШ'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_sity_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[sity]" id="CompetitionRequest_sity"   type="text" maxlength="255" value="Город" onfocus="if (this.value == 'Город') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Город'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_coutry_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[coutry]" id="CompetitionRequest_coutry" type="text" maxlength="255" value="Страна" onfocus="if (this.value == 'Страна') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Страна'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_team_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[team]" id="CompetitionRequest_team" type="text" maxlength="255" value="Команда" onfocus="if (this.value == 'Команда') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Команда'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_coach_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[coach]" id="CompetitionRequest_coach" type="text" maxlength="255" value="Тренер" onfocus="if (this.value == 'Тренер') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'Тренер'; this.style.color = '#777';}"/>
                        <div id="CompetitionRequest_fst_error" class="errorMessage"></div>
                        <input name="CompetitionRequest[fst]" id="CompetitionRequest_fst" type="text" maxlength="255" value="ФСТ" onfocus="if (this.value == 'ФСТ') {this.value = ''; this.style.color = '#000';}" onblur="if (this.value == '') {this.value = 'ФСТ'; this.style.color = '#777';}"/>
                        <?php // echo $model->getChekData();  ?>
                    </div>
                    <div id="CompetitionRequest_check_data_error" class="errorMessage"></div>
                    <?php echo $model->getChekData();  ?>
                    <input type="submit" class="submit" onclick="submmitCompetitionRequest(document.getElementById('competition-request-form'));return false;" value="Отправить" />
                    
                </form>
            </div>
        
                       
          <?php
                }
            }
            ?> 
    </div>


</div>
<div class="people large-12 small-12 columns">
    <?php if ($request->itemCount) { ?>
        <div class="people-about">Уже заявилось:</div>
    <?php } ?>
    <div id='vidjet_views'>        
        <?php
        if ($request->itemCount) {
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'competition-request-grid',
                'dataProvider' => $request,
                'template' => '{pager}{items}{pager}',
                'columns' => array(
                    'id',
                    array(
                        'name' => 'group_id',
                        'type' => 'raw',
                        'value' => '$data->getGroupName()',
                        'filter' => false,
                    ),
                    'name',
                    'lastname',
                    'year',
                    'sity',
                    'coutry',
                    'participation_data',
                    array(
                        'name' => 'Состояние',
                        'type' => 'raw',
                        'value' => '$data->getNameStatus()',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'Представитель',
                        'type' => 'raw',
                        'value' => '$data->getNameUser()',
                        'filter' => false,
                    ),
                ),
            ));
        }
        ?>        
    </div>
        
    <div>
        <?php

            if ($request->itemCount) { 
                if(!Yii::app()->user->isGuest):
                    if(Yii::app()->user->role == 'administrator' || Yii::app()->user->role == 'manager'):
                        echo CHtml::link(CHtml::encode('СКАЧАТЬ ТАБЛИЦУ'), array('excel', 'id'=>$model->id));
                    endif;    
                endif;    
            }

        ?>
    </div>
        
</div>


<div class="comments">
    <?php
    if ($comments->itemCount) {
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $comments,
            'itemView' => '_viewcomment',
        ));
    }
    ?>

</div>
<div id="comments-form" class="form">
    <?php
    if (!Yii::app()->user->isGuest) {
        ?>
        <div class="comment">
            <p>Ваш отзыв:</p>
            <form id="comments-form" method="post" action="/index.php/comments/create">
                <div class="row">
                    <input id="Comments_events_id" type="hidden" value="0" name="Comments[events_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_competition_id" type="hidden" value="<?php echo $model->id; ?>" name="Comments[competition_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_user_id" type="hidden" value="<?php echo Yii::app()->user->id; ?>" name="Comments[user_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_create_date" type="hidden" value="<?php echo date('Y-m-d h:m:s'); ?>" name="Comments[create_date]">
                </div>
                <div class="row">
                    <label for="Comments_title">Тема:</label>
                    <input id="Comments_title" type="text" name="Comments[title]" maxlength="255" size="60">
                </div>
                <div class="row">
                    <label for="Comments_text">Текст:</label>
                    <textarea id="Comments_text" name="Comments[text]" cols="50" rows="6"></textarea>
                </div>
                <div class="row buttons">
                    <input class="button8" type="submit" value="Отправить" />
                </div>
            </form>
        </div>

        <?php
    } else {
        echo '<p>Для того что бы оставить отзыв Вы должны авторезироватся</p>';
    }
    ?>

</div>