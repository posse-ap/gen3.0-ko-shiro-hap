<?php

namespace App\Http\Controllers;

use App\Choice;
use Illuminate\Http\Request;

class ChoicesController extends Controller
{
    public function show_choices(Request $request){
        $choices = Choice::all();

        return view('quiz.index', ['choices' => $choices]);
    }
}
