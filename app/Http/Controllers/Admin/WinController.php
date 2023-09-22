<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Win;
use Illuminate\Http\Request;

class WinController extends Controller
{
    
    public function index()
    {
        $wins = Win::orderBy('id','DESC')->paginate(6);

        return view('admin.wins.index', compact('wins'));
    }

    
    public function create()
    {
        return view('admin.wins.create');
    }

    
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        }

        Win::create($requestData);
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'wins', 'add', json_encode($requestData)));

        return redirect()->route('admin.wins.index');
    }

    
    public function show(Win $win)
    {
        return view('admin.wins.index', compact('win'));
    }

    
    public function edit(Win $win)
    {
        return view('admin.wins.index', compact('win'));
    }

    
    public function update(Request $request, Win $win)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            if(isset($win->img) && file_exists(public_path('/files/'.$win->img))){
                unlink(public_path('/files/'.$win->img));
            }
            $requestData['img'] = $this->img_upload();
        }

        $win->update($requestData);
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'wins', 'update', json_encode($requestData)));

        return redirect()->route('admin.wins.index');
    }

    
    public function destroy(Win $win)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'wins', 'delete', json_encode($win)));

        if(isset($win->img) && file_exists(public_path('/files/'.$win->img))){
            unlink(public_path('/files/'.$win->img));
        }

        $win->delete();
        return redirect()->route('admin.wins.index');
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }
}
