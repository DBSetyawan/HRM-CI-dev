<?php
/* Projects List view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<?php if(in_array('315',$role_resources_ids)) {?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<?php $project_no = $this->Xin_model->generate_random_string();?>
<div class="box mb-4 <?php echo $get_animate;?>">
  <div id="accordion">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_project_timelogs');?></h3>
      <div class="box-tools pull-right"> <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false">
        <button type="button" class="btn btn-xs btn-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line('xin_add_new');?></button>
        </a> </div>
    </div>
    <div id="add_form" class="collapse add-form <?php echo $get_animate;?>" data-parent="#accordion" style="">
      <div class="box-body">
        <?php $attributes = array('name' => 'add_projecttimelog', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('user_id' => $session['user_id']);?>
        <?php echo form_open('admin/quoted_projects/add_project_timelog', $attributes, $hidden);?>
        <div class="bg-white">
          <div class="box-block">
            <div class="row">
              <?php $colmd = '2'; $user_date = 'timelog_date';?>
              <?php if($user_info[0]->user_role_id == '1'){?>
              <?php $colmd = '2'; $user_date = 'timelog_date';?>
              <?php } else {?>
              <?php $colmd = '3'; $user_date = 'user_timelog_date';?>
              <?php } ?>
              <?php if($user_info[0]->user_role_id == '1'){?>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="project_id" class="control-label"><?php echo $this->lang->line('xin_quoted_projects');?></label>
                    <select class="form-control" name="project_id" id="project_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_quoted_projects');?>">
                      <option value=""><?php echo $this->lang->line('xin_quoted_projects');?></option>
                       <?php foreach($all_projects as $project) {?>
                        <option value="<?php echo $project->project_id?>"> <?php echo $project->title;?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
               <?php } else {?>
               <?php $r_projects = $this->Quoted_project_model->get_employee_projects($session['user_id']);?>
               <div class="col-md-2">
                  <div class="form-group">
                    <label for="project_id" class="control-label"><?php echo $this->lang->line('xin_project');?></label>
                    <select class="form-control" name="project_id"  data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_project');?>">
                      <option value=""><?php echo $this->lang->line('xin_project');?></option>
                       <?php foreach($r_projects->result() as $project) {?>
                        <option value="<?php echo $project->project_id?>"> <?php echo $project->title;?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
               <?php } ?> 
                <div class="col-md-2">
                 <?php if($user_info[0]->user_role_id == '1'){?>
                  <div class="form-group" id="employee_ajax">
                    <label for="employees" class="control-label"><?php echo $this->lang->line('xin_employee');?></label>
                    <select class="form-control" name="employee_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee');?>">
                      <option value=""><?php echo $this->lang->line('xin_employee');?></option>
                    </select>
                  </div>
                  <?php } else {?>
                  <div class="form-group">
                    <label for="employees" class="control-label"><?php echo $this->lang->line('xin_employee');?></label>
                    <select class="form-control" name="employee_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee');?>">
                      <option value="<?php echo $session['user_id'];?>"><?php echo $user_info[0]->first_name.' '.$user_info[0]->last_name;?></option>
                    </select>
                  </div>
                  <?php } ?>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="start_time"><?php echo $this->lang->line('xin_project_timelogs_starttime');?></label>
                    <input class="form-control timepicker" placeholder="<?php echo $this->lang->line('xin_project_timelogs_starttime');?>" readonly name="start_time" id="start_time" type="text" value="">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="end_time"><?php echo $this->lang->line('xin_project_timelogs_endtime');?></label>
                    <input class="form-control timepicker" placeholder="<?php echo $this->lang->line('xin_project_timelogs_endtime');?>" readonly name="end_time" id="end_time" type="text" value="">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                    <input class="form-control <?php echo $user_date;?>" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" id="start_date" value="">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                    <input class="form-control <?php echo $user_date;?>" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" id="end_date" value="">
                  </div>
                </div>                
              </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" name="total_hours" id="total_hours" value="0" />
                    <label for="timelogs_memo"><?php echo $this->lang->line('xin_project_timelogs_memo');?> 
                     <span id="total_time">&nbsp;</span></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_project_timelogs_memo');?>" name="timelogs_memo" type="text" value="">
                  </div>
                </div>
              </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="box <?php echo $get_animate;?>">
  <div class="box-header with-border">
    <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_project_timelogs');?> </h3>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('xin_action');?></th>
            <th><?php echo $this->lang->line('xin_project');?></th>
            <th><?php echo $this->lang->line('xin_employee');?></th>
            <th><?php echo $this->lang->line('xin_start_date');?></th>
            <th><?php echo $this->lang->line('xin_end_date');?></th>
            <th><?php echo $this->lang->line('xin_overtime_thours');?></th>
            <th><?php echo $this->lang->line('xin_project_timelogs_memo');?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
