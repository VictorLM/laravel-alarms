<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'equipments';

    protected $fillable = ['name', 'description', 'serial_number', 'type'];

    /**
     * Get the alarms for the equipment.
     */
    public function alarms(): HasMany
    {
        return $this->hasMany(Alarm::class);
    }
}
