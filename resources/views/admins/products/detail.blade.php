@extends('admins.layouts.master')
{{--@section('title', 'Product')
@section('controller', 'Product')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection--}}
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Product')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('header-button')
    <input id='btn_save' type="button" class="btn btn-success btn-sm" value="Save">
    <input id='btn_cancel' type="button" class="btn btn-default btn-sm" value="Cancel">
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{plugin_path('/easyui/themes/bootstrap/easyui.css')}}">
    <script type="text/javascript" src="{{plugin_path('/easyui/jquery.easyui.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/ckeditor.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/adapters/jquery.js"></script>
    <div class="product-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#pro-general">General</a></li>
            <li><a data-toggle="tab" href="#pro-price">Price</a></li>
            <li><a data-toggle="tab" href="#pro-image">Images</a></li>
            <li><a data-toggle="tab" href="#pro-sku">Sku</a></li>
        </ul>
        <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
        <?php $image = isset($data->image)?$data->image:''?>
        <div class="tab-content">
            <div id="pro-general" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-md-3">
                        <div id="frm_uploadFile" style="width: 100%;">
                            <img id="imageView" src="{{empty($image)?URL::to('/').'/image/no_image.jpg':$image}}">
                            <label id="lbl_image" title="{{!empty($image)?$image:'No file select'}}">Choose file...</label>
                            <input type="file" id="image" name="image" onchange="readURL(this)" style="display: none" value="{{$image}}">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <label class="col-md-2">Product name</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_name_detail" value="{{isset($data->name)?$data->name:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Product Code</label>
                            <div class="col-md-10">
                                <input  class="pro-input" type="text" id="txt_code_detail" value="{{isset($data->code)?$data->code:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Category</label>
                            <div class="col-md-10">
                                <div class="row" style="padding: 0px !important;">
                                    <div class="col-md-5">
                                        <input id="cbo_category_detail" class="pro-input" value="{{isset($data->product_category_id)?$data->product_category_id:''}}" style="width: 100%">
                                    </div>
                                    {{--<label class="col-md-2">Category</label>
                                    <div class="col-md-5 pro-combo" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                                        <select class="pro-input" id="cbo_category_detail" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            <option value="" selected="">Select a category</option>
                                            @foreach($category as $item)
                                                <option value="{{$item['id']}}" @if(isset($data->product_category_id) && $item['id']==$data->product_category_id) selected="selected" @endif>{{$item['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>--}}
                                    <label class="col-md-2" style="text-align: center">Status</label>
                                    <div class="col-md-5 pro-combo" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                                        <select class="pro-input" id="cbo_status_detail" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            {{--<option value="0" selected="">Select a Status</option>--}}
                                            @foreach($statusList as $item)
                                                <option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Meta title</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_title_detail" value="{{isset($data->title)?$data->title:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Tags</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_tag_detail" value="{{isset($data->tag)?$data->tag:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">URL SEO</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_url_seo_detail" value="{{isset($data->url_seo)?$data->url_seo:''}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-2">Short description</label>
                    <div class="col-md-10">
                        <textarea class="pro-input" id="txt_short_desc_detail" aria-label="Short description">{{isset($data->desc->short_desc)?$data->desc->short_desc:''}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Full description</label>
                    <div class="col-md-10">
                        <textarea class="pro-input" id="txt_long_desc_detail">{{isset($data->desc->long_desc)?$data->desc->long_desc:''}}</textarea>
                    </div>
                </div>

            </div>
            <div id="pro-image" class="tab-pane fade">

            </div>
            <div id="pro-price" class="tab-pane fade">

            </div>
        </div>
    </div>
    <script>
        $('#cbo_category_detail').combotree({
            url: "{{route('admin.category.option')}}",
            method:'GET',
            // data: JSON.parse('[{"id":1,"text":"City","children":[{"id":11,"text":"Wyoming","children":[{"id":111,"text":"Albin"}]}]}]'),
            // required: true
        });
        $('#frm_uploadFile label').click(function(){ $('#image').trigger('click');});
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageView').attr('src', e.target.result);
                    $('#lbl_image').attr('title', input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $( '#txt_long_desc_detail' ).ckeditor( function( textarea ) {},{
                filebrowserBrowseUrl: '/plugin/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '/plugin/ckfinder/ckfinder.html?Type=Images',
                filebrowserUploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserWindowWidth : '1000',
                filebrowserWindowHeight : '700'
        });
        $('#btn_save').on('click',function(){
            alert(123);
        });
    </script>
@endsection
