<?php

namespace Modules\Users\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function getOne(int $id) {
        $user = $this->usersRepository->getOne($id);

        return $user;
    }

    public function getAll():Collection {
        $users = $this->usersRepository->getAll();

        return $users;
    }

    public function store(Request $request):User {
        $user = $this->usersRepository->store($request);

        $this->usersRepository->assingRole($request->role, $user);

        return $user;
    }

    public function getAllRoles() {
        $roles = $this->usersRepository->getAllRoles();

        return $roles;
    }
}
