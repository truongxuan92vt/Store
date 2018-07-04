@extends('admins.layouts.master')
@section('title', 'Item')
@section('controller', 'Item')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Item')
@section('content')
    <style type="text/css">
        .row{
            margin-bottom: 5px;
        }
        #frm_uploadFile{
            width: 200px;
            height: 200px;
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
            width: 100px;
            height: 25px;
            font-size: 10px;
            line-height: 25px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto !important;
            text-align: center;
        }
    </style>
    {{--<script type="text/javascript" src="{{URL::to('/')}}//node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>--}}
    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/ckeditor.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/adapters/jquery.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/js/uploadMultiFile.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/css/uploadMultiFile.css">
    <form autocomplete="off" id="frm_item" name="frm_item">
        <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
        <?php $image = isset($data->image)?$data->image:''?>
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div id="frm_uploadFile" style="width: 100%;">
                        <img id="imageView" src="{{empty($image)?URL::to('/').'/image/no_image.jpg':$image}}">
                        <label id="lbl_image" title="{{!empty($image)?$image:'No file select'}}">Choose file...</label>
                        <input type="file" id="image" name="image" onchange="readURL(this)" style="display: none" value="{{$image}}">
                    </div>
                </div>
                <div class="row" id="multiImage">
                    <span class="btn btn-success fileinput-button" style="width: 100%">
                        <span>Add more Image</span>
                        <input type="file" {{--name="files[]"--}} id="files" multiple accept="image/jpeg, image/png, image/gif," ><br />
                    </span>
                    <output id="Filelist"></output>
                </div>
            </div>
            <br>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-sm-2">Name</label>
                        <input class="col-sm-10" type="text" id="txt_itemName_detail" name="item_name" value="{{isset($data->item_name)?$data->item_name:''}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-sm-2">Category</label>
                        <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                            <select class="form-control" id="cbo_category_detail" name="category_id" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                <option value="" selected="">Select a category</option>
                                @foreach($category as $item)
                                    <option value="{{$item['id']}}" @if(isset($data->category_id) && $item['id']==$data->category_id) selected="selected" @endif>{{$item['category_name']}} </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2">Status</label>
                        <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px; height: 30px;">
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
                    <div class="col-md-12">
                        <label class="col-sm-2">Note</label>
                        <textarea class="col-sm-10" type="text" id="txt_note_detail" name="note" rows="3" cols="50">{{isset($data->note)?$data->note:''}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-sm-12">Description</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <textarea type="text" id="txt_des_detail" name="des">{{isset($data->des)?$data->des:''}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div style="text-align: center">
            <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
            <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
        </div>
    </form>

    @if(isset($data->images))
        @foreach($data->images as $item)
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
        CKEDITOR.config.toolbar = [
            /*
            { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
            { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
            '/',
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
            { name: 'about', items: [ 'About' ] }
            */
            { name: 'document', items: [ 'Maximize', 'Source', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'RemoveFormat',
                    'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'BidiLtr', 'BidiRtl',
                    'Styles', 'Format', 'Font', 'FontSize',
                    'TextColor', 'BGColor',
                    'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe',
                    'Undo', 'Redo',
                    'Link', 'Unlink',
            ] }
        ];
        /*ClassicEditor
            .create( document.querySelector( '#txt_des_detail' ),{
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                ckfinder: {
                    uploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                }
            })
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );*/
        $( '#txt_des_detail' ).ckeditor( function( textarea ) {},
        {
            filebrowserBrowseUrl: '/plugin/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/plugin/ckfinder/ckfinder.html?Type=Images',
            filebrowserUploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserWindowWidth : '1000',
            filebrowserWindowHeight : '700'
        });
        function backToIndex(){
            document.location.href="{{route('admin.item.index')}}";
        }
        $('#btn_cancel').click(function(){
            backToIndex();
        });
        $('#btn_save').click(function(){
            var data = {
                id  : $('#txt_id').val(),
                item_name : $('#txt_itemName_detail').val(),
                category_id : $('#cbo_category_detail').val(),
                status : $('#cbo_status_detail').val(),
                des : $('#txt_des_detail').val(),
                note : $('#txt_note_detail').val(),
            };
            // data = document.forms["frm_item"];
            // console.log($('#frm_item').serialize());
            // console.log($('#frm_item').serializeArray());
            // console.log(document.getElementById('image').files);
            var frm_item = document.getElementById('frm_item');
            var form_data = new FormData(frm_item);
            form_data.append('image',document.getElementById('image').files);
            form_data.append('des',$('#txt_des_detail').val());
            form_data.append('image_remove',imageRemoves);
           /* var ins = document.getElementById('files').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('files').files[x]);
            }*/
            for(i = 0; i<arrPush.length; i++)
            {
                form_data.append("files[]",arrPush[i]);
            }
            $.ajax({
                url:"{{route('admin.item.save')}}",
                // dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    console.log(res);
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

            /*$.ajax({
                type:'post',
                url:"{{route('admin.item.save')}}",
                data:JSON.stringify(data),
                dataType:'json',
                contentType:'application/json',
                success:function(res){
                    if(res['status']){
                        // backToIndex();
                        toastr.success(res['message']);
                    }
                    else{
                        toastr.error(res['message']);
                    }

                }
            });*/
        });
    </script>

@endsection
