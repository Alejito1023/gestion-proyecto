<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Board;
use App\Models\ArchivoTask;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks.index', compact('tasks'));
        
    }

    public function create()
    {
        $boards = Board::all(); // Esto asume que tienes un modelo Board definido y quieres obtener todos los tableros
        return view('tasks.create', compact('boards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'board_id' => 'required|exists:boards,id', // Validamos que el tablero seleccionado exista en la tabla boards
            'file' => 'nullable|file|max:10240', // Agregar validación para el archivo
            // Puedes agregar más validaciones si es necesario
        ]);
    
        // Obtener el ID del tablero desde la solicitud del usuario
        $boardId = $request->input('board_id');
    
        // Crear una nueva tarea y establecer el board_id automáticamente
        $task = new Task;
        $task->title = $request->title; // Establecer el título de la tarea
        $task->description = $request->description; // Establecer la descripción de la tarea
        $task->board_id = $boardId;
        $task->save();
            // Agrega otros campos aquí si es necesario
            if ($request->hasFile('file')) {
                $archivo = $request->file('file');
                $ruta = $archivo->store('archivos');
                ArchivoTask::create([
                    'nombre' => $archivo->getClientOriginalName(),
                    'ruta' => $ruta,
                    'tipo' => $archivo->getClientMimeType(),
                    'tamaño' => $archivo->getSize(),
                    'task_id' => $task->id,
                ]);
            }
       
    
        return redirect()->route('tasks.index')->with('success', '¡La tarea se ha creado correctamente!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // Agregar validación para el archivo
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Guardar archivo si se proporcionó
        if ($request->hasFile('file')) {
            $archivo = $request->file('file');
            $ruta = $archivo->store('archivos');
            // Eliminar archivo anterior si existe
            if ($task->archivo) {
                unlink(storage_path('app/' . $task->archivo->ruta));
                $task->archivo->delete();
            }
            ArchivoTask::create([
                'nombre' => $archivo->getClientOriginalName(),
                'ruta' => $ruta,
                'tipo' => $archivo->getClientMimeType(),
                'tamaño' => $archivo->getSize(),
                'task_id' => $task->id,
            ]);
        }

        return redirect()->route('tasks.index')->with('success', '¡La tarea se ha actualizado correctamente!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', '¡La tarea se ha eliminado correctamente!');
    }
}