<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    
    public function index()
    {
        $photos = Photo::orderBy('id', 'DESC')->paginate(6);
        return view('admin.photos.index', compact('photos'));
    }

    
    public function create()
    {
        return view('admin.photos.create');
    }

    
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        }

        Photo::create($requestData);
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'photos', 'add', json_encode($requestData)));

        return redirect()->route('admin.photos.index');
    }

    
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    
    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    
    public function update(Request $request, Photo $photo)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            if(isset($photo->img) && file_exists(public_path('/files/'.$photo->img))){
                unlink(public_path('/files/'.$photo->img));
            }
            $requestData['img'] = $this->img_upload();
        }
        $photo->update($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'photos', 'update', json_encode($requestData)));

        return redirect()->route('admin.photos.index');
    }

    
    public function destroy(Photo $photo)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'photos', 'delete', json_encode($comment)));
        if(isset($photo->img) && file_exists(public_path('/files/'.$photo->img))){
            unlink(public_path('/files/'.$photo->img));
        }
        $photo->delete();

        return redirect()->route('admin.photos.index');
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }
}
