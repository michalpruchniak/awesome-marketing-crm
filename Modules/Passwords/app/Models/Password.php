<?php

namespace Modules\Passwords\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Customers\Models\Customer;
use Modules\Passwords\Enums\PasswordType;

class Password extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'customer_id',
        'name',
        'type',
        'host',
        'login',
        'password',
        'port',
        'notes',
    ];

    protected $casts = [
        'type' => PasswordType::class,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
