@extends('admins.layouts.master')
@section('title', 'Item')
@section('controller', 'Item')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Item')
@section('content')
<form {{--method="post" action="{{route('admin.user.save')}}"--}} autocomplete="off" id="frm_userDetail">
    {{ csrf_field() }}
    <input type="hidden" id="user_id" name="id" value="{{isset($data->id)?$data->id:''}}">
    <div class="row">
        <div class="col-md-3" style="text-align: center">
            <div>
                <img id="image" src="{{!empty($data->image)?$data->image:URL::to('/').'/image/no_image.jpg'}}" alt="your image" height="180" width="200" style="margin-bottom: 10px;"/>
                <input type='file' id="imgInp" name="image" value="{{!empty($data->image)?$data->image:url('/').'/image/avatar.jpeg'}}" />
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <label class="col-xs-6"> Username</label>
                <input class="col-xs-6" id="txt_username" name="username" value="{{isset($data->username)?$data->username:''}}" >
            </div>
            <div class="row">
                <label class="col-xs-6">First name</label>
                <input class="col-xs-6" id="txt_firtName" name="first_name" value="{{isset($data->first_name)?$data->first_name:''}}">
            </div>

            <div class="row">
                <label class="col-xs-6">Last name</label>
                <input class="col-xs-6" id="txt_lastName" name="last_name" value="{{isset($data->last_name)?$data->last_name:''}}">
            </div>
            <div class="row">
                <label class="col-xs-6">Email</label>
                <input class="col-xs-6" id="txt_email" name="email" value="{{isset($data->email)?$data->email:''}}">
            </div>
            <div class="row">
                <label class="col-xs-6">Password</label>
                <input class="col-xs-6" type="password" id="txt_password" name="password" value="">
            </div>
            <div class="row">
                <label class="col-xs-6">Role</label>
                <div class="col-xs-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                    <select class="form-control" id="cbo_role" name="role_id" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                        <option value="0" selected="selected">Select a Permission</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(isset($data->role_id) && $role->id==$data->role_id) selected="selected" @endif>{{$role->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
        <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</form>
<script>
    function backToIndex(){
        document.location.href="{{route('admin.user.index')}}";
    }
    $('#btn_cancel').click(function(){
        backToIndex();
    });
    function readUrlReviewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readUrlReviewImage(this);
    });

    $( "#btn_save" ).click(function() {
        username = $('#txt_username').val();
        firstName = $('#txt_firtName').val();
        lastName = $('#txt_lastName').val();
        email = $('#txt_email').val();
        if(username=='' || username == null){
            alert('User name not null');
            return;
        }
        if(email=='' || email == null){
            alert('Email not null');
            return;
        }
        // $( "#frm_userDetail" ).submit();
        var frm_item = document.getElementById('frm_userDetail');
        var form_data = new FormData(frm_item);
        $.ajax({
            url:"{{route('admin.user.save')}}",
            // dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (res) {
                // console.log(res);
                if(res['status']){
                    backToIndex();
                    toastr.success(res['message']);
                }
                else{
                    toastr.error(res['message']);
                }
            },
            error: function (res) {
                console.log(res);
            }
        });
    });
</script>

{{--upload multi form--}}
<form id="form1" runat="server" hidden>
    <input type='file' id="imgInp2" multiple />
</form>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var i;
            for (i = 0; i < input.files.length; ++i) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#form1').append('<img src="'+e.target.result+'">');
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $("#imgInp2").change(function(){
        readURL(this);
    });
</script>
@endsection

