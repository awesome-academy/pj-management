<?php

namespace App\Repositories\Interfaces;

interface TaskInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $attribute);

    public function update($id, array $attribute);

    public function delete($id);

    public function download($id);
}
