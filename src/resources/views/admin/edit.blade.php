@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.update', $question->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <table class="admin__table">

            <tr>
                <th>タイトル</th>
                <td>
                    <input type="text" name="question" value="{{ old('question') ?? $question->question }}"
                        class="input-group">
                </td>
                <th>正解</th>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <input type="file" name="image" class="input-group"
                        value="{{ asset('storage/img/quiz/img-quiz01.png') }}">
                </td>
            </tr>
            <tr>
                <th>選択肢1</th>
                <td>
                    <input type="text" name="choice1" value="{{ old('choice1') ?? $choices[0]->choice }}"
                        class="input-group d-inline">
                </td>
                <td>
                    <input type="checkbox" name="valid1" value="{{ old('valid1') ?? $choices[0]->valid }}"
                        class="choice-checkbox" id="checkbox1" onclick="checkOnly(this)">
                </td>
            </tr>
            <tr>
                <th>選択肢2</th>
                <td>
                    <input type="text" name="choice2" value="{{ old('choice2') ?? $choices[1]->choice }}"
                        class="input-group">
                </td>
                <td>
                    <input type="checkbox" name="valid2" value="{{ old('valid2') ?? $choices[1]->valid }}"
                        class="choice-checkbox" id="checkbox2" onclick="checkOnly(this)">
                </td>
            </tr>
            <tr>
                <th>選択肢3</th>
                <td>
                    <input type="text" name="choice3" value="{{ old('choice3') ?? $choices[2]->choice }}"
                        class="input-group">
                </td>
                <td>
                    <input type="checkbox" name="valid3" value="{{ old('valid3') ?? $choices[2]->valid }}"
                        class="choice-checkbox" id="checkbox3" onclick="checkOnly(this)">
                </td>
            </tr>
            <tr>
                <th>引用文</th>
                <td>
                    <input type="text" name="note"
                        @if (isset($note)) value="{{ old('note') ?? $note->note }}" @endif
                        class="input-group">
                </td>
            </tr>
        </table>
        <div class="text-right">
            <input type="reset" value="キャンセル" class="btn btn-primary mt-3" onclick='window.history.back(-1);'>
            <input type="submit" value="更新する" class="btn btn-primary mt-3">
        </div>
    </form>
    <form action="{{ route('admin.destroy', $question->id) }}" method="post" class="text-right">
        @csrf
        @method('delete')
        <input type="submit" value="削除する" class="btn btn-danger mt-3" onclick='return confirm("削除しますか？");'>
    </form>

    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('error') }}</li>
            </ul>
        </div>
    @endif
@endsection
