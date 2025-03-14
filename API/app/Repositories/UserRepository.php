<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $model) {
        $this->model = $model;
    }
}
