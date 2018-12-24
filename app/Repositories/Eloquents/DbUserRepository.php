<?php

namespace App\Repositories\Eloquents;

use App\Models\GroupUser;
use App\Repositories\Interfaces\UserInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

Class DbUserRepository implements UserInterface
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function member($id)
    {
        $groupUser = GroupUser::with('user.groupUser')->where('group_id', $id)->get()->toArray();

        return $groupUser;
    }

    public function create(array $attribute)
    {
        $attribute['password'] = Hash::make($attribute['password']);

        return $this->model->create($attribute);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
