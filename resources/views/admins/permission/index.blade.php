@extends('admins.layouts.master')
@section('title', 'Function')
@section('controller', 'Function')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'Function')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <div class="container">
        <div class="row">
            <form class="form-group">
                <label class="col-md-2" style="margin-top: 5px;">Permission</label>
                <div class="col-md-4">
                    <select class="form-control">
                        <option value="" selected="selected">Select a Permission</option>
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
        $(function () {
            // 6 create an instance when the DOM is ready
            $('#jstree').jstree({
                "types": {
                    "default": {
                        "icon": "fa fa-folder-open treeFolderIcon",
                    }
                },
                "plugins": ["json_data", "types", "wholerow", "search", "checkbox"],
                'core' : {
                    'data' : {
                        'url' : "../admin/function/list",
                        'data' : function (node) {
                            console.log(node);
                            return { 'id' : node.id};
                        }
                    },},
                "json_data": {
                    ajax: {
                        "url": '../admin/function',
                        "type": "GET",
                        "dataType": "json",
                        "contentType": "application/json charset=utf-8",
                    },
                },
            });
            // 7 bind to events triggered on the tree
            $('#jstree').on("changed.jstree", function (e, data) {
                console.log(data.selected);
            });
            // 8 interact with the tree - either way is OK
            $('button').on('click', function () {
                $('#jstree').jstree(true).select_node('child_node_1');
                $('#jstree').jstree('select_node', 'child_node_1');
                $.jstree.reference('#jstree').select_node('child_node_1');
            });
        });
        $(document).ready(function () {
            $('.combobox').combobox();
            //$('.combobox').combobox({newOptionsAllowed: false});
            $('form').submit(function(e){
                e.preventDefault();
                alert($('input[name="normal"]').val());
                alert($('input[name="horizontal"]').val());
                alert($('input[name="inline"]').val());
            });
        });
    </script>
@endsection