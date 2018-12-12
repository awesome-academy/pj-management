<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\GroupInterface;
use App\Models\Group;
use Illuminate\Support\Facades\Input;

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

    public function create(array $attribute)
    {
        $attribute = Input::all();
        if (Input::hasFile('group_image')) {
            $file = Input::file('group_image');
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
        $class = $this->model->findOrFail($id);
        $class = $this->model->update($attribute);

        return $class;
    }

    public function delete($id)
    {
        $this->getById($id)->delete();

        return true;
    }

}