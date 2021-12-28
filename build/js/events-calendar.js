var $ = jQuery.noConflict();

class Events_calendar {

    constructor() {

        this.init_elements();
        this.init_event_handlers();

        // set locale
        moment.locale('he');

        this.moment = moment();
        this.current = moment().clone();
        this.current_end_week = moment().clone().add(6, 'days');
        this.current_start_week = moment().clone();
        this.month = moment().clone().format('MM');
        this.year = moment().clone().format('YYYY');
        this.slide_end_week = false;
        this.months = ['ינואר', 'פבואר', 'צרץ', 'אפריל', 'מאי', 'יוני', 'יולי', 'אוגוסט', 'ספטמבר', 'אוקטובר', 'נובמבר', 'דצמבר'];
        this.days = ['א', 'ב', 'ג', 'ד', 'ה', 'ו', 'ש'];
        this.date_picker_obj;

        this.init_sticky_calendar();
        this.init_date_picker();
        this.init_select();
    }

    init_elements() {
        this.body = $('body');
        this.wrapper = $('.events-calendar');
        this.days_wrapper = $('.calendar-wrap .days-wrap');
        this.month_selector = $('.month-select');
        this.year_selector = $('.year-select');
        this.mobile_days_slider = $('.days-slider');
        this.buttons = this.wrapper.find('.calendar-wrap button');
        this.days_slider = $('.days-slider-wrapper');
    }

    init_event_handlers() {

        this.body.on('click', '.events-calendar li', this.change_day.bind(this));
        this.body.on('click', '.days-slider .button', this.change_day_slide.bind(this));
        // this.select_wrapper.on( 'click', this.open_select.bind(this) );
        // this.select_options.on( 'click', this.select_callback.bind(this) );
        // $( '.select-wrap select' ).on( 'change',this.select_callback.bind(this));
        // this.wrapper.find('[type="hidden"]').on( 'change', this.update_dates.bind(this) );
        this.buttons.on('click', this.buttons_callback.bind(this));

    }

    init_select() {

        var _this = this;

        _this.month_select_obj = this.month_selector.selectize({
            create: false,
            showEmptyOptionInDropdown: true,
            closeAfterSelect: true,
            onChange: function(value) {

                _this.month = value;
                _this.select_callback();
                hide_mobile_keyboard();
            }
        });

        _this.year_select_obj = this.year_selector.selectize({
            create: false,
            showEmptyOptionInDropdown: true,
            closeAfterSelect: true,
            onChange: function(value) {
                _this.year = value;
                _this.select_callback();
                hide_mobile_keyboard();
            }
        });
    }

    init_date_picker() {
        this.date_picker_obj = datepicker('.calendar-btn', {
            customDays: this.days,
            customMonths: this.months,
            customOverlayMonths: this.months,
            el: '.events-calendar',
            position: 'bl',
            minDate: new Date(),
            // maxDate: new Date( dates ),
            // events: formatted_date,
            onShow: instance => {
                hide_mobile_keyboard();
            },

            onSelect: instance => {
                this.calendar_change_date(instance.dateSelected);
            },
        });
    }

    calendar_change_date(date) {

        this.moment = moment(date);
        var day = this.moment.clone().format('D');
        this.change_slide();
    }

    init_sticky_calendar() {
        var _this = this;
        var stickyTop = _this.wrapper.offset().top;
        let headerHeight = $('.site-header').height();

        if ($(window).width() < 576) {
            headerHeight = 45;
        }

        $(window).scroll(function() {
            var windowTop = $(window).scrollTop();
            if (windowTop + headerHeight >= stickyTop) {
                _this.body.addClass('calendar-fixed');
                $(_this.wrapper).css('transform', 'translateY(' + (windowTop - stickyTop + headerHeight) + 'px)');
            } else {
                _this.body.removeClass('calendar-fixed');
                $(_this.wrapper).css('transform', 'translateY(' + 0 + 'px)');
            }
        });
    }

    select_callback() {
        // get user date
        var month = this.month;
        var year = this.year;

        // create moment date
        var chosen_date = moment(year + '/' + month + '/01');
        this.moment = chosen_date;
        this.set_weekdays();


    }

    buttons_callback(e) {

        var _this = $(e.currentTarget);
        this.direction = 'next';

        if (_this.hasClass('prev')) {
            this.direction = 'prev';
        }

        this.handle_week_switch();

    }

    update_calender(year, month, month_name, week = false, day = false) {

        if (month != this.month) {
            this.month_select_obj[0].selectize.setValue(month, false);
            this.month = month;
        }

        if (year != this.year) {
            this.year_select_obj[0].selectize.setValue(year, false);
            this.year = year;
        }

    }

    set_day(day) {
        var _this = this;
        $('.calendar-wrap li.active').removeClass('active');
        $('.calendar-wrap li[data-value="' + day + '"]').addClass('active');
        if (window.matchMedia('(max-width: 992px)').matches) {
            _this.ajax_results(day);


        }
    }

    change_day(e) {
        e.preventDefault();
        var _this = $(e.currentTarget);
        var day = _this.attr('data-value');
        var date = this.moment.clone().date(day);
        var index = _this.index();

        if (!_this.hasClass('active')) {
            this.day_html_slide(date, day);
            this.set_day(day);
            this.scroll_to_anchor(e);
        }
    }

    change_day_slide(e) {
        var _this = $(e.currentTarget);

        if (_this.hasClass('button-next')) {
            this.moment.add(1, 'day');

        } else {
            this.moment.subtract(1, 'day');
        }

        this.change_slide();
    }

    day_html_slide(date, day) {
        var slide = '<div class="slide" data-date="' + date.format('d-M-YYYY') + '">' + 'יום ' + date.format('ddd, D MMM YYYY') + '</div>';
        this.days_slider.find('> div').fadeOut().remove();
        this.days_slider.html(slide);
    }

    change_slide() {
        var date = this.moment.clone(),
            day = date.format('D');

        if (date.isSameOrAfter(this.current)) {

            this.day_html_slide(date, day);

            if (date.isAfter(this.current_end_week)) {

                this.current_end_week = date.clone().add(6, 'days');
                this.current_start_week = date;

                this.set_weekdays();

            }

            if (date.isBefore(this.current_start_week)) {

                this.moment = date.clone().subtract(6, 'days');
                this.current_end_week = this.moment.clone().add(6, 'days');


                this.current_start_week = this.moment.clone();
                this.set_weekdays();

                this.moment = date.clone();
            }

            this.set_day(day);

        }
    }

    change_week() {
        var _this = this;

        if (_this.direction) {
            if (_this.direction === 'prev') {
                _this.moment.subtract(1, 'weeks');
            } else {
                // set 1 week from current
                _this.moment.add(1, 'weeks');
            }
        }
    }

    handle_slider_week_change(direction) {

        var _this = this;

        _this.direction = direction;
        _this.days_slider.allowSlideNext = true;
        _this.change_week();
        _this.set_mobile_slider_weekdays();
    }

    handle_week_switch(is_slider = false) {

        var _this = this;

        _this.change_week();

        var weekStart = _this.moment.clone();

        // set new week days
        _this.moment = weekStart;

        this.set_weekdays();

        this.direction = false;

        if (!is_slider) {
            $('html, body').animate({
                scrollTop: parseInt($('#day-1').offset().top) - 200
            }, 300);
        }

    }

    get_days() {

        var _this = this,
            start_week = _this.moment.clone(),
            days = [];

        for (var i = 0; i <= 6; i++) {
            var date = moment(start_week).add(i, 'days');
            var month = date.format('MM');
            var month_name = date.format('MMMM');
            var year = date.format('Y');

            _this.update_calender(year, month, month_name);

            var day = {
                date: date.format('D'),
                text: date.format('dddd'),
                text_short: date.format('ddd').replace('׳', ''),
                text2: 'יום ' + date.format('dddd, D MMM YYYY'),
            };

            days.push(day);
        };

        return days;
    }

    set_mobile_slider_weekdays() {
        var _this = this,
            days = _this.get_days(),
            start_week = _this.moment.clone();

        if (days) {

            var slides = [];
            days.forEach(function(day_args, index, array) {
                slides.push('<div class="swiper-slide" data-value="' + day_args.date + '"><span class="text">' + day_args.text2 + '</span></div>');
            });
            this.days_slider.appendSlide(slides);
        }
    }

    set_weekdays() {

        var _this = this,
            days = _this.get_days(),
            start_week = _this.moment.clone();

        if (days) {

            var html = '<ul>';
            days.forEach(function(day_args, index, array) {
                html += '<li data-value="' + day_args.date + '" ' + (index === 0 ? 'class="active"' : '') + ' >' +
                    '<a href="#day-' + parseInt(index + 1) + '">' +
                    '<span class="text"><span class="hide-mobile">' + day_args.text + '</span><span class="hide-desktop">' + day_args.text_short + '</span></span>' +
                    '<span class="num">' + day_args.date + '</span>' +
                    '</a>' +
                    '</li>';
            });


            html += '</ul>';


            // append days html
            if (_this.current.isSameOrAfter(start_week)) {
                _this.wrapper.find('button.prev').prop('disabled', true);
            } else {
                _this.wrapper.find('button.prev').prop('disabled', false);
            }

            this.days_wrapper.html(html);
            this.ajax_results();
        }
    }

    ajax_results(day = false) {
        var _this = this;

        $('.results-wrap').append('<span class="results-overlay"><span class="ajax-loader black"></span></span>');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: siteObject.ajaxurl,
            data: {
                'action': 'get_events',
                'start_week': _this.moment.format('YYYY-MM-DD'),
                'end_week': _this.moment.clone().add(7, 'days').format('YYYY-MM-DD'),
            },
            success: function(results) {

                $('.results-wrap .results-overlay').remove();

                if (results.ok) {
                    $('.results-wrap').html(results.html);
                    $('.events-results .entry-result[data-day="' + day + '"]').removeClass('hide-mobile').siblings().addClass('hide-mobile');

                }
            }
        });
    }

    open_select(e) {
        var element = $(e.currentTarget);
        element.toggleClass('open');
    }

    scroll_to_anchor(e) {
        var element = $(e.currentTarget);
        var anchorDestination = element.find('a').attr('href');
        var sticky_height = $('.events-calendar').height();
        // Make sure this.hash has a value before overriding default behavior
        if (anchorDestination) {
            var offset = parseInt($(anchorDestination).offset().top - sticky_height);
            $('html, body').animate({
                scrollTop: offset
            }, 300);
        }
    }
}

var calendar = new Events_calendar();
