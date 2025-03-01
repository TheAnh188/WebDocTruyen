<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all(array $relation = []);
    public function paginate(array $columns = ['*'], int $perpage = 20, array $relations = [], array $extend = []);
    public function findById(string $id, array $columns = ['*'], array $relations = []);
    public function findByCondition(array $condition = [], array $relations = []);
    public function create(array $payload = []);
    public function update(int $id, array $payload = []);
    public function delete(int $id = 0);

}
