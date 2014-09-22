
     $(function(){

        var calendar_option = {

            startdate		: $.cal.date().addDays(1-$.cal.date().format('N')), // Week beginning sunday.

            allowresize		: true,
            allowmove		: true,
            allowselect		: true,
            allowremove		: true,
            allownotesedit	: false,
            allowedit	    : true,

            //maskdatelabel	: 'D',
            maskmonthlabel	: 'D',


            eventremove : function( uid ){
                if (confirm("<?php echo($confirm_message_delete); ?>")) {
                    deleteOneEvent(uid);
                }
                else{
                    return false;
                }
            },

            eventeditevent : function( uid,obj ){
                editOneEvent(uid);
            },

            eventmove : function( uid,obj ){
                 if (confirm("<?php echo($confirm_message_edit); ?>")) {
                     var begin_date,end_date;

                     begin_date = obj.begins.format('Y-m-d H:i:s');
                     end_date   = obj.ends.format('Y-m-d H:i:s');
                     moveOneEvent(uid,begin_date,end_date);
                 }
                 else{

                     moveBackEvent(uid,obj);
                     return false;
                 }

            },

            eventresize: function(uid,obj){
                 if (confirm("<?php echo($confirm_message_edit_time); ?>")) {
                     var begin_date,end_date;

                     begin_date = obj.begins.format('Y-m-d H:i:s');
                     end_date   = obj.ends.format('Y-m-d H:i:s');
                     moveOneEvent(uid,begin_date,end_date);
                 }
                 else{
                     moveBackEvent(uid,obj);
                     return false;
                 }
            },

            // Use the random event generator to build a set of random events.
            events : getEvents()

        };

        var calendar_option_day = {

             startdate		: $.cal.date().addDays(1-$.cal.date().format('N')), // Week beginning sunday.

             allowresize	: true,
             allowmove		: true,
             allowselect	: true,
             allowremove	: true,
             allownotesedit	: false,
             allowedit	    : true,

             daystodisplay	: 1,


             eventremove : function( uid ){
                 if (confirm("<?php echo($confirm_message_delete); ?>")) {
                     deleteOneEvent(uid);
                 }
                 else{
                     return false;
                 }
             },

             eventeditevent : function( uid ){
                 editOneEvent(uid);
             },

             eventmove : function( uid,obj ){
                 if (confirm("<?php echo($confirm_message_edit); ?>")) {
                     var begin_date,end_date;

                     begin_date = obj.begins.format('Y-m-d H:i:s');
                     end_date   = obj.ends.format('Y-m-d H:i:s');
                     moveOneEvent(uid,begin_date,end_date);
                 }
                 else{
                     moveBackEvent(uid,obj);
                     return false;
                 }

             },

             eventresize: function(uid,obj){
                 if (confirm("<?php echo($confirm_message_edit_time); ?>")) {
                     var begin_date,end_date;

                     begin_date = obj.begins.format('Y-m-d H:i:s');
                     end_date   = obj.ends.format('Y-m-d H:i:s');
                     moveOneEvent(uid,begin_date,end_date);
                 }
                 else{
                     moveBackEvent(uid,obj);
                     return false;
                 }
             },

             // Use the random event generator to build a set of random events.
             events : getEvents()

         };

        var calendar_option_month = {

             startdate		: $.cal.date().addDays(1-$.cal.date().format('N')), // Week beginning sunday.

             allowresize	: true,
             allowmove		: true,
             allowselect	: true,
             allowremove	: true,
             allownotesedit	: false,
             allowedit	    : true,

             monthstodisplay	: 1,


             eventremove : function( uid ){
                 if (confirm("<?php echo($confirm_message_delete); ?>")) {
                     deleteOneEvent(uid);
                 }
                 else{
                     return false;
                 }
             },

             eventeditevent : function( uid ){
                 editOneEvent(uid);
             },

             eventmove : function( uid,obj ){

                 if (confirm("<?php echo($confirm_message_edit); ?>")) {
                     var begin_date,end_date;

                     begin_date = obj.begins.format('Y-m-d H:i:s');
                     end_date   = obj.ends.format('Y-m-d H:i:s');
                     moveOneEvent(uid,begin_date,end_date);
                 }
                 else{
                     moveBackEvent(uid,obj);
                     return false;
                 }

             },

             eventresize: function(uid,obj){
                 if (confirm("<?php echo($confirm_message_edit_time); ?>")) {
                     var begin_date,end_date;

                     begin_date = obj.begins.format('Y-m-d H:i:s');
                     end_date   = obj.ends.format('Y-m-d H:i:s');
                     moveOneEvent(uid,begin_date,end_date);
                 }
                 else{
                     moveBackEvent(uid,obj);
                     return false;
                 }
             },

             // Use the random event generator to build a set of random events.
             events : getEvents()

         };

        $calendar = $('#calendar').cal(calendar_option);


        function moveBackEvent(uid,obj)
        {
            var old_date =  getDateTimeMeeting(uid);

            if(old_date[0] && old_date[1]){

                obj.begins = old_date[0];
                obj.ends   = old_date[1];

                $calendar.cal( 'update',obj );
            }
        }
        /**
         * Set the initial header value.
         */
        $('#date_head').dateRange( $calendar.cal( 'option', 'startdate' ), $calendar.cal( 'option', 'startdate' ).addDays( $calendar.cal('option','daystodisplay')-1 ) );


        $('#update-all-calendar').on('click',function(){
                $calendar.cal('destroy')
                calendar_option.events = getEvents();
                $calendar.cal(calendar_option);
        });
        /**
         * Button click handler.
         *
         * TODO: Turn this into a drop-in module for calendars once we've got the capability to
         * 		 toggle calendar views without reloading. Include 'formatRange' method.
         */
        $('#controls').on('click','button[name]',function(){

            var $this = $(this), action = $this.attr('name');

            // If this is already the current state, just exit.
            if( $this.is('.on') ) return;

            // Switch to the new state.
            switch( action ) {

            /**
             * TODO: For now... ideally you'd be able to toggle between views without reloading.
             */
                case 'day'		: $calendar.cal('destroy');$calendar.cal(calendar_option_day);$('button[name="week"]').parent().removeClass('on');$('button[name="month"]').parent().removeClass('on');$('button[name="day"]').parent().addClass('on');   break;
                case 'week'		: $calendar.cal('destroy');$calendar.cal(calendar_option); $('button[name="day"]').parent().removeClass('on');$('button[name="month"]').parent().removeClass('on');$('button[name="week"]').parent().addClass('on');break;
                case 'month'	: $calendar.cal('destroy');$calendar.cal(calendar_option_month); $('button[name="week"]').parent().removeClass('on');$('button[name="day"]').parent().removeClass('on');$('button[name="month"]').parent().addClass('on');break;

                case 'prev'		:
                case 'today'	:
                case 'next'		:

                    var today	 = $.cal.date(),
                        starting = $calendar.cal('option','startdate'),
                        duration = $calendar.cal('option','daystodisplay'),
                        newstart = starting,
                        newend;

                    switch( action ){
                        case 'next' : newstart = starting.addDays(duration); $('button[name="today"]').parent().removeClass('on'); break;
                        case 'prev'	: newstart = starting.addDays(0-duration); $('button[name="today"]').parent().removeClass('on'); break;
                        case 'today': newstart = $.cal.date().addDays(1-$.cal.date().format('N')); break;
                        case 'day'  : daystodisplay = 1; break;
                    }

                    // Work out the new end date.
                    newend = newstart.addDays(duration-1);

                    // Set the new startdate.
                    $calendar.cal( 'option','startdate', newstart );


                    if( today >= newstart && today <= newend ) $('button[name="today"]').parent().addClass('on');

                    // Set the new date in the header.
                    $('#date_head').dateRange( newstart, newend )
                    break;
            }
        });
    });

    /**
     * jQuery dateRange plugin 1.0.0
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author		: Sam Sehnert | sam@teamdf.com
     * @dependancy 	: http://github.com/teamdf/jquery-calendar/ ($.cal.date)
     *
     * Formats and displays a minimal text representation of a date range.
     */
    (function($){

        // The plugin name. Override if you find namespace collisions.
        var plugin_name = 'dateRange';

        // Set the plugin defaults.
        var defaults = {
            month		: 'jS',
            year		: 'jS M',
            full		: 'jS M Y',
            separator	: ' - '
        }

        /**
         * The plugin function which does the date formatting magic.
         *
         * @param mixed start			: The start of the range. A date object, or a parseable date string.
         * @param mixed end				: The end of the range. A date object, or a parseable date string.
         * @param object options		: An object containing settings (date formats to print under different conditions).
         *
         * @return jQuery Collection;
         */
        $.fn[plugin_name] = function( start, end, options ){

            // Settings to the defaults.
            var settings = $.extend({},defaults);

            // Make sure these are extended date objects.
            start	= $.cal.date(start);
            end		= $.cal.date(end);

            // If options exist, lets merge them
            // with our default settings.
            if( options ) $.extend( settings, options )

            var diffDays	= start.format('Ymd') != end.format('Ymd'),
                diffMonths	= diffDays ? start.format('Ym') != end.format('Ym') : false,
                diffYears	= diffMonths ? start.format('Y') != end.format('Y') : false,
                startFormat	= diffYears || !diffDays ? settings.full : ( diffMonths ? settings.year : settings.month );

            // Return the formatted date.
            return this.text(start.format(startFormat)+( diffDays ? settings.separator+end.format(settings.full) : '' ));
        }

    })(jQuery);


     function getEvents(  )
     {

         var events 		= [];
         var meetings 		= [];

         response = $.ajax({
             type:      'POST',
             url:       "<?php echo($get_events_method); ?>",
             async:     false,
             data:      { 'PE-CSRF-TOKEN':"<?php echo Yii::app()->request->csrfToken ?>"  },
             dataType:  'json'
         }).responseText;

         var result = $.parseJSON(response);

         if(result.meetings){
             meetings = result.meetings;

            for( var e=0; e<meetings.length; e++ ){

                events[e] = {
                    uid     : meetings[e].uid,
                    begins	: meetings[e].date_begin,
                    ends	: meetings[e].date_end,
                    notes	: meetings[e].notes,
                    color	: '<?php echo($color);?>'
                };
            }

            return events;
         }

         return false;
     }

     function moveOneEvent(uid,begin_date,end_date){
         response = $.ajax({
             type:      'POST',
             url:       "<?php echo($update_event_method); ?>",
             async:     false,
             data:      { 'PE-CSRF-TOKEN':"<?php echo Yii::app()->request->csrfToken ?>",'uid':uid, 'begin_date':begin_date, 'end_date':end_date  },
             dataType:  'json'
         }).responseText;
     }

     function deleteOneEvent(uid){
         response = $.ajax({
             type:      'POST',
             url:       "<?php echo($delete_event_method); ?>",
             async:     false,
             data:      { 'PE-CSRF-TOKEN':"<? echo Yii::app()->request->csrfToken ?>",'uid':uid  },
             dataType:  'json'
         }).responseText;
     }

     function getDateTimeMeeting(uid){

         var old_date = [];

         response = $.ajax({
             type:      'POST',
             url:       "<?php echo($get_event_method); ?>",
             async:     false,
             data:      { 'PE-CSRF-TOKEN':"<?php echo Yii::app()->request->csrfToken ?>",'uid':uid  },
             dataType:  'json'
         }).responseText;

         var result = $.parseJSON(response);

         if(result.meeting_time_start_year &&
            result.meeting_time_start_month &&
            result.meeting_time_start_day &&
            result.meeting_time_start_hour &&
            result.meeting_time_start_min){
                    old_date[0] = new Date(result.meeting_time_start_year,result.meeting_time_start_month,result.meeting_time_start_day,result.meeting_time_start_hour,result.meeting_time_start_min,0);
            }
         if(result.meeting_time_end_year &&
            result.meeting_time_end_month &&
            result.meeting_time_end_day &&
            result.meeting_time_end_hour &&
            result.meeting_time_end_min){
                    old_date[1] = new Date(result.meeting_time_end_year,result.meeting_time_end_month,result.meeting_time_end_day,result.meeting_time_end_hour,result.meeting_time_end_min,0);
            }

         return old_date;
     }

    function  editOneEvent(uid){

         var iphone = false;
         if (!(navigator.userAgent.match(/iPhone/i)) && !(navigator.userAgent.match(/iPod/i))) {
            iphone = true;
         }

        var url = "<?php echo($edit_event_method); ?>/id/"+uid;


        $.fancybox({
            'type': 'iframe',
            href: url,
            hideOnOverlayClick: false,
            margin: 0,
            width: 700,
            autoScale: iphone,
            onComplete: function() {
                $('#fancybox-frame').load(function() {
                    $('#fancybox-content').height($(this).contents().find('body').height() + 20);
                    $("#fancybox-overlay").height(document.body.scrollHeight);
                    $.fancybox.center();
                });
            },
            onClosed: function() {
                return false;
            }
        });
        return false;


    }






