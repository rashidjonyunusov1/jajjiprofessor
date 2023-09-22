<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Requests\InfoStoreRequest;
use App\Http\Requests\InfoUpdateRequest;
use App\Events\AuditEvent;

class InfoController extends Controller
{
    
    public function index()
    {
        
        $infos = Info::orderBy('id', 'DESC')->paginate(6);

        return view('admin.infos.index', compact('infos'));
    }

    
    public function create()
    {
        return view('admin.infos.create');
    }

    
    public function store(InfoStoreRequest $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('icon'))
        {
            $requestData['icon'] = $this->icon_upload();
        }

        Info::create($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'infos', 'add', json_encode($requestData)));

        return redirect()->route('admin.infos.index');
    }

    
    public function show(Info $info)
    {
        return view('admin.infos.show', compact('info'));
    }

    
    public function edit(Info $info)
    {
        return view('admin.infos.edit', compact('info'));
    }

    
    public function update(InfoUpdateRequest $request, Info $info)
    {
        $requestData = $request->all();

        if ($request->hasFile('icon'))
        {
            if(isset($info->icon) && file_exists(public_path('/files/'.$info->icon))){
                unlink(public_path('/files/'.$info->icon));
            }
            $requestData['icon'] = $this->icon_upload();
        } 

        $info->update($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'infos', 'update', json_encode($requestData)));


        return redirect()->route('admin.infos.index');
    }

    
    public function destroy(Info $info)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'infos', 'delete', json_encode($info)));
        
        if(isset($info->icon) && file_exists(public_path('/files/'.$info->icon))){
            unlink(public_path('/files/'.$info->icon));
        }

        $info->delete();

        return redirect()->route('admin.infos.index');
    }

    public function icon_upload(){
        $file = request()->file('icon');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }
}
