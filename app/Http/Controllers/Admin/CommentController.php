<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;


class CommentController extends Controller
{
    
    public function index()
    {
        $comments = comment::orderBy('id', 'DESC')->paginate(3);

        return view('admin.comments.index', compact('comments'));
    }

    
    public function create()
    {
        return view('admin.comments.create');
    }

    
    public function store(CommentStoreRequest $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('icon'))
        {
            $requestData['icon'] = $this->icon_upload();
        } 

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        } 


        Comment::create($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'comments', 'add', json_encode($requestData)));

        return redirect()->route('admin.comments.index');
    }

    
    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }

    
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    
    public function update(CommentUpdateRequest $request, Comment $comment)
    {

        $requestData = $request->all();

        if ($request->hasFile('icon'))
        {
            if(isset($comment->icon) && file_exists(public_path('/files/'.$comment->icon))){
                unlink(public_path('/files/'.$comment->icon));
            }
    
            $requestData['icon'] = $this->icon_upload();
        } 

        if ($request->hasFile('img'))
        {
            if(isset($comment->img) && file_exists(public_path('/files/'.$comment->img))){
                unlink(public_path('/files/'.$comment->img));
            }

            $requestData['img'] = $this->img_upload();
        } 

        
       

        $comment->update($requestData);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'comments', 'update', json_encode($requestData)));

        return redirect()->route('admin.comments.index');
    }

    
    public function destroy(Comment $comment)
    {

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'comments', 'delete', json_encode($comment)));

        if(isset($comment->icon) && file_exists(public_path('/files/'.$comment->icon))){
            unlink(public_path('/files/'.$comment->icon));
        }

        if(isset($comment->img) && file_exists(public_path('/files/'.$comment->img))){
            unlink(public_path('/files/'.$comment->img));
        }

        $comment->delete();
        
        return redirect()->route('admin.comments.index');
    }

    public function icon_upload(){
        $file = request()->file('icon');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;
    }
}
