<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Users\Repositories\UsersRepository;
use Modules\Users\Services\UsersService;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    private $users;
    private $usersService;

    public function __construct(
        UsersRepository $usersRepository,
        UsersService $usersService
    ) {
        $this->users = $usersRepository;
        $this->usersService = $usersService;
    }

    public function index():View {
        return view('users::list')
            ->with('mainTitle', 'List of Users')
            ->with('headerTitle', 'List of Users')
            ->with('users', $this->users->getAll());
    }

    public function create() {
        return view('users::create')
            ->with('mainTitle', 'Create new user')
            ->with('headerTitle', 'Create new user')
            ->with('roles', $this->usersService->getAllRoles());
    }

    public function store(Request $request) {
        $this->usersService->store($request);

        return redirect()->route('users.list');
    }

    public function edit(int $id) {
        $user = $this->usersService->getOne($id);

        return view('users::create')
            ->with('mainTitle', 'List of customers')
            ->with('headerTitle', 'List of customers')
            ->with('user', $user)
            ->with('roles', $this->usersService->getAllRoles());
    }

    public function update(Request $request, int $id) {
        $this->usersService->update($id, $request);

        return redirect()->route('users.list');
    }
}
