@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- 並び替えのためのフォーム --}}
    <form action="{{ route('admin.index') }}" method="get" class="d-inline-block">
        @csrf
        <input type="submit" value="並び替えを更新する" class="btn btn-primary mb-3">
        <input type="hidden" id="sort-ids" name="sort">
    </form>

    <a href="/admin/create" class="d-inline-block btn btn-primary text-right mb-3">問題を追加する</a>
    <table class="admin__table">

        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>画像</th>
                <th>選択肢</th>
                <th>引用文</th>
            </tr>
        </thead>

        <tbody id="drag-table">
            @foreach ($questions as $index => $question)
                <tr class="table-lists">
                    <td>{{ $question->id }}</td>
                    <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->question }}</a></td>
                    <td><img src="{{ asset('storage/img/quiz/' . $question->image) }}" alt="クイズ画像"></td>
                    <td><a href="{{ route('admin.edit', $question->id) }}">選択肢を編集する</a></td>

                    @foreach ($question->notes as $note)
                        <td>{{ $note->note }}</td>
                    @endforeach

                    <td class="d-none">
                        <input type="hidden" name="question-ids" value="{{ $question->id }}" class="sort-number">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
