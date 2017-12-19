@extends('admins.layouts.master')
@section('title', 'User')
@section('controller', 'User')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'User')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
            <tr>
                <td><input type="checkbox"></td>
                <td><a href="">{{$user->username}}</a></td>
                <td></td>
                <td></td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection