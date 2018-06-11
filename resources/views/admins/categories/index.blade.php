@extends('admins.layouts.master')
@section('title', 'Category')
@section('controller', 'Category')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Category')
@section('content')
<div id="frm_searchCategory">
    <div class="row">
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
</div>
<div style="text-align: center;">
    <button id='btn_create' type="button" class="btn btn-success btn-sm">Create</button>
    <button type="btn_search" class="btn btn-primary btn-sm">Search</button>
</div>
@endsection