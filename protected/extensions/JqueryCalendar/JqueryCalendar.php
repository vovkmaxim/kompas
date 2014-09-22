<?php

/**
 * Class JqueryCalendar
 */

class JqueryCalendar extends CWidget {

    public $events              = array();
    public $get_events_method   = null;
    public $color               = '#31A5B3';

    public $delete_event_method = null;
    public $update_event_method = null;
    public $select_event_method = null;
    public $edit_event_method   = null;
    public $get_event_method    = null;


    private $assetsDir;


    public function init(){

        $this->assetsDir = dirname(__FILE__) . '/assets';

        //Yii::app()->assetManager->publish($this->assetsDir);

        $script = $this->getInitCalendar();


//        $loadingImageUrl = Yii::app()->assetManager->publish(
//            Yii::getPathOfAlias('ext.JqueryCalendar.assets').'/images/edit.png'
//        );

        $js  = Yii::app()->assetManager->publish(
            $this->assetsDir. '/js/jquery.calendar.js'
        );

        $cs      = Yii::app()->assetManager->publish(
            $this->assetsDir . '/css/jquery.calendar.css'
        );

        $cs_main = Yii::app()->assetManager->publish(
            $this->assetsDir . '/css/calendar_main.css'
        );

        Yii::app()->clientScript
        ->registerCoreScript('jquery')
        ->registerScriptFile($js)
        ->registerCssFile($cs)
        ->registerCssFile($cs_main)
        ->registerScript('JqueryCalendar', $script);
    }

    public function run()
    {

        $this -> render('calendar');
    }


    public function getInitCalendar()
    {
        $get_events_method   = $this->get_events_method;
        $color               = $this->color;
        $delete_event_method               = $this->delete_event_method;
        $update_event_method               = $this->update_event_method;
        $select_event_method               = $this->select_event_method;
        $edit_event_method                 = $this->edit_event_method;
        $get_event_method                  = $this->get_event_method;

        $confirm_message_delete            = Yii::t('yii', 'Do you really want to cancel this meeting?');
        $confirm_message_edit              = Yii::t('yii', 'Do you really want to move this meeting?');
        $confirm_message_edit_time         = Yii::t('yii', 'Do you really want to change the duration of the meeting??');


        return $this->render('calendar_init',compact('get_event_method','confirm_message_edit_time','confirm_message_edit','confirm_message_delete','edit_event_method','get_events_method','color','delete_event_method','update_event_method','select_event_method'),true);
    }

}