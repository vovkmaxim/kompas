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