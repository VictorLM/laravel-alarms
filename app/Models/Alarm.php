<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alarm extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alarms';

    protected $fillable = ['name', 'description', 'classification', 'deactivated_at', 'equipment_id'];

    /**
     * Get the Equipment that owns the Alarm.
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    /**
     * Get the Actuations for the Alarm.
     */
    public function actuations(): HasMany
    {
        return $this->hasMany(AlarmActuation::class);
    }
}
