<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BoardRequest;
use App\Models\Board;

class BoardController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return view('board.index');
        } else {
            return redirect('/login');
        }
    }

    public function create(BoardRequest $request) {
        $user = Auth::user();
        $board = Board::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'platform' => $request->platform,
            'player' => $request->playerId,
            'comment' => $request->comment
        ]);
        $board->save();

        return redirect('/');
    }
}
