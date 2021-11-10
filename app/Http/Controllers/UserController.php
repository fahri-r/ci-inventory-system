<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Group;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $groupModel;
    protected $userModel;
    protected $userMetaModel;

    public function __construct()
    {
        $this->groupModel = new Group();
        $this->userModel = new User();
        $this->userMetaModel = new UserMeta();
    }

    public function index()
    {
        $users = $this->userModel->all();

        $data = [
            "title" => "Manage Users",
            "users" => $users
        ];

        return view("users.index", $data);
    }

    public function create()
    {
        $groups = $this->groupModel->all();

        $data = [
            "title" => "Add User",
            "groups" => $groups
        ];

        return view("users.create", $data);
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $this->userModel->email = $request->email;
            $this->userModel->password = $request->password;

            $group = $this->groupModel->find($request->group);
            $this->userModel->group()->associate($group);
            $this->userModel->save();

            $this->userMetaModel->firstname = $request->firstname;
            $this->userMetaModel->lastname = $request->lastname;
            $this->userMetaModel->phone = $request->phone;
            $this->userMetaModel->gender = $request->gender;
            $this->userModel->userMeta()->save($this->userMetaModel);

            return redirect()->route('users.index')->with('success', 'Data added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('fail', 'Data failed to add');
        }
    }

    public function show($id)
    {
        $user = $this->userModel->find($id);
        $groups = $this->groupModel->all();
        
        $data = [
            "title" => "Show User",
            "user" => $user,
            "groups" => $groups
        ];

        return view("users.show", $data);
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        $groups = $this->groupModel->all();
        
        $data = [
            "title" => "Edit User",
            "user" => $user,
            "groups" => $groups
        ];

        return view("users.edit", $data);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $user = $this->userModel->find($id);
            $user->email = $request->email;
    
            if($request->password) {
                $user->password = $request->password;
            }
    
            $group = $this->groupModel->find($request->group);
            $user->group()->associate($group);
            $user->save();
    
            $user->userMeta->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'gender' => $request->gender,
            ]);
            return redirect()->route('users.index')->with('success', 'Data updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('fail', 'Data failed to update');
        }
    }

    public function destroy($id)
    {
        $user = $this->userModel->find($id);

        if ($user->delete()) {
            return redirect()->route('users.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('users.index')->with('fail', 'Data failed to delete');
    }
}
