<?php

namespace Modules\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Modules\Users\Http\Requests\UserStoreRequest;
use Modules\Users\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Role;

class UsersRepository
{
    public function getOne(int $id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function getAll(): Collection
    {
        $users = User::all();

        return $users;
    }

    public function store(UserStoreRequest $request): User
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    public function update(UserUpdateRequest $request, int $id): User
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $this->assingRole($request->role, $user);

        return $user;
    }

    public function getAllRoles(): Collection
    {
        $roles = Role::all();

        return $roles;
    }

    public function assingRole(int $id, User $user): User
    {
        $user = $user->assignRole($id);

        return $user;
    }

    public function destroy(int $id): User
    {
        $user = User::findOrFail($id);

        $user->ban = 1;
        $user->save();

        return $user;
    }

    public function deleteBan(int $id): User
    {
        $user = User::findOrFail($id);

        $user->ban = 0;
        $user->save();

        return $user;
    }
}
