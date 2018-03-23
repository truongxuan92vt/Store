<form method="post" action="{{route('admin.user.save')}}" autocomplete="off" id="frm_userDetail" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="user_id" name="id" value="{{isset($data->id)?$data->id:''}}">
    <div class="col-lg-12">
        <div class="col-md-3">
            <img id="image" src="{{!empty($data->image)?'../upload/avatar/'.$data->image:'../image/avatar.jpeg'}}" alt="your image" height="180" width="200" style="margin-bottom: 10px;"/>
            <input type='file' id="imgInp" name="image" value="{{!empty($data->image)?'../upload/avatar/'.$data->image:'../image/avatar.jpeg'}}"/>
        </div>
        <div class="col-md-9">
            <div class="form-group col-md-12">
                <label class="col-sm-6"> Username</label>
                <input class="col-sm-6" id="txt_username" name="username" value="{{isset($data->username)?$data->username:''}}" >
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">First name</label>
                <input class="col-sm-6" id="txt_firtName" name="first_name" value="{{isset($data->first_name)?$data->first_name:''}}">
            </div>

            <div class="form-group col-md-12">
                <label class="col-sm-6">Last name</label>
                <input class="col-sm-6" id="txt_lastName" name="last_name" value="{{isset($data->last_name)?$data->last_name:''}}">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Email</label>
                <input class="col-sm-6" id="txt_email" name="email" value="{{isset($data->email)?$data->email:''}}">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Password</label>
                <input class="col-sm-6" type="password" id="txt_password" name="password" value="">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Role</label>
                <div class="col-sm-6" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                    <select class="form-control" id="cbo_role" name="role_id" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                        <option value="0" selected="selected">Select a Permission</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(isset($data->role_id) && $role->id==$data->role_id) selected="selected" @endif>{{$role->role_name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <button id='btn_save' type="button" class="btn btn-success btn-sm" >Save</button>
        <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</form>
<script>
    function readUrlReviewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readUrlReviewImage(this);
    });

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

{{--upload multi form--}}
<form id="form1" runat="server" hidden>
    <input type='file' id="imgInp2" multiple />
</form>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var i;
            for (i = 0; i < input.files.length; ++i) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#form1').append('<img src="'+e.target.result+'">');
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $("#imgInp2").change(function(){
        readURL(this);
    });
</script>

