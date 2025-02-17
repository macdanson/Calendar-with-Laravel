<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'finish_time',
        'comments',
        'client_id',
        'employee_id',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($appointment) {
            $appointment->finish_time = Carbon::parse($appointment->start_time)->addHour();
        });

        static::updating(function ($appointment) {
            if ($appointment->isDirty('start_time')) {
                $appointment->finish_time = date('Y-m-d H:i:s', strtotime($appointment->start_time . ' +2 hours'));
            }
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
