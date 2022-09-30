@extends('layouts.app')

@section('content')
    <div class="admin__login">
        <p class="admin__login__message">{{ $message }}</p>
        <form action="/admin/login" class="login__form" method="post">
            <table>
                @csrf
                <tr>
                    <th>mail: </th>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <th>password: </th>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" name="send"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection

{{-- 使ってない --}}
