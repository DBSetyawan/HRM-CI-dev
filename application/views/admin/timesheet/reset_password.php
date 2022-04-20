<?php
/* Attendance view
*/
$system = $this->Xin_model->read_setting_info(1);
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>



<div class="box <?php echo $get_animate;?>">
  <div class="box-body">
    <form id="reset_password_form_1">
         <div class="form-group">
          <label for="user_id_reset">Pilih Karyawan : </label>
          <select name="user_id_reset" id="user_id_reset" class="form-control" data-plugin="select_hrm" data-placeholder="Pilih Karyawan">
            <option value=""></option>
            <?php foreach(get_reports_to() as $reports_to) {?>
            <option value="<?php echo $reports_to->user_id?>" <?php if($reports_to->user_id==$ereports_to):?> selected="selected"<?php endif;?>><?php echo $reports_to->first_name.' '.$reports_to->last_name;?></option>
            <?php } ?>
          </select>
        </div>
        <input type="hidden" name="csrf_hrsale">
        <div class="text-center">
            <button type="button" class="btn btn-md btn-success" id="btn-cancel">CANCEL</button>
            <button type="button" class="btn btn-md btn-danger" id="btn-reset">RESET PASSWORD</button>
        </div>
    </form>
  </div>
</div>
<link rel="stylesheet" href="<?php echo base_url();?>skin/hrsale_assets/vendor/datatables/media/css/dataTables.min.css">

<!-- Modal -->
<div id="modalDetailAttendance" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Anda yakin untuk mereset Password?</h4>
        </div>
        <div class="modal-body">
            <?php $attributes = array('name' => 'reset_password_form', 'id' => 'reset_password_form', 'autocomplete' => 'off', 'role'=>'form');?>
            <?php $hidden = array('_method' => 'RESET', '_token' => '000');?>
            <?php echo form_open(base_url('admin/timesheet/reset_password_post'), $attributes, $hidden);?>
            <input type="hidden" name="user_id_post_reset" id="user_id_post_reset">
            <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="btn-reset-submit" class="btn btn-danger" >RESET</button>
        </div>
    </div>

    </div>
</div>


<script type="text/javascript">
    $(function(){
        $('#btn-reset-submit').click(function(){
            $('#reset_password_form').submit();
        });
        $('#btn-reset').click(function(){
            var user_id_reset = $('#user_id_reset').val();
            if(user_id_reset == ''){
                toastr.error('Pilih Karyawan Terlebih dahulu.');
                $('#user_id_reset').focus();
            }else{
                $('#user_id_post_reset').val(user_id_reset);
                $('#modalDetailAttendance').modal('show');
            }
        });
        $('#btn-cancel').click(function(){
            $('#user_id_reset').val('').trigger('change');
            $('#user_id_post_reset').val('');
        });
    });

    $("#reset_password_form").submit(function(e){
        /*Form Submit*/
        e.preventDefault();
        var obj = $(this), action = obj.attr('name');
        $.ajax({
            type: "POST",
            url: e.target.action,
            data: obj.serialize()+"&is_ajax=2&form="+action,
            cache: false,
            success: function (JSON) {
                if (JSON.error != '') {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                } else {
                    $('#user_id_reset').val('').trigger('change');
                    $('#user_id_post_reset').val('');
                    $('#modalDetailAttendance').modal('toggle');
                    toastr.success(JSON.result);    
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);                
                }
            }
        });
    });

</script>