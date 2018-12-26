<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Repositories\Eloquents\EloquentRepository;
use App\Repositories\Interfaces\GroupUserInterface;
use App\Repositories\Interfaces\UserInterface;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SubjectInterface;
use App\Repositories\Interfaces\GroupInterface;
use App\Http\Requests\GroupFormRequest;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    private $group;
    protected $subject;
    private $groupUser;

    public function __construct(GroupInterface $group, SubjectInterface $subject, GroupUserInterface $groupUser, UserInterface $user)
    {
        $this->group = $group;
        $this->subject = $subject;
        $this->groupUser = $groupUser;
        $this->user = $user;
        view()->share('subject', $subject);
    }

    public function getAllGroups()
    {
        $group = $this->group->getAll();

        return view('groups.index', compact('group'));
    }

    public function showCreateForm()
    {
        $user = Auth::user();
        if ($user->can('create', Group::class)) {
            $subject = $this->subject->getAll();

            return view('groups.create', compact('subject'));
        }

        return view('home');
    }

    public function create(GroupFormRequest $request)
    {
        $attribute = $request->all();
        $attribute['user_id'] = Auth::id();
        $this->group->createGroup($attribute);

        return redirect()->route('createGroup')->with('status', __('eng.create_success'));
    }

    public function show($id)
    {
        $group = $this->group->getById($id);
        $owner = $this->group->groupOwner($id);
        $member = $this->user->member($id);

        return view('groups.detail', compact('group', 'member', 'owner'));
    }

    public function delete($id)
    {
        $user = Auth::user();
        $group = $this->group->getById($id);
        if ($user->can('delete', $group)) {
            $this->group->delete($id);

            return redirect()->back()->with('status', __('eng.del_success'));
        } else {
            return redirect()->back()->with('status', __('eng.cannot'));
        }
    }

    public function joinGroup($id)
    {
        $this->groupUser->join($id);

        return redirect('group/' . $id . '/detail')->with('status', __('eng.join_success'));
    }

    public function groupUser($id)
    {
        $member = $this->user->member($id);

        return view('groups.member', compact('member'));
    }

    public function myGroups()
    {
        $group = $this->group->myGroups();

        return view('groups.index', compact('group'));
    }

    public function showUpdate($id)
    {
        $user = Auth::user();
        $group = $this->group->getById($id);
        if ($user->can('update', $group)) {
            $subject = $this->subject->getAll();

            return view('groups.edit', compact('group', 'subject'));
        } else {
            return redirect()->back()->with('status', __('eng.cannot'));
        }
    }

    public function update($id, GroupFormRequest $request)
    {
        $attribute = $request->all();
        $this->group->update($id, $attribute);

        return redirect('group')->with('status', __('eng.create_success'));
    }

    public function joined()
    {
        $group = $this->group->joined();

        return view('groups.joined', compact('group'));
    }
}
