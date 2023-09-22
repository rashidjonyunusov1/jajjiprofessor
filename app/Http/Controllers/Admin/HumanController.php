<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Human;
use App\Models\Number;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humans = Human::orderBy('id', 'DESC')->paginate(6);

        return view('admin.humans.index', compact('humans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $numbers = Number::doesntHave('human')->get();
        return view('admin.humans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Human::create($request->all());

        return redirect()->route('admin.humans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function show(Human $human)
    {
        return view('admin.humans.show', compact('human'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function edit(Human $human)
    {
        
        return view('admin.humans.edit', compact('human'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Human $human)
    {
        $human->update($request->all());
        return redirect()->route('admin.humans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function destroy(Human $human)
    {
        $human->delete();
        return redirect()->route('admin.humans.index', compact('human'));
    }
}
