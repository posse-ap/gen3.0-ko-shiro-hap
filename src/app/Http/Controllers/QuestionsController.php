<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function show_questions(Request $request){
        $questions = Question::with(['choices', 'notes'])->get();

        // // 問題をシャッフルする
        // $questions = $questions->shuffle();

        return view('quiz.index', ['questions' => $questions]);
    }
}