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
                    " 'id':". $competitions->id .","
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
        
    return $images_sliders . $headline_sliders;
}
