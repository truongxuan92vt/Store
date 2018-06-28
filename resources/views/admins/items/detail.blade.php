@extends('admins.layouts.master')
@section('title', 'Item')
@section('controller', 'Item')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Item')
@section('content')
    {{--<script type="text/javascript" src="{{URL::to('/')}}//node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>--}}
    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/ckeditor.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/adapters/jquery.js"></script>
    <form autocomplete="off">
        <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
        <div class="row">
            <div class="col-md-6">
                <label class="col-sm-3">Item name</label>
                <input class="col-sm-9" type="text" id="txt_itemName_detail" name="item_name" value="{{isset($data->item_name)?$data->item_name:''}}">
            </div>
            <div class="col-md-6">
                <label class="col-sm-3">Status</label>
                <div class="col-sm-9" style="padding-left: 0px; padding-right: 0px; height: 30px;">
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
            <div class="col-md-6">
                <label class="col-sm-3">Category</label>
                <div class="col-sm-9" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                    <select class="form-control" id="cbo_category_detail" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                        <option value="" selected="">Select a category</option>
                        @foreach($category as $item)
                            <option value="{{$item['id']}}" @if(isset($data->category_id) && $item['id']==$data->category_id) selected="selected" @endif>{{$item['category_name']}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="col-md-3">Note</label>
                <textarea class="col-md-9" type="text" id="txt_note_detail" name="note" rows="3" cols="50">{{isset($data->note)?$data->note:''}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="col-md-12">Description</label>
            </div>
        </div>

        <div class="row" style="margin: 0 0 0 5px; padding-left:10px;">
            <textarea type="text" id="txt_des_detail" name="note">{{isset($data->des)?$data->des:''}}</textarea>
        </div>
        <br>
        <div style="text-align: center">
            <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
            <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
        </div>
    </form>
    <script>
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
        // CKEDITOR.editorConfig = function( config ) {
        //     config.toolbarGroups = [
        //         { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        //         { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        //         { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        //         { name: 'forms', groups: [ 'forms' ] },
        //         // '/',
        //         { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        //         { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        //         { name: 'links', groups: [ 'links' ] },
        //         { name: 'insert', groups: [ 'insert' ] },
        //         // '/',
        //         { name: 'styles', groups: [ 'styles' ] },
        //         { name: 'colors', groups: [ 'colors' ] },
        //         { name: 'tools', groups: [ 'tools' ] },
        //         { name: 'others', groups: [ 'others' ] },
        //         { name: 'about', groups: [ 'about' ] }
        //     ];
        // };
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
            $.ajax({
                type:'post',
                url:"{{route('admin.item.save')}}",
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
            });
        });
    </script>
@endsection
