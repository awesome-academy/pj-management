<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\RoleInterface;
use App\Models\Role;

Class DbRoleRepository implements RoleInterface{

    private $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attribute)
    {
        return $this->model->create($attribute);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();

        return true;
    }
}
