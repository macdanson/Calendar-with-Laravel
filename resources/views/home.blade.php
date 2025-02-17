@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/themes/light.css">

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,listWeek'
                    },
                    eventDidMount: function(info) {
                        // console.log(info.event.extendedProps);
                        const tooltipContent = `
                            <strong>${info.event.title}</strong><br>
                            <em>${info.event.start.toLocaleString()}</em><br>
                            ${info.event.extendedProps.comment || ''}
                        `;

                        tippy(info.el, {
                            content: tooltipContent,
                            theme: 'light',
                            placement: 'top',
                            arrow: true,
                            allowHTML: true, // Enable HTML content in the tooltip
                        });
                    },
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
    @endpush
@endsection
