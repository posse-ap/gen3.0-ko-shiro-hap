@extends('layouts.app')

@section('content')
    <table class="admin__table">
        <tr>
            <th>ID</th>
            <th>タイトル</th>
            <th>画像</th>
            <th>選択肢</th>
            <th>引用文</th>
        </tr>

        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->question }}</td>
                <td><img src="{{ asset('img/quiz/' . $question->image) }}" alt="クイズ画像"></td>

                {{-- @foreach ($question->choices as $choice)
                    <td>{{ $choice->choice }}</td>
                @endforeach --}}
                <td><a href="#">選択肢を編集する</a></td>

                @foreach ($question->notes as $note)
                    <td>{{ $note->note }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    </div>
@endsection
