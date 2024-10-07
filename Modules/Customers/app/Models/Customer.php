<?php

namespace Modules\Customers\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Histories\Models\History;

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
}
