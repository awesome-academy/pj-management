<?php

namespace App\Repositories\Eloquents;

use App\Models\GroupUser;
use App\Repositories\Interfaces\GroupInterface;
use App\Models\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Class DbGroupRepository implements GroupInterface{

    private $model;

    public function __construct(Group $model)
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

    public function createGroup($attribute)
    {
        $file = $attribute['group_image'];
        if (isset($file)) {
            $name = $file->getClientOriginalName();
            $group_image = str_random(4) . '_' . $name;
            while (file_exists(config('app.group_image') . $group_image)) {
                $group_image = str_random(4) . '_' . $name;
            }
            $file->move(config('app.group_image'), $group_image);
            $this->model->group_image = $name;
        } else {
            $this->model->group_image = '';
        }
        $attribute['group_image'] = $group_image;

        return $this->model->create($attribute);
    }

    public function update($id, array $attribute)
    {
        $file = $attribute['group_image'];
        if (isset($file)) {
            $name = $file->getClientOriginalName();
            $group_image = str_random(4) . '_' . $name;
            while (file_exists(config('app.group_image') . $group_image)) {
                $group_image = str_random(4) . '_' . $name;
            }
            $file->move(config('app.group_image'), $group_image);
            $this->model->group_image = $name;
        } else {
            $this->model->group_image = '';
        }
        $attribute['group_image'] = $group_image;

        return $group->update($attribute);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();

        return true;
    }

    public function myGroups()
    {
        $groupUser = GroupUser::with('group.groupUser')->where('user_id', Auth::id())->get()->toArray();

        return $groupUser;
    }

    public function groupOwner($id)
    {
        $group = $this->model->findOrFail($id);
        $user_id = $group['user_id'];
        $user = User::with('groups')->where('id', $user_id)->get();

        return $user;
    }
}
