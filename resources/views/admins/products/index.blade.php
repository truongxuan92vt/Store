@extends('admins.layouts.master')
@section('title', 'Product')
@section('controller', 'Product')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Product')
@section('content')
    <div id="frm_search">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <label class="col-xs-6">Product Name</label>
                    <input class="col-xs-6" id="txt_productName_search" value="">
                </div>

                <div class="row">
                    <label class="col-xs-6">Category</label>
                    <div class="col-xs-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                        <select class="form-control" id="cbo_category_search" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                            <option value="" selected="">Select a category</option>
                            @foreach($category as $item)
                                <option value="{{$item['id']}}">{{$item['name']}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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
        </div>
        <div class="row">

        </div>
    </div>
    <div style="text-align: center;">
        <button id='btn_create' type="button" class="btn btn-success btn-sm">Create</button>
        <button type="btn_search" class="btn btn-primary btn-sm" onclick="search()">Search</button>
    </div>
    <br>
    <div style="background-color: white">
        <table id="product_grid" class="table table-striped table-bordered dt-responsive" style="width:100%"></table>
    </div>
    <script>
        $('#btn_create').on('click',function(){
            document.location.href="{!! route('admin.product.detail'); !!}";
            {{--location.href="{{route('admin.item.detail')}}"--}}
{{--            window.location.assign('{{route('admin.item.detail')}}');--}}
            // loadpopup('item/detail','<b>New</b>','60%',true);
        });
        function search(){
            categoryTbl.ajax.reload( null, false );
        }
        function openDetail(id) {
            url = "{{route('admin.product.detail')}}"+'?id='+id;
            document.location.href=url;
            // loadpopup('item/detail?id='+id,'<b>Detail</b>','60%',false);
        }
        $(document).ready(function() {
            categoryTbl = $('#product_grid').DataTable({
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                fixedColumns: true,
                "searching": false,
                "dom": "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i> <'col-sm-2'l><'col-sm-5'p>>",
                "ajax": {
                    "url": "{{route('admin.product.list')}}",
                    "contentType": "application/json",
                    "type": "GET",
                    "dataType":'json',
                    "dataSrc":function(res){
                        if(res.status){
                            // console.log(res.data);
                            return res.data;
                        }
                    },
                    "data": function ( d ) {
                        return {
                            name : $('#txt_productName_search').val(),
                            status : $('#cbo_status_search').val(),
                            category : $('#cbo_category_search').val(),
                        };
                    },
                },
                columns: [
                    {title:"No",data: null,},
                    {title: "Name",
                        data: "name",
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            if(oData.name) {
                                // $(nTd).html("<a href='/admin/category?"+oData.id+"'>"+oData.name+"</a>");
                                $(nTd).html('<a href="#" onclick="openDetail('+oData.id+')">'+oData.name+'</a>');
                            }
                        }
                    },
                    // {title:"Status",data:'status_name'},
                    // {title:"Note",data:'note'},
                    // {title:"Created at",data:'created_at'},
                    // {title:"Created by",data:'created_by'},
                    {title:"Updated at",data:'updated_at'},
                    {title:"Updated by",data:'updated_by'}
                ],
                "fnCreatedRow": function (row, data, index) {
                    $('td', row).eq(0).html(index + 1);
                },
                select: true,
            });
        });
    </script>
@endsection