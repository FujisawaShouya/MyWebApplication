<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return view('board.index');
        } else {
            return redirect('/login');
        }
    }
}
