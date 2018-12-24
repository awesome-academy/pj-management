<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\SubjectInterface;
use App\Http\Requests\SubjectFormRequest;

class SubjectController extends Controller
{
    private $subject;

    public function __construct(SubjectInterface $subject)
    {
        $this->subject = $subject;
        view()->share('subject', $subject);
    }

    public function showCreateForm()
    {
        return view('subjects.create');
    }

    public function create(SubjectFormRequest $request)
    {
        $attribute = $request->all();
        $this->subject->create($attribute);

        return redirect()->back()->with('status', __('eng.created_sucess'));
    }

    public function getAllSubjects()
    {
        $subject = $this->subject->getAllSubjects();

        return view('subjects.index')->with(['subject' => $subject]);
    }

    public function delete($id)
    {
        $this->subject->delete($id);

        return redirect()->back()->with('status', __('eng.del_success'));;
    }
}
