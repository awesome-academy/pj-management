<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\TaskInterface;
use App\Models\Task;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

Class DbTaskRepository implements TaskInterface{

    private $model;

    public function __construct(Task $model)
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
        $file = $attribute['file'];
        if (isset($file)) {
            $name = $file->getClientOriginalName();
            $fileEx = str_random(4) . '_' . $name;
            while (file_exists(config('app.group_image') . $fileEx)) {
                $fileEx = str_random(4) . '_' . $name;
            }
                    $path = $file->store(config('app.task'));

            $this->model->file = $name;
        } else {
            $this->model->file = '';
        }
        $attribute['file'] = $path;

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

    public function download($id)
    {
        $task = $this->model->findOrFail($id);
        $path = $task->file;

        return Response::download(storage_path('app/') . $path);
    }

    public function taskOwner($id)
    {
        $taskOwner = User::with('task.user')->where('id', $id)->get()->toArray();

        return $taskOwner;
    }

    public function taskOnExercise($id)
    {
        $taskEx = Task::with('exercise.task', 'user')->where('exercise_id', $id)->get();

        return $taskEx;
    }
}
