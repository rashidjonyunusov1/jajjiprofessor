<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    
    public function index()
    {
        $groups = Group::orderBy('id', 'DESC')->paginate(6);

        return view('admin.groups.index', compact('groups'));
    }

    
    public function create()
    {
        return view('admin.groups.create');
    }

    
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        }

        Group::create($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'groups', 'add', json_encode($requestData)));

        return redirect()->route('admin.groups.index');
    }
    

    
    public function show(Group $group)
    {
        return view('admin.groups.show', compact('group'));
    }

    
    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    
    public function update(Request $request, Group $group)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            if(isset($group->img) && file_exists(public_path('/files/'.$group->img))){
                unlink(public_path('/files/'.$group->img));
            }
            $requestData['img'] = $this->img_upload();
        } 

        $group->update($requestData);
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'groups', 'update', json_encode($requestData)));

        return redirect()->route('admin.groups.index');
    }

    
    public function destroy(Group $group)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'groups', 'delete', json_encode($group)));

        if(isset($group->img) && file_exists(public_path('/files/'.$group->img))){
            unlink(public_path('/files/'.$group->img));
        }

        $group->delete();

        return redirect()->route('admin.groups.index');
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }

}
