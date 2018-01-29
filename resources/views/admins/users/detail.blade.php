<form>
    <div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6"> Username</label>
                <input class="col-sm-6" id="txt_username" value="{{isset($data->username)?$data->username:''}}">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Full name</label>
                <input class="col-sm-6" id="txt_fullName" value="{{isset($data->firt_name)?$data->first_name:''}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <label class="col-sm-6">Last name</label>
                <input class="col-sm-6" id="txt_lastName" value="{{isset($data->last_name)?$data->last_name:''}}">
            </div>
            <div class="form-group col-md-12">
                <label class="col-sm-6">Email</label>
                <input class="col-sm-6" id="txt_email" value="{{isset($data->email)?$data->email:''}}">
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <button id='btn_create' type="button" class="btn btn-success btn-sm" >Save</button>
        <button id='btn_cancel' type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</form>
<script>

</script>