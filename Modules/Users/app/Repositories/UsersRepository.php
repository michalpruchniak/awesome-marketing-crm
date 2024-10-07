<?php
namespace Modules\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository {

    public function getAll():Collection {
        $users = User::all();

        return $users;
    }
}
