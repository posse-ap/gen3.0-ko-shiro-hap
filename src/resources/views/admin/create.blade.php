@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <table class="admin__table">

            <tr>
                <th>タイトル</th>
                <td>
                    <input type="text" name="question" value="{{ old('question') }}" class="input-group">
                </td>
                <th>正解</th>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <input type="file" name="image" class="input-group" value="{{ old('image') }}">
                </td>
            </tr>
            <tr>
                <th>選択肢1</th>
                <td>
                    <input type="text" name="choice1" value="{{ old('choice1') }}" class="input-group d-inline">
                </td>
                <td>
                    <input type="checkbox" name="valid1" class="choice-checkbox" id="checkbox1" onclick="checkOnly(this)">
                </td>
            </tr>
            <tr>
                <th>選択肢2</th>
                <td>
                    <input type="text" name="choice2" value="{{ old('choice2') }}" class="input-group">
                </td>
                <td>
                    <input type="checkbox" name="valid2" class="choice-checkbox" id="checkbox2" onclick="checkOnly(this)">
                </td>
            </tr>
            <tr>
                <th>選択肢3</th>
                <td>
                    <input type="text" name="choice3" value="{{ old('choice3') }}" class="input-group">
                </td>
                <td>
                    <input type="checkbox" name="valid3" class="choice-checkbox" id="checkbox3" onclick="checkOnly(this)">
                </td>
            </tr>
            <tr>
                <th>引用文</th>
                <td>
                    <input type="text" name="note" value="{{ old('note') }}" class="input-group">
                </td>
            </tr>
        </table>
        <div class="text-right">
            <input type="reset" value="キャンセル" class="btn btn-primary mt-3" onclick='window.history.back(-1);'>
            <input type="submit" value="追加する" class="btn btn-primary mt-3">
        </div>
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
