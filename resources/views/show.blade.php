@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Event Details page</h2>
                        {{ $appointment }}
                        <table class="table">
                            <tr>
                                <thead>
                                    <th>Doctor/Staff</th>
                                    <td>{{ $appointment->employee->name }}</td>
                                </thead>
                                <thead>
                                    <th>Client/Patient</th>
                                    <td>{{ $appointment->client->name }}</td>
                                </thead>
                                <thead>
                                    <th>Start Date & Time</th>
                                    <td>{{ $appointment->start_time }}</td>
                                </thead>
                                <thead>
                                    <th>End Date & Time</th>
                                    <td>{{ $appointment->finish_time }}</td>
                                </thead>
                                <thead>
                                    <th>Appointment Details</th>
                                    <td>{{ $appointment->comments }}</td>
                                </thead>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
