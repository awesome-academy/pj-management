<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function member($id);

    public function create(array $attribute);

    public function getAll();
}
