@extends('admins.layouts.master')
@section('title', 'Function')
@section('controller', 'Function')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'Function')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <div id="jstree"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <div id="alerID"></div>
    <script>

        $(function () {
            // 6 create an instance when the DOM is ready
            $('#jstree').jstree({
                "types": {
                    "default": {
                        "icon": "fa fa-folder-open treeFolderIcon",
                    }
                },
                checkbox: {
                    // three_state : true, // to avoid that fact that checking a node also check others
                    // whole_node : true,  // to avoid checking the box just clicking the node
                    // tie_selection : false // for checking without selecting and selecting without checking
                },
                "plugins": ["json_data", "wholerow", "checkbox", "changed"],
                'core' : {
                    'data' : {
                        'url' : "../admin/function/list",
                        'data' : function (node) {
                            // console.log(node);
                            return { 'id' : node.id};
                        }
                    },},
                // "json_data": {
                //     ajax: {
                //         "url": '../admin/function',
                //         "type": "GET",
                //         "dataType": "json",
                //         "contentType": "application/json charset=utf-8",
                //     },
                // },
            });

            // 7 bind to events triggered on the tree
            $('#jstree').on("select_node.jstree deselect_node.jstree", function (e, data) {
                // console.log("node_id: " + data.node.id + data.node.state.selected);
                data = JSON.stringify({'id':data.node.id,'status':data.node.state.selected});
                updateFunction(data);
            });
            // 8 interact with the tree - either way is OK
            // $('button').on('click', function () {
            //     $('#jstree').jstree(true).select_node('child_node_1');
            //     $('#jstree').jstree('select_node', 'child_node_1');
            //     $.jstree.reference('#jstree').select_node('child_node_1');
            // });
        });
        // $("#jstree") .on("changed.jstree", function (e, data) {
        //     console.log(data.changed.selected); // newly selected
        //     // console.log(data.changed.deselected); // newly deselected
        // })

        // $('#jstree').on("changed.jstree", function (e, data) {
        //     console.log(data.selected);
        //     // updateFunction(data.selected)
        // });
        function updateFunction(data){
            $.ajax({
                type:'put',
                url:"{{route('admin.function.update')}}",
                data:data ,
                dataType:'json',
                contentType:'application/json',
                success:function(res){
                    // alert(123);
                    // alert(res['message']);
                    status = 'error';
                    if(res['status'])
                        status = 'success';
                    $.notify(res['message'], status);
                }
            });
        }
    </script>
@endsection