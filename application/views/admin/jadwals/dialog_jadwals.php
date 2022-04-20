<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['jadwal_id']) && $_GET['data']=='view_jadwal'){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_hr_view_jadwal');?></h4>
</div>
<form class="m-b-1">
  <div class="modal-body">
    <table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
        <tr>
          <th><?php echo $this->lang->line('module_company_title');?></th>
          <td style="display: table-cell;"><?php foreach($get_all_companies as $company) {?>
            <?php if($company_id==$company->company_id):?>
            <?php echo $company->name;?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
          <td style="display: table-cell;"><?php foreach(explode(',',$employee_id) as $desig_id) {?>
            <?php $assigned_to = $this->Xin_model->read_user_info($desig_id);?>
            <?php echo $assigned_to[0]->first_name.' '.$assigned_to[0]->last_name.'<br>';?>
            <?php //endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_hr_jadwal_title');?></th>
          <td style="display: table-cell;"><?php echo $jadwal_title;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_hr_jadwal_date');?></th>
          <td style="display: table-cell;"><?php echo $this->Xin_model->set_date_format($jadwal_date);?></td>
        </tr>
        <?php $jadwal_time = new DateTime($jadwal_time);?>
        <tr>
          <th><?php echo $this->lang->line('xin_hr_jadwal_time');?></th>
          <td style="display: table-cell;"><?php echo $jadwal_time->format('h:i a');?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_hr_jadwal_note');?></th>
          <td style="display: table-cell;"><?php echo html_entity_decode($jadwal_note);?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  </div>
<?php echo form_close(); ?>
<?php } else if(isset($_GET['jd']) && isset($_GET['jadwal_id']) && $_GET['data']=='jadwal'){
?>
<?php $session = $this->session->userdata('username');?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_hr_edit_jadwal');?></h4>
</div>
<?php $attributes = array('name' => 'edit_jadwal', 'id' => 'edit_jadwal', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $jadwal_id, 'ext_name' => $jadwal_id);?>
<?php echo form_open('admin/jadwals/edit_jadwal/'.$jadwal_id, $attributes, $hidden);?>
  <div class="modal-body">
    
    <div class="row">
      <div class="col-md-6">
    <div class="form-group">
          <label for="title"><?php echo $this->lang->line('xin_hr_jadwal_title');?></label>
          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_hr_jadwal_title');?>" name="jadwal_title" type="text" value="<?php echo $jadwal_title;?>">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="start_date"><?php echo $this->lang->line('xin_hr_jadwal_date');?></label>
              <input class="form-control mdate" name="jadwal_date" readonly="true" type="text" value="<?php echo $jadwal_date;?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="end_date"><?php echo $this->lang->line('xin_hr_jadwal_time');?></label>
              <input class="form-control mtimepicker" name="jadwal_time" readonly="true" type="text" value="<?php echo $jadwal_time;?>">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description"><?php echo $this->lang->line('xin_hr_jadwal_note');?></label>
          <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_hr_jadwal_note');?>" name="jadwal_note" cols="30" rows="5" id="jadwal_note2"><?php echo $jadwal_note;?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
  </div>
<?php echo form_close(); ?>
<script type="text/javascript">
 $(document).ready(function(){
	
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	
	// Date
	$('.mdate').datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat:'yy-mm-dd',
	  yearRange: '1900:' + new Date().getFullYear()
	});
	var input = $('.mtimepicker').clockpicker({
		placement: 'bottom',
		align: 'left',
		autoclose: true,
		'default': 'now'
	});
	jQuery("#aj_companyx").change(function(){
		jQuery.get(base_url+"/get_employees/"+jQuery(this).val(), function(data, status){
			jQuery('#employee_ajaxx').html(data);
		});
	});
	/* Edit*/
	$("#edit_jadwal").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=2&edit_type=jadwal&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit-modal-data').modal('toggle');
					var xin_table = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("admin/jadwals/jadwals_list") ?>",
							type : 'GET'
						},
						dom: 'lBfrtip',
						"buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
					});
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				}
			}
		});
	});
});	
</script>
<?php } ?>
