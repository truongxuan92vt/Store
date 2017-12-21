@extends('admins.layouts.master')
@section('title', 'User')
@section('controller', 'User')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'User')
@section('content')
    <div>
        <button id='btnCreate' type="button" class="btn btn-success btn-sm" onclick="openPopup()">Create</button>
        <button type="button" class="btn btn-primary btn-sm">Search</button>
    </div>
    <table class="table" xmlns="">
        <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
            <tr>
                <td><input type="checkbox"></td>
                <td><a href="#" onclick="openPopup()">{{$user->username}}</a></td>
                <td></td>
                <td></td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $('.btnCreate').on('click',function(){

        });
        function openPopup(){
            $('.modal-body').load('user/detail',function(){
                $('#myModal').modal({show:true});
            });
        }
    </script>
@endsection