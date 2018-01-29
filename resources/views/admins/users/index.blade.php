@extends('admins.layouts.master')
@section('title', 'User')
@section('controller', 'User')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'User')
@section('content')
    <div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6"> Username</label>
                <input class="col-sm-6" id="txt_usernameSearch" value="">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">First name</label>
                <input class="col-sm-6" id="txt_firtNameSearch" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6">Last name</label>
                <input class="col-sm-6" id="txt_lastNameSearch" value="">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Email</label>
                <input class="col-sm-6" id="txt_emailSearch" value="">
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <button id='btn_create' type="button" class="btn btn-success btn-sm">Create</button>
        <button type="btn_search" class="btn btn-primary btn-sm">Search</button>
    </div>
    <br/>
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
                <td><a href="#" onclick="openUserDetail('{{$user->id}}')">{{$user->username}}</a></td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $('#btn_create').on('click',function(){
            loadpopup('user/detail','<b>New</b>','80%',false);
        });
        function openUserDetail(id) {
            loadpopup('user/detail?id='+id,'<b>Detail</b>','80%',false);
        }
    </script>
@endsection