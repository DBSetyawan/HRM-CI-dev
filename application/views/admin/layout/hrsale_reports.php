<?php $role_resources_ids = $this->Xin_model->user_role_resource();?>
<?php
$session = $this->session->userdata('username');
$theme = $this->Xin_model->read_theme_info(1);
$user_info = $this->Xin_model->read_user_info($session['user_id']);
if($user_info[0]->is_active!=1) {
	redirect('admin/');
}
$role_user = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);
if(!is_null($role_user)){
	$role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
	$role_resources_ids = explode(',',0);	
}
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $arr_mod = $this->Xin_model->select_module_class($this->router->fetch_class(),$this->router->fetch_method()); ?>
<?php 
if($theme[0]->sub_menu_icons != ''){
	$submenuicon = $theme[0]->sub_menu_icons;
} else {
	$submenuicon = 'fa-circle-o';
}
?>
<div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $this->lang->line('xin_hr_report_title');?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-bordered">
                <tbody>
					<?php if(in_array('111',$role_resources_ids)) { ?>
                        <tr>
                        <td>1.</td>
                        <td><a href="<?php echo site_url('admin/reports/payslip');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_reports_payslip');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('112',$role_resources_ids)) { ?>
                        <tr>
                        <td>2.</td>
                        <td><a href="<?php echo site_url('admin/reports/employee_attendance');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_reports_attendance_employee');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('113',$role_resources_ids)) { ?>
                        <tr>
                        <td>3.</td>
                        <td><a href="<?php echo site_url('admin/reports/employee_training');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_reports_training');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('114',$role_resources_ids)) { ?>
                        <tr>
                        <td>4.</td>
                        <td><a href="<?php echo site_url('admin/reports/projects');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_reports_projects');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('115',$role_resources_ids)) { ?>
                        <tr>
                        <td>5.</td>
                        <td><a href="<?php echo site_url('admin/reports/tasks');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_reports_tasks');?> </a> </td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('116',$role_resources_ids)) { ?>
                        <tr>
                        <td>6.</td>
                        <td><a href="<?php echo site_url('admin/reports/roles');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_report_user_roles_report');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('117',$role_resources_ids)) { ?>
                        <tr>
                        <td>7.</td>
                        <td><a href="<?php echo site_url('admin/reports/employees');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_hr_report_employees');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('83',$role_resources_ids)) { ?>
                        <tr>
                        <td>8.</td>
                        <td><a href="<?php echo site_url('admin/accounting/account_statement');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_acc_account_statement');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('84',$role_resources_ids)) { ?>
                        <tr>
                        <td>9.</td>
                        <td><a href="<?php echo site_url('admin/accounting/expense_report');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_acc_expense_reports');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('85',$role_resources_ids)) { ?>
                        <tr>
                        <td>10.</td>
                        <td><a href="<?php echo site_url('admin/accounting/income_report');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_acc_income_reports');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                    <?php if(in_array('86',$role_resources_ids)) { ?>
                        <tr>
                        <td>11.</td>
                        <td><a href="<?php echo site_url('admin/accounting/transfer_report');?>"> <i class="fa <?php echo $submenuicon;?>"></i> <?php echo $this->lang->line('xin_acc_transfer_report');?> </a></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Active"><button type="button" class="btn icon-btn btn-xs btn-success active-lang mr-1"><span class="fa fa-check-circle"></span></button></span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>