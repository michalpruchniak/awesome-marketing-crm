<?php

namespace Modules\Customers\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activities\Models\Activity;
use Modules\Histories\Models\History;
use Modules\Passwords\Models\Password;
use Modules\Sites\Models\Site;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'active',
        'lead'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function histories() {
        return $this->hasMany(History::class);
    }

    public function latestHistories($limit = 5) {
        return $this->histories()
                    ->orderBy('created_at', 'desc')
                    ->take($limit)
                    ->get();
    }

    public function sites() {
        return $this->hasMany(Site::class);
    }

    public function passwords() {
        return $this->hasMany(Password::class);
    }

    public function activities() {
        return $this->belongsToMany(Activity::class);
    }
}
