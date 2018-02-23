@extends('admins.layouts.master')
@section('title', 'Permission')
@section('controller', 'Permission')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'Permission')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <div class="container">
        <div class="row">
            <form class="form-group">
                <label class="col-md-2" style="margin-top: 5px;">Permission</label>
                <div class="col-md-4">
                    <select class="form-control" id="cbo_role">
                        <option value="0" selected="selected">Select a Permission</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
    <br/>
    <div id="jstree"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
        var idRole = 0;
        $(function () {
            createTreeFunction();
            // 7 bind to events triggered on the tree
            // $('#jstree').on("changed.jstree", function (e, data) {
            //     // idTree = data.selected;
            //     // console.log(idTree);
            //     data = $('#jstree').jstree(true).get_selected();
            //     console.log(data);
            // });
            // $('#jstree').on("select_node.jstree deselect_node.jstree", function (e, data) {
            //     data = {
            //         'roleId' : idRole,
            //         'function':{'id':data.node.id,'status':data.node.state.selected}
            //     }
            //     data = JSON.stringify(data);
            //     updatePermissionRole(data);
            // });
        });

        $('#cbo_role').on('change',function () {
            idRole = $(this).val();
            createTreeFunction($(this).val());
            // $('#jstree').jstree(true).refresh();
        });
        function updatePermissionRole(data){
            console.log(data);
            $.ajax({
                type:'put',
                url:"{{route('admin.permission.update')}}",
                data:data ,
                dataType:'json',
                contentType:'application/json',
                success:function(res){
                    status = 'error';
                    if(res['status'])
                        status = 'success';
                    $.notify(res['message'], status);
                }
            });
        }
        function createTreeFunction(role=0){
            $.jstree.destroy ();
            $('#jstree').jstree({
                "types": {
                    "default": {
                        "icon": "fa fa-folder-open treeFolderIcon",
                    }
                },
                "plugins": ["json_data", "wholerow", "search", "checkbox", 'changed'],
                'core' : {
                    'data' : {
                        'url' : "../admin/permission/list/"+role,
                        // 'data' : function (node) {
                        //     console.log(node);
                        //     return { 'id' : node.id};
                        // }
                    },
                },
            }).on("select_node.jstree deselect_node.jstree", function (e, data) {
                data = {
                    'roleId' : idRole,
                    'function':{'id':data.node.id,'status':data.node.state.selected}
                }
                data = JSON.stringify(data);
                updatePermissionRole(data);
            });
        }
    </script>
@endsection