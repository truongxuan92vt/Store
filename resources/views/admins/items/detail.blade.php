@extends('admins.layouts.master')
@section('title', 'Item')
@section('controller', 'Item')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Item')
@section('content')
    <form autocomplete="off">
        <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
        <div class="form-group row">
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
        <div class="form-group row">
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
                <label class="col-sm-3">Description</label>
                <textarea class="col-sm-9" type="text" id="txt_note_detail" name="note">{{isset($data->note)?$data->note:''}}</textarea>
            </div>
        </div>

        <div style="text-align: center">
            <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
            <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
        </div>
    </form>
    <script>
        $('#btn_cancel').click(function(){
            document.location.href="{{route('admin.item.index')}}";
        });
        $('#btn_save').click(function(){
            var data = {
                id  : $('#txt_id').val(),
                item_name : $('#txt_itemName_detail').val(),
                category_id : $('#cbo_category_detail').val(),
                status : $('#cbo_status_detail').val(),
                note : $('#txt_note_detail').val(),
            };
            $.ajax({
                type:'post',
                url:"{{route('admin.item.save')}}",
                data:JSON.stringify(data),
                dataType:'json',
                contentType:'application/json',
                success:function(res){
                    status = 'error';
                    if(res['status'])
                        status = 'success';
                    $.notify(res['message'], status);
                    ClosePopup();
                    search()
                }
            });
        });
    </script>
@endsection
