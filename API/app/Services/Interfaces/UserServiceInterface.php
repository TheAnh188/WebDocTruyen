<?php

namespace App\Services\Interfaces;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function paginate($request);
    public function findById($id);
    public function findByCondition($request);
    public function create($request);
    public function update($request);
    public function delete($id);
}
