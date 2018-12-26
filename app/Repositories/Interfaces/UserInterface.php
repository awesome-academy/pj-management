<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function member($id);

    public function create(array $attribute);

    public function getAll();

    public function getById($id);

    public function update($id);

    public function delete($id);
}
