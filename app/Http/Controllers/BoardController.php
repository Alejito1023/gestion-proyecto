<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return view('boards.index', compact('boards'));
    }

    public function store(Request $request)
    {
        Board::create($request->all());
        return redirect('/');
    }
}
