<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchivoTask;
use App\Models\Task;

class ArchivoTaskController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'archivo' => 'required|file|max:10240',
        'task_id' => 'required|exists:tasks,id',
    ]);

    $archivo = $request->file('archivo');
    $ruta = $archivo->store('archivos');

    $archivoGuardado = ArchivoTask::create([
        'nombre' => $archivo->getClientOriginalName(),
        'ruta' => $ruta,
        'tipo' => $archivo->getClientMimeType(),
        'tamaño' => $archivo->getSize(),
        'task_id' => $request->task_id,
    ]);

    // Almacenar la información del archivo en la sesión
    session()->put('archivo', $archivoGuardado);

    return redirect()->route('tasks.index')->with('success', 'El archivo se ha subido correctamente.');
    
}

    public function create()
{
    $tasks = Task::all(); // Obtener todas las tareas
    return view('upload', compact('tasks')); // Pasar la variable $tasks a la vista upload.blade.php
}
}