<?php

namespace Modules\Sites\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customers\Models\Customer;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'customer_id',
        'url'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
