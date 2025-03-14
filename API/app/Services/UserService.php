<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $users = $this->userRepository->findById($id, ['id', 'name', 'email', 'avatar_path', 'is_password', 'role_id'], ['role']);
        return $users;
    }

    public function findByCondition($request)
    {
        $email = $request->route('email');
        $users = $this->userRepository->findByCondition([['email', '=', $email]], ['role']);
        return $users;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $this->userRepository->create($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function update($request)
    {
        $id = $request->route('user'); // Lấy ID từ URL
        $payload = $request->all();
        $user = $this->userRepository->update($id, $payload);

        return $user;
    }
    public function delete($id)
    {
        $user = $this->userRepository->delete($id);
        return $user;
    }
}
