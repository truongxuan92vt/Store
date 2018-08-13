@extends('admins.layouts.master')
@section('title', 'Category')
@section('controller', 'Category')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Category')
@section('content')
<link rel="stylesheet" type="text/css" href="{{plugin_path('/easyui/themes/bootstrap/easyui.css')}}">
<script type="text/javascript" src="{{plugin_path('/easyui/jquery.easyui.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{module_path('/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.css')}}">
<script type="text/javascript" src="{{module_path('/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/uploadMultiFile/uploadMultiFile.js')}}"></script>
<style>
    .row{
        margin-bottom: 5px;
    }
    #frm_uploadFile{
        width: 100px;
        height: 100px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
    }
    #frm_uploadFile img{
        width:100%;
        height:100%;
    }
    #frm_uploadFile label{
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 50px;
        height: 12px;
        font-size: 5px;
        line-height: 12px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto !important;
        text-align: center;
    }

    .fileinput-button {
        top:5px;
        position: relative;
        overflow: hidden;
    }

    .fileinput-button input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px;
        direction: ltr;
        cursor: pointer;
    }

    .thumb {
        height: 200px;
        width: 100%;
        border: 1px solid #000;
    }

    ul.thumb-Images li {
        width: 100%;
        float: left;
        display: inline-block;
        vertical-align: top;
        margin-bottom: 10px;
        /*height: 80px;*/
    }

    .img-wrap {
        position: relative;
        display: inline-block;
        font-size: 0;
        width: 100%;
    }

    .img-wrap .close {
        padding-bottom: 4px !important;
        position: absolute;
        top: 2px;
        right: 2px;
        z-index: 100;
        background-color: #D0E5F5;
        padding: 5px 2px 2px;
        color: #000;
        font-weight: bolder;
        cursor: pointer;
        opacity: .5;
        font-size: 23px;
        line-height: 10px;
        border-radius: 50%;
    }

    .img-wrap:hover .close {
        opacity: 1;
        background-color: #ff0000;
    }

    .FileNameCaptionStyle {
        font-size: 12px;
    }
    #Filelist ul{
        padding: 0px;
    }
</style>
<form autocomplete="off" id="frm_categoryDetail">
    <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
    <?php $thunbnail = isset($data->thunbnail)?$data->thunbnail:''?>
    <div class="row">
        <div class="col-md-2">
            <div id="frm_uploadFile">
                <img id="imageView" src="{{empty($thunbnail)?URL::to('/').'/image/no_image.jpg':$thunbnail}}">
                <label id="lbl_image" title="{{!empty($thunbnail)?$thunbnail:'No file select'}}">Choose file...</label>
                <input type="file" id="image" name="thunbnail" onchange="readURL(this)" style="display: none" value="{{$thunbnail}}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <label class="col-xs-4">Category name</label>
                <div class="col-xs-8">
                    <input style="width: 100%" type="text" id="txt_categoryName_detail" name="category_name" value="{{isset($data->category_name)?$data->category_name:''}}">
                </div>
            </div>
            <div class="row">
                <label class="col-xs-4">Status</label>
                <div class="col-xs-8">
                    <div>
                        <select class="form-control" id="cbo_status_detail" name="status" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                            {{--<option value="0" selected="">Select a Status</option>--}}
                            @foreach($statusList as $item)
                                <option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-xs-4">Description</label>
                <div class="col-xs-8">
                    <textarea style="width: 100%" type="text" id="txt_note_detail" name="note">{{isset($data->note)?$data->note:''}}</textarea>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="row">
                <label class="col-xs-4">Priority</label>
                <div class="col-xs-8">
                    <input id="priority" name="priority" value="{{isset($data->priority)?$data->priority:''}}" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <label class="col-xs-4">Parent</label>
                <div class="col-xs-8">
                    <input id="parent_id" name="parent_id" value="{{isset($data->parent_id)?$data->parent_id:''}}" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <label class="col-xs-4">Icon</label>
                <div class="col-xs-8">
                    <div class="input-group iconpicker-container">
                        <input id="icon" name="icon" class="form-control icp icp-auto iconpicker-element iconpicker-input" value="{{isset($data->icon)?$data->icon:''}}" style="width: 100%">
                        @if(isset($data->icon))
                            <span class="input-group-addon"><i class="fa {{$data->icon}}"></i></span>
                        @else
                            <span class="input-group-addon"><i class=""></i></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center">
        <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
        <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
    <div class="row" id="multiImage">
            <span class="btn btn-success fileinput-button" style="width: 100%">
                <span>Add more Banner</span>
                <input type="file" {{--name="files[]"--}} id="files" multiple accept="image/jpeg, image/png, image/gif," ><br />
            </span>
    <output id="Filelist"></output>
    </div>
</form>
@if(isset($data->banners))
    @foreach($data->banners as $item)
        <script>RenderThumbnail(null,null,"{{$item->url}}")</script>
    @endforeach
@endif
<script>
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
    $('.icp').iconpicker({
        hideOnSelect: true
    });

    $('#parent_id').combotree({
        url: "{{route('admin.category.option')}}"+'?except_id='+"{{isset($data->id)?$data->id:''}}",
        method:'GET',
        // data: JSON.parse('[{"id":1,"text":"City","children":[{"id":11,"text":"Wyoming","children":[{"id":111,"text":"Albin"}]}]}]'),
        // required: true
    });
    function backToIndex(){
        document.location.href="{{route('admin.category.index')}}";
    }
    $('#btn_cancel').click(function(){
        backToIndex();
    });
    $('#btn_save').click(function(){
        /*var data = {
            id  : $('#txt_id').val(),
            category_name : $('#txt_categoryName_detail').val(),
            note : $('#txt_note_detail').val(),
            status : $('#cbo_status_detail').val(),
            parent_id : $('#parent_id').val(),
            icon : $('#icon').val()
        };
        $.ajax({
            type:'post',
            url:"{{route('admin.category.save')}}",
            data:JSON.stringify(data),
            dataType:'json',
            contentType:'application/json',
            success:function(res){
                if(res['status']){
                    backToIndex();
                    toastr.success(res['message']);
                }
                else{
                    toastr.error(res['message']);
                }
            }
        });*/

        var frm = document.getElementById('frm_categoryDetail');
        var form_data = new FormData(frm);
        form_data.append('image_remove',imageRemoves);
        for(i = 0; i<arrPush.length; i++)
        {
            form_data.append("banners[]",arrPush[i]);
        }
        $.ajax({
            url:"{{route('admin.category.save')}}",
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
@endsection
