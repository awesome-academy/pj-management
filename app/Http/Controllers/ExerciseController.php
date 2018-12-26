<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Repositories\Interfaces\ExerciseInterface;
use App\Http\Requests\ExerciseFormRequest;
use App\Repositories\Interfaces\GroupInterface;
use App\Repositories\Interfaces\TaskInterface;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    private $exercise;

    public function __construct(ExerciseInterface $exercise, GroupInterface $group, TaskInterface $task)
    {
        $this->task = $task;
        $this->exercise = $exercise;
        view()->share('exercise', $exercise);
        $this->group = $group;
        view()->share('group', $group);
    }

    public function getAll()
    {
        $exercise = $this->exercise->getAll();

        return view('exercises.index', compact('exercise'));
    }

    public function showCreateForm($id)
    {
        $user = Auth::user();
        $group = $this->group->getById($id);
        if ($user->can('createEx', $group)) {
            return view('exercises.create', compact('group'));
        } else {
            return redirect()->back()->with('status', __('eng.cannot'));
        }

    }

    public function upload(ExerciseFormRequest $request)
    {
        $attribute = $request->all();
        $attribute['start_date'] = str_replace('.', '-', $request->input('start_date'));
        $attribute['end_date'] = str_replace('.', '-', $request->input('end_date'));
        $attribute['user_id'] = Auth::id();
        $this->exercise->create($attribute);

        return redirect()->back()->with('status', __('eng.upload_success'));
    }

    public function show($id)
    {
        $exercise = $this->exercise->getById($id);
        $task = $this->task->taskOnExercise($id);

        return view('exercises.detail', compact('exercise', 'task'));
    }

    public function delete($id)
    {
        $user = Auth::user();
        $exercise = $this->exercise->getById($id);
        $group = $exercise->group;
        if ($user->can('deleteEx', $group)) {
            $this->group->delete($id);

            return redirect()->back()->with('status', __('eng.del_success'));
        }

        return redirect()->back()->with('status', __('eng.cannot'));
    }

    public function getExercise($id)
    {
        $user = Auth::user();
        $exercise = $this->exercise->getByGroup($id);
        $group = $this->group->getById($id);
        if ($user->can('deleteEx', $group)) {
            return view('exercises.index', compact('exercise'));
        }

        return view('exercises.index', compact('exercise'));
    }
}
