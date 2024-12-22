<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        // querybuiler
        //
        //ORM query
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Xác thực dữ liệu gửi đến
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    
    $data = $request->all();
    $data['completed'] = $request->has('completed') ? 1 : 0; 

   
    Task::create($data);


    return redirect()->route('tasks.index')->with('success', 'Task created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Xác thực dữ liệu gửi đến
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    // Lấy task cần cập nhật
    $task = Task::findOrFail($id);

    // Kiểm tra và xử lý giá trị của checkbox 'completed'
    $data = $request->all();
    $data['completed'] = $request->has('completed') ? 1 : 0;  // Chuyển đổi giá trị thành 1 hoặc 0

    // Cập nhật task trong cơ sở dữ liệu
    $task->update($data);

    // Chuyển hướng về trang danh sách tasks với thông báo thành công
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task delete successfully');
    }
}
