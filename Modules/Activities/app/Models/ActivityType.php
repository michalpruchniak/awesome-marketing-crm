<?php

namespace Modules\Activities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
