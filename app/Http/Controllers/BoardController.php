<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Redirect;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return view('boards.index', compact('boards'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $board = new Board();
    $board->title = $request->title;
    $board->save();

    return Redirect::route('boards.index')->with('success', '¡El tablero se ha creado correctamente!');
}
public function edit(Board $board)
{
    return view('boards.edit', compact('board'));
}

public function update(Request $request, Board $board)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $board->update($request->all());

    return Redirect::route('boards.index')->with('success', '¡El tablero se ha actualizado correctamente!');
}

public function destroy(Board $board)
{
    $board->delete();

    return Redirect::route('boards.index')->with('success', '¡El tablero se ha eliminado correctamente!');
}
public function show(Board $board)
{
    $tasks = $board->tasks; // Obtenemos todas las tareas asociadas al tablero
    return view('boards.show', compact('board', 'tasks'));
}
}