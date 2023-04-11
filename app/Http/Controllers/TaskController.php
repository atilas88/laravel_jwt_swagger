<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version = "0.0.1",
 *      title  = "L5 OpenApi Swagger Documentation for Tasks",
 *      description = "L5 Api Rest for educational purposes"
 * )
 * */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @OA\Get(
     *       path="/api/tasks",
     *      tags ={"tasks"},
     *      summary = "Show task list",
     *      @OA\Response(
     *           response=200,
     *          description="Show all tasks"
     *     ),
     *     @OA\Response(
     *       response = "default",
     *      description = "An error occurred"
     *    )
     * )
     */
    public function index()
    {
        $task = Task::all();

        return response()->json([
            'tasks' => $task
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->content = $request->input('content');

        $task->save();

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);

        return response()->json([
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $task = Task::find($id);

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->content = $request->input('content');

        $task->save();

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully'
        ]);

    }
}
