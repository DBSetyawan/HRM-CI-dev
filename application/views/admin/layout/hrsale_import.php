<?php
/* Employee Import view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<section id="basic-listgroup">
  <div class="row match-heights <?php echo $get_animate?>">
    <div class="col-lg-2 col-md-2">
      <div class="card">
        <div class="card-blocks">
          <div class="list-group">
          <a class="list-group-item list-group-item-action nav-tabs-link hrsale-tab-item active" href="#import_employees" data-hrsale-import="1" data-hrsale-import-block="import_employees" data-toggle="tab" aria-expanded="true" id="hrsale_import_1"> <i class="fa fa-user"></i> <?php echo $this->lang->line('xin_import_employees');?> </a>
          <a class="list-group-item list-group-item-action nav-tabs-link hrsale-tab-item" href="#import_attendance"  data-hrsale-import="2" data-hrsale-import-block="import_attendance" data-toggle="tab" aria-expanded="true" id="hrsale_import_2"> <i class="fa fa-clock-o"></i> <?php echo $this->lang->line('left_import_attendance');?> </a>
          <a class="list-group-item list-group-item-action nav-tabs-link hrsale-tab-item" href="#import_leads"  data-hrsale-import="3" data-hrsale-import-block="import_leads" data-toggle="tab" aria-expanded="true" id="hrsale_import_3"> <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('xin_import_leads');?> </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-10 current-tab animated fadeInRight" id="import_employees">
      <div class="box">
      <div class="box-header  with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_import_employees').' - '.$this->lang->line('xin_employee_import_csv_file');?></h3>
        </div>
      <div class="box-body">
        <p class="card-text"><?php echo $this->lang->line('xin_employee_import_description_line1');?></p>
        <p class="card-text"><?php echo $this->lang->line('xin_employee_import_description_line2');?></p>
        <h6><a href="<?php echo base_url();?>uploads/csv/sample-csv-employees.csv" class="btn btn-primary"> <i class="fa fa-download"></i> <?php echo $this->lang->line('xin_employee_import_download_sample');?> </a></h6>
        <?php $attributes = array('name' => 'import_users', 'id' => 'import_users', 'autocomplete' => 'off');?>
        <?php $hidden = array('user_id' => $session['user_id']);?>
        <?php echo form_open_multipart('admin/import/import_employees', $attributes, $hidden);?>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <fieldset class="form-group">
                <label for="logo"><?php echo $this->lang->line('xin_employee_upload_file');?><i class="hrsale-asterisk">*</i></label>
                <input type="file" class="form-control-file" id="file" name="file">
                <small><?php echo $this->lang->line('xin_employee_imp_allowed_size');?></small>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="mt-1">
          <div class="form-actions box-footer"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> '.$this->lang->line('xin_save'))); ?> </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
    </div>
    <div class="col-md-10 current-tab animated fadeInRight" id="import_attendance" style="display:none;">
      <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $this->lang->line('left_import_attendance').' - '.$this->lang->line('xin_attendance_import_csv_file');?></h3>
          </div>
          <div class="box-body">
            <p class="card-text"><?php echo $this->lang->line('xin_attendance_description_line1');?></p>
            <p class="card-text"><?php echo $this->lang->line('xin_attendance_description_line2');?></p>
            <h6><a href="<?php echo base_url();?>uploads/csv/sample-csv-attendance.csv" class="btn btn-info"> <i class="fa fa-download"></i> <?php echo $this->lang->line('xin_attendance_download_sample');?> </a></h6>
            <?php $attributes = array('name' => 'import_attendance', 'id' => 'import_time', 'autocomplete' => 'off');?>
            <?php $hidden = array('user_id' => $session['user_id']);?>
            <?php echo form_open_multipart('admin/import/import_attendance', $attributes, $hidden);?>
            <fieldset class="form-group">
              <label for="logo"><?php echo $this->lang->line('xin_attendance_upload_file');?></label>
              <input type="file" class="form-control-file" id="file" name="file">
              <small><?php echo $this->lang->line('xin_attendance_allowed_size');?></small>
            </fieldset>
            <div class="mt-1">
              <div class="form-actions box-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_attendance_import');?> </button>
              </div>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
    </div>
    <div class="col-md-10 current-tab animated fadeInRight" id="import_leads" style="display:none;">
      <div class="box <?php echo $get_animate;?>">
          <div class="box-header  with-border">
              <h3 class="box-title"><?php echo $this->lang->line('xin_import_leads').' - '.$this->lang->line('xin_employee_import_csv_file');?></h3>
            </div>
          <div class="box-body">
            <p class="card-text"><?php echo $this->lang->line('xin_employee_import_description_line1');?></p>
            <p class="card-text"><?php echo $this->lang->line('xin_leads_import_description_line2');?></p>
            <h6><a href="<?php echo base_url();?>uploads/csv/sample-csv-leads.csv" class="btn btn-primary"> <i class="fa fa-download"></i> <?php echo $this->lang->line('xin_employee_import_download_sample');?> </a></h6>
            <?php $attributes = array('name' => 'import_leads', 'id' => 'import_leads_data', 'autocomplete' => 'off');?>
            <?php $hidden = array('user_id' => $session['user_id']);?>
            <?php echo form_open_multipart('admin/leads/import_leads', $attributes, $hidden);?>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <fieldset class="form-group">
                    <label for="logo"><?php echo $this->lang->line('xin_employee_upload_file');?><i class="hrsale-asterisk">*</i></label>
                    <input type="file" class="form-control-file" id="file" name="file">
                    <small><?php echo $this->lang->line('xin_employee_imp_allowed_size');?></small>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="mt-1">
              <div class="form-actions box-footer"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> '.$this->lang->line('xin_save'))); ?> </div>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
    </div>
    
    
    
    
    
   
  </div>
</section>
