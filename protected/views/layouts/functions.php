<?php

function get_competition_day_for_calendar(){
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
                    " 'id':". $competitions->id .",".
                    " 'year':". $start_data[0] .","
                . "},";
    }
    $competition_day .=    "'length':".$competition_i;
    $competition_day .=    "};";
   
    return $USERS_BIRD . $competition_day;
}


function get_quote(){
    $Quote = new Quote();
    $quote = $Quote->getRandQuote();
    return '<blockquote>' . $quote->quote . '<cite> ' . $quote->author_quote . '</cite></blockquote>';
}

function get_sliders(){
        $sliders = Sliders::model()->findAll();
        $images_sliders = '<ul>';
        
        $script = '<script type="text/javascript"  src="'.Yii::app()->request->baseUrl.'/js/sliders.js"></script>';
        $script .= '<script type="text/javascript">

                            $(function() {
                                $("#slidebox").jCarouselLite({
                                    vertical: false,
                                    hoverPause:true,
                                    btnPrev: ".previous",
                                    btnNext: ".next",
                                    visible: 1,
                                    start: 0,
                                    scroll: 1,
                                    circular: true,
                                    auto:5000,
                                    speed:800,               
                                    btnGo:';
        
        $script_mass = '[';
        $headline_sliders = '<div class="next"></div><div class="previous"></div><div class="thumbs">';
            $i = 0;
            foreach ($sliders as $slider) {
                $i++;
               $script_mass .= '".'.$i.'",';
               $headline_sliders .= '<a href="#" onClick="" class="'.$i.'">' . $slider->hedline . '</a>';
               
               $images_sliders .= '<li>';
               if(!empty($slider->link)){
                    $images_sliders .= '<a href="http://'.$slider->link.'" target="_blank">';
                    $images_sliders .= '<img src="/sliders/' . $slider->path . '" alt="' . $slider->hedline . '" width = "630px" height="300px" />';
                    $images_sliders .= '</a>'; 
               } else {
                    $images_sliders .= '<img src="/sliders/' . $slider->path . '" alt="' . $slider->hedline . '" width = "630px" height="300px" />';  
               }
               $images_sliders .= '</li>'; 
            }
            
        $images_sliders .= '</ul>';
        
        $headline_sliders .= '</div>';
        
        $script_mass .= '],';
        $script .= $script_mass;
        $script .= 'afterEnd: function(a, to, btnGo) {
                                            if(btnGo.length <= to){
                                                to = 0;
                                            }
                                            $(".thumbActive").removeClass("thumbActive");
                                            $(btnGo[to]).addClass("thumbActive");
                                        }
                                });
                            });
</script>';
        
    return $script . $headline_sliders . $images_sliders;
}


function get_timer(){
    $timers = Timers::model()->find('status=:status',array(':status'=> 1));
    if($timers != NULL){
        return '<script type="text/javascript">
                function getfrominputs(){
                    document.getElementById("tile_timers").innerHTML = "'.$timers->titles.'";
                    string = "'. $timers->timer_date .'"; 
                    get_timer(string);
                    setInterval(function(){
                        get_timer(string);
                    },1000);}
                </script>
            ';
    }
    return false;
}