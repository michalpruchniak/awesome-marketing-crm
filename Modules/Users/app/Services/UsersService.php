<?php

namespace Modules\Users\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Http\Requests\UserStoreRequest;
use Modules\Users\Http\Requests\UserUpdateRequest;
use Modules\Users\Repositories\UsersRepository;

class UsersService
{
    private $usersRepository;

    public function __construct(
        UsersRepository $usersRepository
    )
    {
        $this->usersRepository = $usersRepository;
    }

    public function getOne(int $id):User {
        $user = $this->usersRepository->getOne($id);

        return $user;
    }

    public function getAll():Collection {
        $users = $this->usersRepository->getAll();

        return $users;
    }

    public function store(UserStoreRequest $request):User {
        $user = $this->usersRepository->store($request);

        $this->usersRepository->assingRole($request->role, $user);

        return $user;
    }

    public function update(int $id, UserUpdateRequest $request):User {
        $user = $this->usersRepository->update($request, $id);

        return $user;
    }

    public function getAllRoles():Collection {
        $roles = $this->usersRepository->getAllRoles();

        return $roles;
    }

    public function destroy(int $id):Bool {
        if(Auth::id() !== $id) {
            $this->usersRepository->destroy($id);
            $flag = true;
        } else {
            $flag = false;
        }

        return $flag;
    }

    public function deleteBan(int $id):Bool {
        $this->usersRepository->deleteBan($id);

        return true;
    }
}
