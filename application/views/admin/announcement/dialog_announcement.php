<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$photo_announcement = str_replace('[removed]','',$photo_announcement);
if(isset($_GET['jd']) && isset($_GET['announcement_id']) && $_GET['data']=='announcement'){
?>
<?php $session = $this->session->userdata('username');?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_announcement');?></h4>
</div>
<?php $attributes = array('name' => 'edit_announcement', 'id' => 'edit_announcement', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $announcement_id, 'ext_name' => $title);?>
<?php echo form_open_multipart('admin/announcement/update/'.$announcement_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="title"><?php echo $this->lang->line('xin_title');?></label>
        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_title');?>" name="title" type="text" value="<?php echo $title;?>">
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
            <input class="form-control d_date" name="start_date_modal" readonly="true" type="text" value="<?php echo $start_date;?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
            <input class="form-control d_date" name="end_date_modal" readonly="true" type="text" value="<?php echo $end_date;?>">
          </div>
        </div>
      </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="description"><?php echo $this->lang->line('xin_description');?></label>
        <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="6" id="description2"><?php echo $description;?></textarea>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="summary"><?php echo $this->lang->line('xin_summary');?></label>
    <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_summary');?>" name="summary" cols="30" rows="3" id="summary"><?php echo $summary;?></textarea>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="description">Foto : </label>
        <input type="hidden" name="photo_announcement" id="photo_announcement_edit" value="<?php echo $photo_announcement;?>">
        <div id="camera_open" style="display: none;">
            <button type="button" class="btn btn-success" onClick="take_snapshot_edit()"> <i class="fa fa-camera"></i> Take </button>
            <button type="button" class="btn btn-default" onClick="close_camera()">Cancel</button><br>
            <div id="my_camera_edit" class="text-center"></div>
        </div>
        <div id="camera_hide">
            <button type="button" class="btn btn-success text-uppercase" id="take_picture_edit" >Ambil Gambar</button>
            <div id="results_image_edit" class="text-center">
                <img width="500" src="data:image/jpeg||image/gif||image/png;base64,<?php echo $photo_announcement;?>">
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php $count_module_attributes = $this->Custom_fields_model->count_announcements_module_attributes();?>
    <?php $module_attributes = $this->Custom_fields_model->announcements_hrsale_module_attributes();?>
    <div class="row">
      <?php foreach($module_attributes as $mattribute):?>
      <?php $attribute_info = $this->Custom_fields_model->get_employee_custom_data($announcement_id,$mattribute->custom_field_id);?>
      <?php
            if(!is_null($attribute_info)){
                $attr_val = $attribute_info->attribute_value;
            } else {
                $attr_val = '';
            }
        ?>
      <?php if($mattribute->attribute_type == 'date'){?>
      <div class="col-md-4">
        <div class="form-group">
          <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
          <input class="form-control d_date" placeholder="<?php echo $mattribute->attribute_label;?>" name="<?php echo $mattribute->attribute;?>" type="text" value="<?php echo $attr_val;?>">
        </div>
      </div>
      <?php } else if($mattribute->attribute_type == 'select'){?>
      <div class="col-md-4">
        <?php $iselc_val = $this->Custom_fields_model->get_attribute_selection_values($mattribute->custom_field_id);?>
        <div class="form-group">
          <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
          <select class="form-control" name="<?php echo $mattribute->attribute;?>" data-plugin="select_hrm" data-placeholder="<?php echo $mattribute->attribute_label;?>">
            <?php foreach($iselc_val as $selc_val) {?>
            <option value="<?php echo $selc_val->attributes_select_value_id?>" <?php if($attr_val==$selc_val->attributes_select_value_id):?> selected="selected"<?php endif;?>><?php echo $selc_val->select_label?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <?php } else if($mattribute->attribute_type == 'multiselect'){?>
      <?php $multiselect_values = explode(',',$attr_val);?>
      <div class="col-md-4">
        <?php $imulti_selc_val = $this->Custom_fields_model->get_attribute_selection_values($mattribute->custom_field_id);?>
        <div class="form-group">
          <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
          <select multiple="multiple" class="form-control" name="<?php echo $mattribute->attribute;?>[]" data-plugin="select_hrm" data-placeholder="<?php echo $mattribute->attribute_label;?>">
            <?php foreach($imulti_selc_val as $multi_selc_val) {?>
            <option value="<?php echo $multi_selc_val->attributes_select_value_id?>" <?php if(in_array($multi_selc_val->attributes_select_value_id,$multiselect_values)):?> selected <?php endif;?>><?php echo $multi_selc_val->select_label?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <?php } else if($mattribute->attribute_type == 'textarea'){?>
      <div class="col-md-8">
        <div class="form-group">
          <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
          <input class="form-control" placeholder="<?php echo $mattribute->attribute_label;?>" name="<?php echo $mattribute->attribute;?>" type="text" value="<?php echo $attr_val;?>">
        </div>
      </div>
      <?php } else if($mattribute->attribute_type == 'fileupload'){?>
      <div class="col-md-4">
        <div class="form-group">
          <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?>
            <?php if($attr_val!=''):?>
            <a href="<?php echo site_url('admin/download');?>?type=custom_files&filename=<?php echo $attr_val;?>"><?php echo $this->lang->line('xin_download');?></a>
            <?php endif;?>
          </label>
          <input class="form-control-file" name="<?php echo $mattribute->attribute;?>" type="file">
        </div>
      </div>
      <?php } else { ?>
      <div class="col-md-4">
        <div class="form-group">
          <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
          <input class="form-control" placeholder="<?php echo $mattribute->attribute_label;?>" name="<?php echo $mattribute->attribute;?>" type="text" value="<?php echo $attr_val;?>">
        </div>
      </div>
      <?php }	?>
      <?php endforeach;?>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?> 
<script type="text/javascript">
 $(document).ready(function(){
							
		//$('#description2').trumbowyg();
		
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });
		
		jQuery("#ajx_company").change(function(){
			/*jQuery.get(base_url+"/get_departments/"+jQuery(this).val(), function(data, status){
				jQuery('#department_ajx').html(data);
			});*/
			jQuery.get(escapeHtmlSecure(base_url+"/get_company_elocations_dialog/"+jQuery(this).val()), function(data, status){
				jQuery('#location_ajx').html(data);
			});
		});	 
		jQuery("#aj_location_idx").change(function(){
		jQuery.get(base_url+"/get_location_departments_dialog/"+jQuery(this).val(), function(data, status){
			jQuery('#department_ajx').html(data);
		});
	});
		
		$('.d_date').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd',
		yearRange: '1900:' + (new Date().getFullYear() + 10),
		beforeShow: function(input) {
			$(input).datepicker("widget").show();
		}
		});

		/* Edit data */
		$("#edit_announcement").submit(function(e){
		var fd = new FormData(this);
		var obj = $(this), action = obj.attr('name');
		fd.append("is_ajax", 1);
		fd.append("edit_type", 'announcement');
		fd.append("form", action);
		e.preventDefault();
		$('.icon-spinner3').show();
		$('.save').prop('disabled', true);
		$.ajax({
			url: e.target.action,
			type: "POST",
			data:  fd,
			contentType: false,
			cache: false,
			processData:false,
			success: function(JSON)
			{
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
						$('.save').prop('disabled', false);
						$('.icon-spinner3').hide();
				} else {
					// On page load: datatable
					var xin_table = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("admin/announcement/announcement_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
					});
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.icon-spinner3').hide();
					$('.edit-modal-data').modal('toggle');
					$('.save').prop('disabled', false);
				}
			},
			error: function() 
			{
				toastr.error(JSON.error);
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			} 	        
	   });
	});
});	
</script>


<script type="text/javascript" src="<?php echo base_url();?>skin/hrsale_assets/vendor/webcamjs/webcam.min.js"></script>

<script language="JavaScript">
     Webcam.set({
      width: 500,
      height: 400,
      image_format: 'jpeg',
      jpeg_quality: 90
     });

     // preload shutter audio clip
     var shutter = new Audio();
     shutter.autoplay = true;
     shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

    function take_snapshot_edit() {
        shutter.play();
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('results_image_edit').innerHTML = 
            '<img src="'+data_uri+'"/>';
            console.log(data_uri);
            $('#photo_announcement_edit').val(data_uri);
            // $('#image_in').val(data_uri);
            $('#camera_open').hide();
            $('#camera_hide').show();
            // $('#btn_submit_div').show();
            Webcam.reset();
        });
    }

    function opencameraedit(){
        Webcam.attach( '#my_camera_edit' );
    }
    
    function close_camera(){
        $('#camera_open').hide();
        $('#camera_hide').show();
        Webcam.reset();
    }
    
    $(function(){
        $('#take_picture_edit').click(function(){
            $('#camera_open').show();
            $('#camera_hide').hide();
            opencameraedit();
        });

        // $('#submit_btn_attendance').click(function(){
        //     var form_submit = $('#set_clocking').serialize();
        //     $('#set_clocking').submit();
        // });

    })
</script>

<?php } else if(isset($_GET['jd']) && isset($_GET['announcement_id']) && $_GET['data']=='view_announcement'){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_announcement');?></h4>
</div>
<form class="m-b-1">
<div class="modal-body">
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
        <tr>
          <th><?php echo $this->lang->line('xin_title');?></th>
          <td style="display: table-cell;"><?php echo $title;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_start_date');?></th>
          <td style="display: table-cell;"><?php echo $start_date;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_end_date');?></th>
          <td style="display: table-cell;"><?php echo $end_date;?></td>
        </tr>
        
        <?php
        /*
        <tr>
          <th><?php echo $this->lang->line('module_company_title');?></th>
          <td style="display: table-cell;"><?php foreach($get_all_companies as $company) {?>
            <?php if($company->company_id==$company_id):?>
            <?php echo $company->name?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_department');?></th>
          <td style="display: table-cell;"><?php foreach($all_departments as $department) {?>
            <?php if($department->department_id==$department_id):?>
            <?php echo $department->department_name?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('xin_summary');?></th>
          <td style="display: table-cell;"><?php echo html_entity_decode($summary);?></td>
        </tr>
        */
        ?>
        <tr>
          <th><?php echo $this->lang->line('xin_description');?></th>
          <td style="display: table-cell;"><?php echo html_entity_decode($description);?></td>
        </tr>
        <tr>
          <th></th>
          <td style="display: table-cell;"><img width="500" src="data:image/jpeg||image/gif||image/png;base64,<?php echo $photo_announcement;?>"></td>
        </tr>
        <?php $count_module_attributes = $this->Custom_fields_model->count_announcements_module_attributes();?>
    <?php $module_attributes = $this->Custom_fields_model->announcements_hrsale_module_attributes();?>
    <?php foreach($module_attributes as $mattribute):?>
      <?php $attribute_info = $this->Custom_fields_model->get_employee_custom_data($announcement_id,$mattribute->custom_field_id);?>
      <?php
            if(!is_null($attribute_info)){
                $attr_val = $attribute_info->attribute_value;
            } else {
                $attr_val = '';
            }
        ?>
        <?php if($mattribute->attribute_type == 'date'){?>
    	<tr>
            <th><?php echo $mattribute->attribute_label;?></th>
            <td style="display: table-cell;"><?php echo $attr_val;?></td>
      </tr>
      <?php } else if($mattribute->attribute_type == 'select'){?>
      <?php $iselc_val = $this->Custom_fields_model->get_attribute_selection_values($mattribute->custom_field_id);?>
      <tr>
            <th><?php echo $mattribute->attribute_label;?></th>
            <td style="display: table-cell;"><?php foreach($iselc_val as $selc_val) {?> <?php if($attr_val==$selc_val->attributes_select_value_id):?> <?php echo $selc_val->select_label?> <?php endif;?><?php } ?></td>
      </tr>
      <?php } else if($mattribute->attribute_type == 'multiselect'){?>
      <?php $multiselect_values = explode(',',$attr_val);?>
      <?php $imulti_selc_val = $this->Custom_fields_model->get_attribute_selection_values($mattribute->custom_field_id);?>
      <tr>
            <th><?php echo $mattribute->attribute_label;?></th>
            <td style="display: table-cell;"><?php foreach($imulti_selc_val as $multi_selc_val) {?> <?php if(in_array($multi_selc_val->attributes_select_value_id,$multiselect_values)):?><br /> <?php echo $multi_selc_val->select_label?> <?php endif;?><?php } ?></td>
      </tr>
      <?php } else if($mattribute->attribute_type == 'textarea'){?>
      <tr>
            <th><?php echo $mattribute->attribute_label;?></th>
            <td style="display: table-cell;"><?php echo $attr_val;?></td>
      </tr>
      <?php } else if($mattribute->attribute_type == 'fileupload'){?>
      <tr>
            <th><?php echo $mattribute->attribute_label;?></th>
            <td style="display: table-cell;"><?php if($attr_val!='' && $attr_val!='no file') {?>
          <img src="<?php echo base_url().'uploads/custom_files/'.$attr_val;?>" width="70px" id="u_file">&nbsp; <a href="<?php echo site_url('admin/download');?>?type=custom_files&filename=<?php echo $attr_val;?>"><?php echo $this->lang->line('xin_download');?></a>
          <?php } ?></td>
      </tr>
      <?php } else { ?>
      <tr>
            <th><?php echo $mattribute->attribute_label;?></th>
            <td style="display: table-cell;"><?php echo $attr_val;?></td>
      </tr>
      <?php } ?>
      
      <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
</div>
<?php echo form_close(); ?>
<?php }
?>

