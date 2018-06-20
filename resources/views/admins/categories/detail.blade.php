<form autocomplete="off">
    <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
    <div class="col-lg-12">
        <div class="form-group col-md-12">
            <label class="col-sm-6">Category name</label>
            <input class="col-sm-6" type="text" id="txt_categoryName_detail" name="category_name" value="{{isset($data->category_name)?$data->category_name:''}}">
        </div>
        <div class="form-group col-md-12">
            <label class="col-sm-6">Role</label>
            <div class="col-sm-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                <select class="form-control" id="cbo_status_detail" name="status" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                    <option value="0" selected="">Select a Status</option>
                    @foreach($statusList as $item)
                        <option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-sm-6">Description</label>
            <textarea class="col-sm-6" type="text" id="txt_note_detail" name="note">{{isset($data->note)?$data->note:''}}</textarea>
        </div>
    </div>
    <div style="text-align: center">
        <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
        <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</form>
<script>
    $('#btn_save').click(function(){
        var data = {
            id  : $('#txt_id').val(),
            category_name : $('#txt_categoryName_detail').val(),
            note : $('#txt_note_detail').val(),
            status : $('#cbo_status_detail').val(),
        };
        $.ajax({
            type:'post',
            url:"{{route('admin.category.save')}}",
            data:JSON.stringify(data),
            dataType:'json',
            contentType:'application/json',
            success:function(res){
                status = 'error';
                if(res['status'])
                    status = 'success';
                $.notify(res['message'], status);
                ClosePopup();
                searchCategory()
            }
        });

    });
</script>
