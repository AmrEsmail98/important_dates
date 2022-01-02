<?php

namespace App\Repositories\SQL;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IModelRepository;

abstract class AbstractModelRepository implements IModelRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model->get();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, $data)
    {
       return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    public function search()
    {
       return $this->model->latest()->filter(request(['search']))->get();
    }
}
