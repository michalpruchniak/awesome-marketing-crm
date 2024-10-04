<?php
namespace Modules\Users\Repositories;

use App\Models\User;

class UsersRepository {

    public function getAll(){
        return User::all();
    }
}
