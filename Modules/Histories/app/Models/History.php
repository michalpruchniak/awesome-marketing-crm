<?php

namespace Modules\Histories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Models\Customer;

// use Modules\Histories\Database\Factories\HistoryFactory;

class History extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'customer_id',
        'message'
    ];

    public function customer() {
        return $this->belongTo(Customer::class);
    }
}
