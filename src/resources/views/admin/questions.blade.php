@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="/admin/create" class="d-block text-right mb-3"><button class="btn btn-primary">問題を追加する</button></a>
    <table class="admin__table">

        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('question', 'タイトル')</th>
                <th>画像</th>
                <th>選択肢</th>
                <th>引用文</th>
            </tr>
        </thead>

        <tbody id="drag-table">
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->question }}</a></td>
                    <td><img src="{{ asset('storage/img/quiz/' . $question->image) }}" alt="クイズ画像"></td>
                    <td><a href="{{ route('admin.edit', $question->id) }}">選択肢を編集する</a></td>

                    @foreach ($question->notes as $note)
                        <td>{{ $note->note }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
