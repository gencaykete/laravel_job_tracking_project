"use strict";

if (typeof dates !== 'undefined')
{
    var KTAppCalendar = function() {
        // Shared variables
        // Calendar variables
        var calendar;
        var data = {
            id: '',
            eventName: '',
            eventDescription: '',
            eventLocation: '',
            startDate: '',
            endDate: '',
            allDay: false
        };
        var popover;
        var popoverState = false;

        // Add event variables
        var eventName;
        var eventDescription;
        var eventLocation;
        var startDatepicker;
        var startFlatpickr;
        var endDatepicker;
        var endFlatpickr;
        var startTimepicker;
        var startTimeFlatpickr;
        var endTimepicker
        var endTimeFlatpickr;
        var modal;
        var modalTitle;
        var form;
        var validator;
        var addButton;
        var submitButton;
        var cancelButton;
        var closeButton;

        // View event variables
        var viewEventName;
        var viewAllDay;
        var viewEventDescription;
        var viewEventLocation;
        var viewStartDate;
        var viewEndDate;
        var viewModal;
        var viewEditButton;
        var viewDeleteButton;


        // Private functions
        var initCalendarApp = function() {
            // Define variables
            var calendarEl = document.getElementById('organization-calendar');
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialDate: TODAY,
                navLinks: true,
                selectable: false,
                selectMirror: true,
                editable: false,
                dayMaxEvents: false,
                events: dates,
                locale: 'tr',
                contentHeight:"auto",
                datesSet: function() {
                }
            });

            calendar.render();
        }

        // Generate unique IDs for events
        const uid = () => {
            return Date.now().toString() + Math.floor(Math.random() * 1000).toString();
        }

        return {
            // Public Functions
            init: function() {
                initCalendarApp();
            }
        };
    }();

// On document ready
    KTUtil.onDOMContentLoaded(function() {
        KTAppCalendar.init();
    });
}
