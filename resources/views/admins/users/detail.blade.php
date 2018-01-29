<form method="post" action="{{route('admin.user.save')}}" autocomplete="off" id="frm_userDetail">
    {{ csrf_field() }}
    <input type="hidden" id="user_id" name="id" value="{{isset($data->id)?$data->id:''}}">
    <div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6"> Username</label>
                <input class="col-sm-6" id="txt_username" name="username" value="{{isset($data->username)?$data->username:''}}">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">First name</label>
                <input class="col-sm-6" id="txt_firtName" name="first_name" value="{{isset($data->first_name)?$data->first_name:''}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6">Last name</label>
                <input class="col-sm-6" id="txt_lastName" name="last_name" value="{{isset($data->last_name)?$data->last_name:''}}">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Email</label>
                <input class="col-sm-6" id="txt_email" name="email" value="{{isset($data->email)?$data->email:''}}">
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
        <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</form>
<script>
    $( "#btn_save" ).click(function() {
        username = $('#txt_username').val();
        firstName = $('#txt_firtName').val();
        lastName = $('#txt_lastName').val();
        email = $('#txt_email').val();
        if(username=='' || username == null){
            alert('User name not null');
            return;
        }
        if(email=='' || email == null){
            alert('Email not null');
            return;
        }
        $( "#frm_userDetail" ).submit();
    });
</script>
