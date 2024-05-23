<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlarmActuation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alarms_actuations';

    /**
     * Get the Alarm that owns the Actuation.
     */
    public function alarm(): BelongsTo
    {
        return $this->belongsTo(Alarm::class, 'alarm_id', 'id');
    }
}
