<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(6);

        return view('admin.blogs.index', compact('blogs'));
    }

    
    public function create()
    {
        return view('admin.blogs.create');
    }

    
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        }

        Blog::create($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'blogs', 'add', json_encode($requestData)));

        return redirect()->route('admin.blogs.index');
    }

    
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    
    public function update(Request $request, Blog $blog)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            if(isset($blog->img) && file_exists(public_path('/files/'.$blog->img))){
                unlink(public_path('/files/'.$blog->img));
            }
            $requestData['img'] = $this->img_upload();
        }

        $blog->update($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'blogs', 'update', json_encode($requestData)));

        return redirect()->route('admin.blogs.index');
    }

    
    public function destroy(Blog $blog)
    {
        $user = auth()->user()->name;
        event(new AuditEvent($user, 'blogs', 'delete', json_encode($blog)));

        if(isset($blog->img) && file_exists(public_path('/files/'.$blog->img))){
            unlink(public_path('/files/'.$blog->img));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }
}
