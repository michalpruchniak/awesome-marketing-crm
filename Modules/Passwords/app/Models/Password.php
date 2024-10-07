<?php

namespace Modules\Passwords\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Passwords\Database\Factories\PasswordFactory;

class Password extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PasswordFactory
    // {
    //     // return PasswordFactory::new();
    // }
}
