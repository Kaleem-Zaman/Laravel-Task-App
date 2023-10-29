<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use \App\Models\Task as Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::put('/task/{task}', function(Tasks $task, TaskRequest $request){
    // var_dump($request->validated());
    if ($task->update($request->validated())) {
        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', "Task Updated Successfully");
    } else {
        return redirect()->back()
            ->with('error', "Task Update Failed");
    }
})->name('tasks.update');

Route::get('/', function () {
    return view('index', [
        "tasks" => Tasks::paginate(5),
    ]);
})->name('tasks.index');

Route::get('/{id}/edit', function ($id) {
    return view('edit', [
        'task' => Tasks::findOrFail($id)
    ]);
})->name('tasks.edit');

/***
 *
 * Order matters in placing the routes in this file
 */

Route::view('/create', 'create')->name('task.create');


/**
 * The route written under shows Route-Model Binding
 */
Route::get('/{task}', function(Tasks $task) {

    $taskArray = $task;

    /**
     * the name passed as string in the array section of View function
     * is the one to be used in the view
     * */

    return view('show', ['taskDetails' => $taskArray]);
})->name("tasks.show");

Route::post('/task', function(TaskRequest $request){



    $task = Tasks::create($request->validated());
    return redirect()->route('tasks.show', ['task'=>$task->id])
            ->with('success', "Task Created Successfully");

})->name('task.store');

Route::post('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with("success", "Task deleted successfully!");
})->name("task.destroy");


Route::put('/task/{task}/toggle-completed', function(Task $task){
    $task->toggleCompleted();
    return redirect()->back()->with("success", "Task updated successfully!");
})->name("task.toggle");













//lets say we need to retire the url given in the below mentioned route
// Route::get('/hallo', function(){
//     return redirect()->route('Home');
// });

// Route::get('users/{id}', function ($id) {
//     return 'Hello ' . $id . '!';
// });
