<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Teacher;
use App\Models\Info;
use App\Models\Blog;
use App\Models\Group;
use App\Models\Order;
use App\Models\Win;



class PagesController extends Controller
{

    public function welcome(){
        $infos = Info::latest()->take(6)->get();
        $about = Blog::latest()->take(1)->get(); 
        $blogs = Blog::latest()->take(3)->get();
        $comments = Comment::latest()->take(12)->get();
        $teachers = Teacher::latest()->take(4)->get();
        $groups = Group::latest()->take(3)->get(); 
        $orders = Order::latest()->take(1)->get();
        
        return view('welcome', compact('comments', 'teachers', 'infos', 'about', 'blogs', 'groups', 'orders'));
    }

    public function main(){
        return view('layouts.main');
    }

    public function class(){
        $groups = Group::latest()->take(3)->get(); 
        $orders = Order::latest()->take(1)->get();

        return view('class', compact('groups', 'orders'));
    }

    public function team(){
        $comments = Comment::latest()->take(12)->get();
        $teachers = Teacher::latest()->take(12)->get();
        return view('team', compact('comments', 'teachers'));
    }

    public function gallery(){
        return view('gallery');
    }

    public function achievements(){
        $wins = Win::latest()->take(9)->get();
        return view('achievements', compact('wins'));
    }

    public function article(){
        return view('article');
    }

    public function blog(){
        $blogs = Blog::latest()->take(6)->get();
        return view('blog', compact('blogs'));
    }
}

