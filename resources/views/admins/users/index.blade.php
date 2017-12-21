@extends('admins.layouts.master')
@section('title', 'User')
@section('controller', 'User')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'User')
@section('content')
    <table class="table" xmlns="">
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
                <td><a href="" class="openPopup">{{$user->username}}</a></td>
                <td></td>
                <td></td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script>
        $('.openPopup').on('click',function(){
            $('.modal-body').load('user/detail',function(){
                $('#myModal').modal('show');
            });
        });
    </script>
@endsection