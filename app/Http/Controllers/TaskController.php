<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ExerciseInterface;
use App\Repositories\Interfaces\TaskInterface;
use App\Http\Requests\TaskFormRequest;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    private $task;

    public function __construct(TaskInterface $task, ExerciseInterface $exercise)
    {
        $this->task = $task;
        $this->exercise = $exercise;
        view()->share('task', $task);
        view()->share('exercise', $exercise);
    }

    public function getAll()
    {
        $task = $this->task->getAll();

        return view('tasks.index', compact('task'));
    }

    public function showUploadForm($id)
    {
        $exercise = $this->exercise->getById($id);

        return view('tasks.create', compact('exercise'));
    }

    public function upload(TaskFormRequest $request)
    {
        $attribute = $request->all();
        $this->task->create($attribute);

        return redirect('task')->with('status', __('eng.upload_success'));
    }

    public function delete($id)
    {
        $this->task->delete($id);

        return redirect('task')->with('status', __('eng.del_success'));;
    }

    public function download($id)
    {
        return $this->task->download($id);
    }
}
