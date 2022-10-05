<?php

namespace App\Http\Controllers;

use App\Question;
use App\Choice;
use App\Note;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with(['choices', 'notes'])->get();

        return view('admin.questions', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // データベースの最後のquestion_idを取得
        $last_question_id = Question::orderBy('id', 'desc')->first()->id;

        $request->validate([
            'question' => 'required|max:64',
            'image' => 'required|image',
            'choice1' => 'required|max:32',
            'choice2' => 'required|max:32',
            'choice3' => 'required|max:32',
            'note' => 'max:64'
        ]);

        // チェックボックスが全て空だった場合はリダイレクトしてメッセージを表示
        if ($request->has('valid1') || $request->has('valid2') || $request->has('valid3')) {

            // 画像ファイルを保存できる状態にする
            $filename = $request->image->getClientOriginalName();
            $image = $request->image;
            $path = isset($image) ? $image->storeAs('img/quiz', $filename, 'public') : '';

            // タイトルと画像
            $question = new Question;
            $question->question = $request->input('question');
            // 画像パスの'img/quiz/'の部分を切り抜いて保存
            $question->image = mb_substr($path, 9);
            $question->save();

            // 選択肢１
            $choice1 = new Choice;
            $choice1->question_id = $last_question_id + 1;
            $choice1->choice = $request->input('choice1');
            $choice1->valid = $request->has('valid1') ? true : false;
            $choice1->save();

            // 選択肢2
            $choice2 = new Choice;
            $choice2->question_id = $last_question_id + 1;
            $choice2->choice = $request->input('choice2');
            $choice2->valid = $request->has('valid2') ? true : false;
            $choice2->save();

            // 選択肢3
            $choice3 = new Choice;
            $choice3->question_id = $last_question_id + 1;
            $choice3->choice = $request->input('choice3');
            $choice3->valid = $request->has('valid3') ? true : false;;
            $choice3->save();

            // 引用文
            if ($request->input('note')) {
                $note = new Note;
                $note->question_id = $last_question_id + 1;
                $note->note = $request->input('note');
                $note->save();
            }
            return redirect(route('admin.index'));

        } else {

            $checkbox_error_message = 'どれか一つを選択してください';
            return back()->withInput()->with('error', '選択肢のどれか一つを選択してください');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 編集画面に直接遷移するため使わない
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // タイトルをクリックするとそのIDの詳細ページに遷移
        $question = Question::find($id);
        return view('admin.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
