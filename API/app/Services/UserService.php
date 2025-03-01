<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate($request)
    {
        $perpage = $request->query('per_page') ?? 20;
        $users = $this->userRepository->paginate(['id', 'name', 'email', 'avatar_path', 'is_password', 'role_id'], $perpage, ['role'],  ['path' => '/user']);
        return $users;
    }

    public function findById($id)
    {
        $users = $this->userRepository->findById($id,['id', 'name', 'email', 'avatar_path', 'is_password', 'role_id'], ['role']);
        return $users;
    }

    public function findByCondition($request) {
        $email = $request->route('email');
        $users = $this->userRepository->findByCondition([['email', '=', $email]], ['role']);
        return $users;
    }

    public function create($request) {
        $data = $request->all(); // Lấy toàn bộ dữ liệu từ request body
        $user = $this->userRepository->create($data);
        return $user;
    }

    public function update($request) {
        $id = $request->route('user'); // Lấy ID từ URL
        $data = $request->all();
        $user = $this->userRepository->update($id, $data);

        return $user;
    }
    public function delete($id) {
        $user = $this->userRepository->delete($id);
        return $user;
    }
}
