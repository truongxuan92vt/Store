@extends('admins.layouts.master')
@section('title', 'Category')
@section('controller', 'Category')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Category')
@section('content')
    <style>
        .row{
            margin-bottom: 5px;
        }
    </style>
    <div id="frm_searchCategory">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <label class="col-xs-6">Category Name</label>
                    <input class="col-xs-6"id="txt_categoryName_search" value="">
                </div>
                <div class="row">
                    <label class="col-xs-6">Status</label>
                    <div class="col-xs-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                        <select class="form-control" id="cbo_status_search" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                            <option value="" selected="">Select a status</option>
                            @foreach($statusList as $item)
                                <option value="{{$item['value']}}">{{$item['text']}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label class="col-xs-6">Description</label>
                    <input class="col-xs-6" id="txt_note_search" value="">
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <button id='btn_create' type="button" class="btn btn-success btn-sm">Create</button>
        <button type="btn_search" class="btn btn-primary btn-sm" onclick="searchCategory()">Search</button>
    </div>
    <br>
    <div style="background-color: white;">
        <table id="category_grid" class="table table-striped table-bordered dt-responsive" style="width:100%"></table>
    </div>

    <script>
        $('#btn_create').on('click',function(){
            loadpopup('category/detail','<b>New</b>','60%',false);
        });
        function searchCategory(){
            categoryTbl.ajax.reload( null, false );
        }
        function openCategoryDetail(id) {
            loadpopup('category/detail?id='+id,'<b>Detail</b>','60%',false);
        }
        $(document).ready(function() {
            categoryTbl = $('#category_grid').DataTable({
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                fixedColumns: true,
                "searching": false,
                "dom": "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i> <'col-sm-2'l><'col-sm-5'p>>",
                "ajax": {
                    "url": "{{route('admin.category.list')}}",
                    "contentType": "application/json",
                    "type": "GET",
                    "dataType":'json',
                    "dataSrc":function(res){
                        if(res.status){
                            console.log(res.data);
                            return res.data;
                        }
                    },
                    // "success":function(res){
                    //     if(res.status){
                    //         console.log(res.data);
                    //         return res.data;
                    //     }
                    // },
                    "data": function ( d ) {
                        return {
                            category_name : $('#txt_categoryName_search').val(),
                            status : $('#cbo_status_search').val(),
                            note : $('#txt_note_search').val(),
                        };
                    },
                },
                columns: [
                    {title:"No",data: null,},
                    // {title:"No",render: function (data, type, row, meta) {
                    //         return meta.row + meta.settings._iDisplayStart + 1;
                    //     }
                    // },
                    {title: "Name",
                        data: "category_name",
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            if(oData.category_name) {
                                // $(nTd).html("<a href='/admin/category?"+oData.id+"'>"+oData.category_name+"</a>");
                                $(nTd).html('<a href="#" onclick="openCategoryDetail('+oData.id+')">'+oData.category_name+'</a>');
                            }
                        }
                    },
                    // {
                    //     name: "Status 2",
                    //     data: "status",
                    //     fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    //         if (oData.status == 'EN') {
                    //             $html = '<label class="switch">\n' +
                    //                 '  <input type="checkbox" checked>\n' +
                    //                 '  <span class="slider round"></span>\n' +
                    //                 '</label>';
                    //             $(nTd).html('<input type="checkbox" checked data-toggle="toggle">');
                    //         }
                    //         else{
                    //             $(nTd).html('<input type="checkbox" data-toggle="toggle">');
                    //         }
                    //     }
                    // },
                    {title:"Status",data:'status_name'},
                    {title:"Description",data:'note'},
                    {title:"Created at",data:'created_at'},
                    {title:"Created by",data:'created_by'},
                    {title:"Updated at",data:'updated_at'},
                    {title:"Updated by",data:'updated_by'}
                ],
                "fnCreatedRow": function (row, data, index) {
                    $('td', row).eq(0).html(index + 1);
                },
                select: true,
                // "order": [[1, 'asc']]
            });
        });
    </script>
@endsection