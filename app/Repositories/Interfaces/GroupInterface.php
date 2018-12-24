<?php

namespace App\Repositories\Interfaces;

interface GroupInterface
{
    public function getAll();

    public function getById($id);

    public function createGroup($attribute);

    public function update($id, array $attribute);

    public function delete($id);

    public function myGroups();

    public function groupOwner($id);
}
