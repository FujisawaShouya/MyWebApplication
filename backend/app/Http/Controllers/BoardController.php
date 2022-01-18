<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BoardRequest;
use App\Models\Board;
use App\Models\User;
use Carbon\Carbon;

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

    public function search(Request $request) {
        $now = Carbon::now();
        $searched_time = $request->searched_time;

        if($searched_time == 1) {
            $added_time = $now->subMinutes(30);
            $boards = Board::where('title', 'LIKE',"%{$request->searched_title}%")
                        ->where('created_at', '>=', $added_time)
                        ->where('platform', 'LIKE', "%{$request->searched_platform}%")
                        ->latest()
                        ->get();

            return view('board.search', ['boards' => $boards]);
        } elseif ($searched_time == 2) {
            $added_time = $now->subHours(1);
            $boards = Board::where('title', 'LIKE',"%{$request->searched_title}%")
                        ->where('created_at', '>=', $added_time)
                        ->where('platform', 'LIKE', "%{$request->searched_platform}%")
                        ->latest()
                        ->get();

            return view('board.search', ['boards' => $boards]);
        } elseif($searched_time == 3) {
            $added_time = $now->subDays(1);
            $boards = Board::where('title', 'LIKE',"%{$request->searched_title}%")
                        ->where('created_at', '>=', $added_time)
                        ->where('platform', 'LIKE', "%{$request->searched_platform}%")
                        ->latest()
                        ->get();

            return view('board.search', ['boards' => $boards]);
        } elseif ($searched_time == 4) {
            $added_time = $now->subDays(2);
            $boards = Board::where('title', 'LIKE',"%{$request->searched_title}%")
                        ->where('created_at', '>=', $added_time)
                        ->where('platform', 'LIKE', "%{$request->searched_platform}%")
                        ->latest()
                        ->get();

            return view('board.search', ['boards' => $boards]);
        } elseif($searched_time == 5) {
            $added_time = $now->subDays(2);
            $boards = Board::where('title', 'LIKE',"%{$request->searched_title}%")
                        ->where('created_at', '<', $added_time)
                        ->where('platform', 'LIKE', "%{$request->searched_platform}%")
                        ->latest()
                        ->get();

            return view('board.search', ['boards' => $boards]);
        } else {
            $boards = Board::where('title', 'LIKE',"%{$request->searched_title}%")
                        ->where('platform', 'LIKE', "%{$request->searched_platform}%")
                        ->latest()
                        ->get();

            return view('board.search', ['boards' => $boards]);
        };
    }
}
