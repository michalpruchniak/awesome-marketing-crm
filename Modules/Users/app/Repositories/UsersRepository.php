<?php
namespace Modules\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersRepository {

    public function getOne(int $id) {
        $user = User::findOrFail($id);

        return $user;
    }

    public function getAll():Collection {
        $users = User::all();

        return $users;
    }

    public function store(Request $request):User {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }

    public function getAllRoles() {
        $roles = Role::all();

        return $roles;
    }

    public function assingRole(int $id, User $user):User {
        $user = $user->assignRole($id);

        return $user;
    }
}
