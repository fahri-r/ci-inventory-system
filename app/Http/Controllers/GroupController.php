<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupModel;

    public function __construct()
    {
        $this->groupModel = new Group();
    }

    public function index()
    {
        $groups = $this->groupModel->all();
        $data = [
            "title" => "Manage Groups",
            "groups" => $groups,
        ];

        return view("groups.index", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Add Group"
        ];

        return view("groups.create", $data);
    }

    public function store(GroupRequest $request)
    {
        $this->groupModel->name = $request->name;
        $this->groupModel->permission = serialize($request->permission);

        if ($this->groupModel->save()) {
            return redirect()->route('groups.index')->with('success', 'Data added successfully');
        }

        return redirect()->route('groups.index')->with('fail', 'Data failed to add');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $group = $this->groupModel->find($id);
        $permission = unserialize($group->permission);

        $data = [
            "title" => "Edit Brand",
            "group" => $group,
            "permission" => $permission
        ];

        return view("groups.edit", $data);
    }

    public function update(GroupRequest $request, $id)
    {
        $group = $this->groupModel->find($id);
        $group->name = $request->name;
        $group->permission = serialize($request->permission);

        if ($group->save()) {
            return redirect()->route('groups.index')->with('success', 'Data updated successfully');
        }

        return redirect()->route('groups.index')->with('fail', 'Data failed to update');
    }

    public function destroy($id)
    {
        $group = $this->groupModel->find($id);

        if ($group->delete()) {
            return redirect()->route('groups.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('groups.index')->with('fail', 'Data failed to delete');
    }
}
