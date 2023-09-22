<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'DESC')->paginate(6);

        return view('admin.teachers.index', compact('teachers'));
    }

    
    public function create()
    {
        return view('admin.teachers.create');
    }

    
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        }

        Teacher::create($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'teachers', 'add', json_encode($requestData)));

        return redirect()->route('admin.teachers.index');
    }

    
    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    
    public function update(Request $request, Teacher $teacher)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            if(isset($teacher->img) && file_exists(public_path('/files/'.$teacher->img))){
                unlink(public_path('/files/'.$teacher->img));
            }
            $requestData['img'] = $this->img_upload();
        }

        Teacher::update($requestData);
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'teachers', 'update', json_encode($requestData)));

        return redirect()->route('admin.teachers.index');
    }

    
    public function destroy(Teacher $teacher)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'teachers', 'delete', json_encode($teacher)));
        
        if(isset($teacher->img) && file_exists(public_path('/files/'.$teacher->img))){
            unlink(public_path('/files/'.$teacher->img));
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index');
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }

}
