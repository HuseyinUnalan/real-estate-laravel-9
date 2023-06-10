@extends('admin.admin_master')
@section('admin')
    <script src='{{ asset('backend/assets/dist/index.global.js') }}'></script>

    <div class="container">
        <button type="button" class="btn font-16 btn-primary waves-effect waves-light" id="btn-new-event"
            data-bs-toggle="modal" data-bs-target="#event-modal">New Event</button>

        <a href="{{ route('all.calendar') }}" class="btn font-16 btn-danger waves-effect waves-light">Edit & Delete</a>
    </div>



    <!-- Add New Event MODAL -->
    <div class="modal fade" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-3 px-4">
                    <h5 class="modal-title" id="modal-title">Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body p-4">
                    <form action="{{ route('store.calendar') }}" method="POST" class="needs-validation">
                        @csrf

                        <div class="row">

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Event Name</label>
                                    <input class="form-control" placeholder="Insert Event Name" type="text"
                                        name="eventname" id="event-title" required value="">
                                    <div class="invalid-feedback">Please provide a valid event name
                                    </div>
                                </div>

                            </div> <!-- end col-->

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input class="form-control" type="date" name="date" id="event-title" required
                                        value="">
                                    <div class="invalid-feedback">Please provide a valid event name
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Time</label>
                                    <input class="form-control" type="time" name="time" id="event-title" required
                                        value="">
                                    <div class="invalid-feedback">Please provide a valid event name
                                    </div>
                                </div>
                            </div> <!-- end col-->

                        </div> <!-- end row-->
                        <div class="row mt-2">
                            <div class="col-6">
                                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                            </div> <!-- end col-->
                            <div class="col-6 text-end">
                                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                    </form>
                </div>
            </div>
            <!-- end modal-content-->
        </div>
        <!-- end modal dialog-->
    </div>
    <!-- end modal-->




    @php
        use Carbon\Carbon;
        $date = Carbon::now();
    @endphp


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                initialDate: '{{ $date }}',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events



                events: [
                    @foreach ($calendars as $calendar)
                        {
                            title: '{{ $calendar->eventname }}',
                            start: '{{ $calendar->date }}T{{ $calendar->time }}',
                        },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>


    <style>
        body {
            margin: 100px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 100%;
            margin: 10px 10px;
        }
    </style>
    </head>

    <body>

        <div id='calendar'></div>

    </body>

    </html>
@endsection
