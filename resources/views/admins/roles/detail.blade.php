<form>
    {{ csrf_field() }}
    <input type="hidden" id="role_id" name="id" value="{{isset($data->id)?$data->id:''}}">
    <div class="row">
        <label class="col-xs-6">Role name</label>
        <input class="col-xs-6" type="text" id="txt_roleName" name="role_name" value="{{isset($data->role_name)?$data->role_name:''}}">
    </div>
    <div class="row">
        <label class="col-xs-6">Role</label>
        <div class="col-xs-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
            <select class="form-control" id="cbo_status" name="status" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                @foreach($statusList as $item)
                    <option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>
                @endforeach
            </select>
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
            id  : $('#role_id').val(),
            roleName : $('#txt_roleName').val(),
            status : $('#cbo_status').val(),
        };
        $.ajax({
            type:'post',
            url:"{{route('admin.role.save')}}",
            data:JSON.stringify(data),
            dataType:'json',
            contentType:'application/json',
            success:function(res){
                status = 'error';
                if(res['status'])
                    status = 'success';
                $.notify(res['message'], status);
                ClosePopup();
                searchRole()
            }
        });

    });
</script>

