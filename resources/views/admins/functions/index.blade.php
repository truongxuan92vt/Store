@extends('admins.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <table class="table">
        <thead>
        <tr>
            <th width="1%"></th>
            <th width="30%">Function Name</th>
            <th width="15%">Url</th>
            <th width="10%">Icon</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{{$item['function_name']}}</td>
                    <td>{{$item['url']}}</td>
                    <td><i class="{{$item['icon']}}" aria-hidden="true"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection