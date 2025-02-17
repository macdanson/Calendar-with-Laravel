<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = [];

        $appointments = Appointment::with(['client', 'employee'])->get();

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->client->name . ' (' . $appointment->employee->name . ')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }

        return view('home', compact('events'));
    }
}
