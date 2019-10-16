<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;


class TodoController extends Controller
{
    private $todo;
    
    public function __construct(Todo $instanceClass)
    {
        $this->todo = $instanceClass;
    }
    
    
    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', compact('todos'));
    }
    
    public function create()
    {
        return view('todo.create');
    }
    
    public function store(Request $request)
    {
        $params = $request->all();
        $this->todo->fill($params)->save();
        return redirect()->to('todo');
    }
    
    public function show($id)
    {
    
    }
    
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', compact('todo'));
    }
    
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $this->todo->find($id)->fill($params)->save();
        return redirect()->to('todo');
    }
    
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->to('todo');
    }
}
