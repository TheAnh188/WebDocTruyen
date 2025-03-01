<?php

namespace App\Repositories;

use App\Models\PostCatalogue;
use App\Models\User;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $relation = [])
    {
        return $this->model->with($relation)->get();
    }

    public function paginate(array $columns = ['*'], int $perpage = 20, array $relations = [], array $extend = [])
    {
        $query = $this->model->select($columns)->customWith($relations ?? NULL);
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_API') . $extend['path']);
    }

    public function findById(string $id, array $columns = ['*'], array $relations = []) {
        return $this->model->select($columns)->with($relations)->findOrFail($id);
    }

    public function findByCondition(array $condition = [], array $relations = []) {
        $query = $this->model->newQuery();
        foreach ($condition as $key => $value) {
            $query->where($value[0],$value[1],$value[2]);
        }
        $query->customWith($relations ?? NULL);
        return $query->first();
    }

    public function create(array $payload = []) {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $id, array $payload = []) {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function delete(int $id = 0) {
        return $this->findById($id)->deleteOrFail();
    }
}
