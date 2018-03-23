@extends('admins.layouts.master')
@section('title', 'Role')
@section('controller', 'Role')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'Role')
@section('content')
    <div id="frm_searchUser">
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6"> Role Name</label>
                <input class="col-sm-6" id="txt_roleNameSearch" value="">
            </div>
            {{--<div class="form-group col-md-12">--}}
                {{--<label class="col-sm-6">First name</label>--}}
                {{--<input class="col-sm-6" id="txt_firtNameSearch" value="">--}}
            {{--</div>--}}
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6">Role</label>
                <div class="col-sm-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                    <select class="form-control" id="cbo_statusSearch" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                        <option value="" selected="">Select a status</option>
                        @foreach($statusList as $item)
                            <option value="{{$item['value']}}">{{$item['text']}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--<div class="form-group col-md-12">--}}
                {{--<label class="col-sm-6">Email</label>--}}
                {{--<input class="col-sm-6" id="txt_emailSearch" value="">--}}
            {{--</div>--}}
        </div>
    </div>
    <div style="text-align: center;">
        <button id='btn_create' type="button" class="btn btn-success btn-sm">Create</button>
        <button type="btn_search" class="btn btn-primary btn-sm" onclick="searchRole()">Search</button>
    </div>
    <br/>
    <table id="tbl_role" class="table" xmlns="" style="background-color: #ffffff">
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Role Name</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Created By</th>
                <th style="text-align: center">Created On</th>
                <th style="text-align: center">Updated By</th>
                <th style="text-align: center">Updated On</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            @foreach($data as $item)
            <tr>
                <td style="text-align: center">{{$i}}</td>
                <td><a href="#" onclick="openRoleDetail('{{$item->id}}')">{{$item->role_name}}</a></td>
                <td>{{$item->cm_name}}</td>
                <td>{{$item->created_by}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_by}}</td>
                <td>{{$item->updated_at}}</td>
            </tr>
            <?php $i+=1;?>
            @endforeach
        </tbody>
    </table>
    <script>
        $('#frm_searchRole').keypress(function(event) {
            var keycode = event.keyCode || event.which;
            if(keycode == '13') {
                searchRole();
            }
        });
        $('#btn_create').on('click',function(){
            loadpopup('role/detail','<b>New</b>','40%',false);
        });
        function openRoleDetail(id) {
            loadpopup('role/detail?id='+id,'<b>Detail</b>','40%',false);
        }
        function searchRole(){

            var postData = {
                roleName : $('#txt_roleNameSearch').val(),
                status : $('#cbo_statusSearch').val(),
                // lastName : $('#txt_lastNameSearch').val(),
                // email : $('#txt_emailSearch').val()
            };
            $.ajax({
                cache: false,
                type: "get",
                url: "{{route('admin.role.search')}}",
                data: postData,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                complete: function (data) {
                    console.log(data);
                },
                success: function (data) {
                    $("#tbl_role > tbody > tr").remove();
                    console.log(data['data']);
                    for(i=0; i<data['data'].length;i++){
                        row = data['data'][i];
                        num = i+1;
                        role_name = ''
                        if(row['role_name'] != null && row['role_name']!=''){
                            role_name = row['role_name'];
                        }
                        created_by = ''
                        if(row['created_by'] != null && row['created_by']!=''){
                            created_by = row['created_by'];
                        }
                        updated_by = ''
                        if(row['updated_by'] != null && row['updated_by']!=''){
                            updated_by = row['updated_by'];
                        }
                        newRowContent = "<tr>" +
                                "<td style='text-align: center'>"+num+"</td>" +
                                "<td><a href='#' onclick='openRoleDetail("+row['id']+")'>"+row['role_name']+"</td>" +
                                "<td>"+row['cm_name']+"</td>" +
                                "<td>"+created_by+"</td>" +
                                "<td>"+row['created_at']+"</td>" +
                                "<td>"+updated_by+"</td>" +
                                "<td>"+row['updated_at']+"</td>" +
                            "</tr>";
                        $("#tbl_role tbody").append(newRowContent);
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
        #tbl_role td
        {
            /*text-align:center;*/
            vertical-align:middle;
        }
    </style>
@endsection