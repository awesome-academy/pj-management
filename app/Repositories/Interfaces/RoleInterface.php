<?php

namespace App\Repositories\Interfaces;

interface RoleInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $attribute);

    public function delete($id);
}
