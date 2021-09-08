<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('id', 'DESC')->get();
        return $todos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $todo =  Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response('The todo has created successfully', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $todo->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'priority' => $request->priority,
        ]);
        return response('The todo has been updated successfully', 200);
    }
    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->update([
           'is_completed'=>true
        ]);
        return response('The todo has been completed successfully', 200);
    }
    public function undocompleted($id)
    {
        $todo = Todo::find($id);
        $todo->update([
           'is_completed'=>false
        ]);
        return response('The todo has been completed successfully', 200);    }
    public function completedIndex()
    {
        $todos = Todo::orderBy('id', 'DESC')->where('is_completed',true)->get();
        return $todos;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response('The Todo has been deleted successfully', 200);
    }
}
