<?php
$session = $this->session->userdata('username');
$system = $this->Xin_model->read_setting_info(1);
$company_info = $this->Xin_model->read_company_setting_info(1);
$user = $this->Xin_model->read_employee_info($session['user_id']);
$theme = $this->Xin_model->read_theme_info(1);
?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<div class="box-widget widget-user-2"> 
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header">
    <h4 class="widget-user-username welcome-hrsale-user"><?php echo $this->lang->line('xin_title_wcb');?>, <?php echo $user[0]->first_name.' '.$user[0]->last_name;?>!</h4>
    <h5 class="widget-user-desc welcome-hrsale-user-text"><?php echo $this->lang->line('xin_title_today_is');?> <?php echo date('l, j F Y');?></h5>
  </div>
</div>
<?php /*?><?php $company_license = $this->Xin_model->company_license_expiry();?>
<?php foreach($company_license as $clicense):?>
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
  License <?php echo $clicense->license_name;?> is going to expire soon. </div>
<?php endforeach;?>
<?php $company_license_exp = $this->Xin_model->company_license_expired();?>
<?php foreach($company_license_exp as $clicense_exp):?>
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
  License <?php echo $clicense_exp->license_name;?> is expired. </div>
<?php endforeach;?><?php */?>
<?php if($theme[0]->statistics_cards=='4' || $theme[0]->statistics_cards=='8' || $theme[0]->statistics_cards=='12'){?>
<div class="row <?php echo $get_animate;?>">
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/employees');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-primary"><i class="fa fa-users"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Employees_model->get_total_employees();?> <?php echo $this->lang->line('xin_people');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_employees_active');?> <?php echo active_employees();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_employees_inactive');?> <?php echo inactive_employees();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <!-- /.col -->
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/roles');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-green"><i class="fa fa-lock"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_roles');?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_permission');?></span>
       </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <!-- /.col -->
  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/timesheet/leave');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-purple"><i class="fa fa-calendar"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('left_leave');?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_performance_management');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <!-- /.col -->
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/settings');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-red"><i class="fa fa-cog"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_configure_hr');?></span> <span class="info-box-text"><?php echo $this->lang->line('left_settings');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <!-- /.col --> 
</div>
<?php } ?>
<?php if($theme[0]->statistics_cards=='8' || $theme[0]->statistics_cards=='12'){?>
<div class="row <?php echo $get_animate;?>">
  <?php if($system[0]->module_files=='true'){?>
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/files');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_e_details_document');?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_performance_management');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <?php } else {?>
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/timesheet/holidays');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-yellow"><i class="fa fa-plane"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_view');?></span> <span class="info-box-text"><?php echo $this->lang->line('left_holidays');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <?php } ?>
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/theme');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-red"><i class="fa fa-table"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_theme_title');?></span> <span class="info-box-text"><?php echo $this->lang->line('left_settings');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <?php if($system[0]->module_projects_tasks=='true'){?>
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/project');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-green"><i class="fa fa-tasks"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Xin_model->get_all_projects();?> <?php echo $this->lang->line('xin_projects');?></span> <span class="info-box-text"><span class="badge bg-red"> <?php echo $this->lang->line('xin_in_progress');?> <?php echo $this->Project_model->inprogress_projects();?> </span></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
    <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/timesheet/tasks');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-check-o"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Xin_model->get_all_tasks();?> <?php echo $this->lang->line('xin_tasks');?></span> <span class="info-box-text"><span class="badge bg-red"> <?php echo $this->lang->line('xin_in_progress');?> <?php echo inprogress_tasks();?> </span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
    
  <?php } else {?>
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/designation');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-green"><i class="fa fa-list"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('left_designation');?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_view');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
    <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/timesheet/office_shift');?>"> 
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-plus-o"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('left_office_shifts');?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_view');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <?php } ?>
</div>
<?php } ?>
<div class="row <?php echo $get_animate;?>">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_employee_department_txt');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <?php $c_color = array('#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $j=0;foreach($this->Department_model->all_departments() as $department) { ?>
                    <?php
						$condition = "department_id =" . "'" . $department->department_id . "'";
						$this->db->select('*');
						$this->db->from('xin_employees');
						$this->db->where($condition);
						$query = $this->db->get();
						// check if department available
						if ($query->num_rows() > 0) {
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $c_color[$j];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($department->department_name);?> (<?php echo $query->num_rows();?>)</td>
                    </tr>
                    <?php $j++; } ?>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="employee_department" height="200" width="" style="display: block;  height: 200px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_employee_designation_txt');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <?php $c_color2 = array('#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $k=0;foreach($this->Designation_model->all_designations() as $designation) { ?>
                    <?php
						$condition1 = "designation_id =" . "'" . $designation->designation_id . "'";
						$this->db->select('*');
						$this->db->from('xin_employees');
						$this->db->where($condition1);
						$query1 = $this->db->get();
						// check if department available
						if ($query1->num_rows() > 0) {
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $c_color2[$k];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($designation->designation_name);?> (<?php echo $query1->num_rows();?>)</td>
                    </tr>
                    <?php $k++; } ?>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="employee_designation" height="200" width="" style="display: block; height: 200px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if($system[0]->module_inquiry=='true'){?>
<div class="row <?php echo $get_animate;?>">
  <div class="col-md-4 col-12">
    <div class="box box-body hr-mini-state hrsalle-mini-stat">
      <a class="text-card-muted" href="<?php echo site_url('admin/tickets');?>"><div class="flexbox"> <span class="fa fa-ticket text-primary font-size-50"></span> <span class="font-size-40 font-weight-400"><?php echo total_tickets();?></span> </div>
      <div class="text-right"><?php echo $this->lang->line('xin_hr_total_tickets');?></div></a>
    </div>
  </div>
  <div class="col-md-4 col-12">
    <div class="box box-body hr-mini-state hrsalle-mini-stat">
      <a class="text-card-muted" href="<?php echo site_url('admin/tickets');?>"><div class="flexbox"> <span class="fa fa-server text-danger font-size-50"></span> <span class="font-size-40 font-weight-400"><?php echo total_open_tickets();?></span> </div>
      <div class="text-right"><?php echo $this->lang->line('xin_hr_total_open_tickets');?></div></a>
    </div>
  </div>
  <div class="col-md-4 col-12">
    <div class="box box-body hr-mini-state hrsalle-mini-stat">
      <a class="text-card-muted" href="<?php echo site_url('admin/tickets');?>"><div class="flexbox"> <span class="ion ion-thumbsup text-success font-size-50"></span> <span class="font-size-40 font-weight-400"><?php echo total_closed_tickets();?></span> </div>
      <div class="text-right"><?php echo $this->lang->line('xin_hr_total_closed_tickets');?></div></a>
    </div>
  </div>
</div>
<?php } ?>
<?php
$current_month = date('Y-m-d');
$working = $this->Xin_model->current_month_day_attendance($current_month);
$query = $this->Xin_model->all_employees_status();
$total = $query->num_rows();
// absent
$abs = $total - $working;
?>
<?php if($theme[0]->dashboard_calendar == 'true'):?>
<?php $this->load->view('admin/calendar/calendar_hr');?>
<?php endif; ?>
<div class="row <?php echo $get_animate;?>">
  <?php $exp_am = $this->Expense_model->get_total_expenses();?>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box"> <span class="info-box-icon info-box-icon-hrsale"><i class="fa fa-money text-red"></i></span>
      <div class="info-box-content info-box-content-hrsale"> <span class="info-box-text"><?php echo $this->lang->line('dashboard_total_expenses');?> <span class="pull-right text-green dashboard-text"><?php echo $this->Xin_model->currency_sign($exp_am[0]->exp_amount);?></span></span> <span class="info-box-number"><a class="text-muted" href="<?php echo site_url('admin/expense');?>"> <?php echo $this->lang->line('xin_view');?> <i class="fa fa-arrow-right"></i></a></span> </div>
      <!-- /.info-box-content --> 
    </div>
    <!-- /.info-box --> 
  </div>
  <?php $all_sal = total_salaries_paid();?>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box"> <span class="info-box-icon info-box-icon-hrsale"><i class="fa fa-dollar text-red"></i></span>
      <div class="info-box-content info-box-content-hrsale"> <span class="info-box-text"><?php echo $this->lang->line('dashboard_total_salaries');?> <span class="pull-right text-green dashboard-text"><?php echo $this->Xin_model->currency_sign($all_sal);?></span></span> <span class="info-box-number"><a class="text-muted" href="<?php echo site_url('admin/payroll/payment_history');?>"> <?php echo $this->lang->line('xin_view');?> <i class="fa fa-arrow-right"></i></a></span> </div>
      <!-- /.info-box-content --> 
    </div>
    <!-- /.info-box --> 
  </div>
</div>
