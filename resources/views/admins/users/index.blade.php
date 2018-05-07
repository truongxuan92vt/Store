@extends('admins.layouts.master')
@section('title', 'User')
@section('controller', 'User')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'User')
@section('content')
    <div id="frm_searchUser">
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
        <button type="btn_search" class="btn btn-primary btn-sm" onclick="searchUser()">Search</button>
    </div>
    <br/>
    <table id="tbl_user" class="table" xmlns="" style="background-color: #ffffff">
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Avatar</th>
                <th style="text-align: center">Username</th>
                <th style="text-align: center">First name</th>
                <th style="text-align: center">Last name</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Role</th>
                <th style="text-align: center">Created By</th>
                <th style="text-align: center">Created On</th>
                <th style="text-align: center">Updated By</th>
                <th style="text-align: center">Updated On</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=$data->firstItem();?>
            @foreach($data as $user)
            <tr>
                <td style="text-align: center">{{$i}}</td>
                <td style="text-align: center"><img src="{{!empty($user->image)?PRE_LINK_IMAGE_ONL.$user->image:'../image/avatar.jpeg'}}" height="30" width="30"></td>
                <td><a href="#" onclick="openUserDetail('{{$user->id}}')">{{$user->username}}</a></td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_name}}</td>
                <td>{{$user->created_by}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_by}}</td>
                <td>{{$user->updated_at}}</td>
            </tr>
            <?php $i+=1;?>
            @endforeach
            <tr>
                <td colspan="11">
                    <div style="margin-top: 10px;">
                        <div style="float: left;">
                            <?php echo $data->links();?>
                        </div>
                        <p style="background: white; float: right; margin-top: 8px;margin-right: 10px;">{{$data->count()}}/{{$data->total()}} items</p>
                        <div style="padding-left: 0px; padding-right: 0px; height: 30px; float: right; margin-right: 10px;">
                            <select class="form-control" id="cbo_limit" name="status" style="padding-top: 2px; padding-bottom: 2px; height: 29px; margin-top: 3px; width: 65px">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>

                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function(){
            $('#cbo_limit').val({{session('LIMIT')}});
        });
        $('#cbo_limit').on('change',function (e) {
            $.ajax({
                url: "{{route('admin.user.setSession')}}",
                data: JSON.stringify({ limit: $('#cbo_limit').val() }),
                type:'put',
                dataType:'json',
                contentType:'application/json',
                success:function(res){
                    location.reload();
                }
            });

        });
        $('#frm_searchUser').keypress(function(event) {
            var keycode = event.keyCode || event.which;
            if(keycode == '13') {
                searchUser();
            }
        });
        $('#btn_create').on('click',function(){
            loadpopup('user/detail','<b>New</b>','80%',false);
        });
        function openUserDetail(id) {
            loadpopup('user/detail?id='+id,'<b>Detail</b>','80%',false);
        }
        function searchUser(){

            var postData = {
                userName : $('#txt_usernameSearch').val(),
                firstName : $('#txt_firtNameSearch').val(),
                lastName : $('#txt_lastNameSearch').val(),
                email : $('#txt_emailSearch').val()
            };
            $.ajax({
                cache: false,
                type: "get",
                url: "{{route('admin.user.search')}}",
                data: postData,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                complete: function (data) {
                    console.log(data);
                },
                success: function (data) {
                    $("#tbl_user > tbody > tr").remove();
                    console.log(data['data']);
                    for(i=0; i<data['data'].length;i++){
                        row = data['data'][i];
                        num = i+1;
                        first_name = ''
                        if(row['first_name'] != null && row['first_name']!=''){
                            first_name = row['first_name'];
                        }
                        last_name = ''
                        if(row['last_name'] != null && row['last_name']!=''){
                            last_name = row['last_name'];
                        }
                        created_by = ''
                        if(row['created_by'] != null && row['created_by']!=''){
                            created_by = row['created_by'];
                        }
                        updated_by = ''
                        if(row['updated_by'] != null && row['updated_by']!=''){
                            updated_by = row['updated_by'];
                        }
                        email = ''
                        if(row['email'] != null && row['email']!=''){
                            email = row['email'];
                        }
                        image = '../image/avatar.jpeg';
                        if(row['image'] != null && row['image']!=''){
                            image = "{{PRE_LINK_IMAGE_ONL}}"+row['image'];
                        }
                        newRowContent = "<tr>" +
                                "<td style='text-align: center'>"+num+"</td>" +
                                "<td style='text-align: center'><img src="+image+" height='30' width='30'></td>" +
                                "<td><a href='#' onclick='openUserDetail("+row['id']+")'>"+row['username']+"</td>" +
                                "<td>"+first_name+"</td>" +
                                "<td>"+last_name+"</td>" +
                                "<td>"+email+"</td>" +
                                "<td>"+created_by+"</td>" +
                                "<td>"+row['created_at']+"</td>" +
                                "<td>"+updated_by+"</td>" +
                                "<td>"+row['updated_at']+"</td>" +
                            "</tr>";
                        $("#tbl_user tbody").append(newRowContent);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                },
                traditional: true
            });
        }
    </script>
    <style>
        .pagination{
            margin-top: 0px;
            margin-bottom: 0px;
        }
        #tbl_user td
        {
            /*text-align:center;*/
            vertical-align:middle;
        }
    </style>
@endsection