<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
        view()->share('user', $user);
    }
    public function getAll()
    {
        $user = $this->user->getAll();

        return view('users.index', compact('user'));
    }

    public function getCreate()
    {
        return view('users.create');
    }

    public function postCreate(Request $request)
    {
        $attribute = $request->all();
        $this->user->create($attribute);

        return redirect()->back()->with('status', __('eng.create_sucess'));
    }

    public function confirm($id)
    {
        $this->user->update($id);

        return redirect('login')->with('status', __('eng.confirm'));
    }

    public function delete($id)
    {
        $this->user->delete($id);

        return redirect('user')->with('status', __('eng.del_success'));
    }
}
