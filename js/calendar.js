//var competition = new Object()
//console.log(competition);
//var competition_data = '';
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
fcp.Calendar = function(element, show_clock, year) {
	if (!element.childNodes)
		throw "HTML element expected";
	this.competition_data = year;
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
	prev_month.innerHTML = "<";
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
	next_month.innerHTML = ">";
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
//	heading.appendChild(prev_year);
	heading.className = "cal-caption";
	heading.appendChild(document.createTextNode("\u00a0"));
	heading.appendChild(prev_month);
	heading.appendChild(month_year);
	heading.appendChild(next_month);
	heading.appendChild(document.createTextNode("\u00a0"));
//	heading.appendChild(next_year);
	return heading;
}
fcp.Calendar.prototype.render_month = function() {
	var html_month = document.createElement("table");
	html_month.className = "cal-table";
//	html_month.className = "calendar";
	html_month.appendChild(this.render_heading());
	var thead = document.createElement("thead");
	var tr = document.createElement("tr");
        tr.className = "cal-body";
	for (var i = 0; i < fcp.week_days.length; i++) {
		var th = document.createElement("th");
		th.innerHTML =  fcp.week_days[i];
		tr.appendChild(th);
	}
	thead.appendChild(tr);
	html_month.appendChild(thead);
	var tbody = document.createElement("tbody");
        // cal-body
        tbody.className = "cal-body";
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
                
//                for(var i=1; i <= user_day.length; i++){
//                    if(user_day[i]['data_day'] == day_number && user_day[i]['data_mont'] == mont){
//                        day_flag_link = false;
//                        var anchor = document.createElement("a");
//                        anchor.href = "#";
//                        anchor.innerHTML = day_number;
//                        anchor.calendar = this;
//                        anchor.date = day_number;
//                        td.appendChild(anchor);
//                        if (day_number == this.selection.getDate()) {
//                                this.selected_cell = td;
//                                td.className = "cal-check-U selected"; //  cal-selected
//                        } else {
//                                td.className = "cal-check-U";
//                        }
//                    }
//                }
                
                for(var i=1; i <= competitions.length; i++){
                    if( ( competitions[i]['start_data_day'] == day_number && mont == competitions[i]['start_data_mont'] ) ){// || ( competitions[i]['end_data_day'] == day_number && mont == competitions[i]['end_data_mont'] ) ){
                        if(competitions[i]['type'] == 1 && this.selection.getFullYear() == competitions[i]['year']){
                            // Trening
                            day_flag_link = false;
                            var anchor = document.createElement("a");
                            anchor.href = "/index.php/competition/"+competitions[i]['id'];
//                            anchor.href = "http://o-kompas.local/index.php/competition/"+competitions[i]['id'];
                            anchor.innerHTML = day_number; 
                            anchor.calendar = this;
                            anchor.date = day_number;
                            td.appendChild(anchor);
                            if (day_number == this.selection.getDate()) {
                                    this.selected_cell = td;
                                    td.className = "cal-check-T selected";
                            } else {
                                    td.className = "cal-check-T";
                            }
                            break;
                        } 
                    if(competitions[i]['type'] == 2 && this.selection.getFullYear() == competitions[i]['year'] ){
                            // Competitions
                            day_flag_link = false;
                            var anchor = document.createElement("a");
                            anchor.href = "/index.php/competition/"+competitions[i]['id'];
//                            anchor.href = "http://o-kompas.local/index.php/competition/"+competitions[i]['id'];
                            anchor.innerHTML = day_number;
                            anchor.calendar = this;
                            anchor.date = day_number;
                            td.appendChild(anchor);
                            if (day_number == this.selection.getDate()) {
                                    this.selected_cell = td;
                                    td.className = "cal-check-S selected";
                            } else {
                                    td.className = "cal-check-S";
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
                            td.className = "selected";
                    } else {
                            td.className = "selected";
                    } 
                }	
	} else {
            td.className = "for-cal-a";
        }  
        
        console.log(this.selection.getFullYear());
//        console.log(this.competition_data);
        
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