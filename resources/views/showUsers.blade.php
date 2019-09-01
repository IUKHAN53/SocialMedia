@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Basic Table</h2>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <table class="table">
        <thead>
        <tr>
            <th>UserName</th>
            <th>Total Posts</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="/##">{{$user->username}}</a></td>
                    <td>{{count($posts->where('username',$user))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection