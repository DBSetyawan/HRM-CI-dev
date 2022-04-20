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
    <h4 class="widget-user-username welcome-hrsale-user"><?php echo $this->lang->line('hr_staff_dashboard_title');?></h4>
    <h5 class="widget-user-desc welcome-hrsale-user-text"><?php echo $this->lang->line('xin_title_today_is');?> <?php echo date('l, j F Y');?></h5>
  </div>
</div>
<?php if($system[0]->staff_dashboard=='0'){?>
<div class="row <?php echo $get_animate;?>">
 <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/employees');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-primary"><i class="fa fa-user"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Employees_model->get_total_employees();?> <?php echo $this->lang->line('dashboard_employees');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_employees_active');?> <?php echo active_employees();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_employees_inactive');?> <?php echo inactive_employees();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
  <?php $all_sal = total_salaries_paid();?>
    <a class="text-muted" href="<?php echo site_url('admin/payroll/generate_payslip/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
      <div class="info-box-content"> <span class="info-box-number"> <?php echo $this->lang->line('dashboard_total_salaries');?></span> <span> <?php echo $this->Xin_model->currency_sign($all_sal);?> </span></div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/awards');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-purple"><i class="fa fa-trophy"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Exin_model->total_employee_awards_dash();?> <?php echo $this->lang->line('left_awards');?></span> <span class="info-box-text"> <?php echo $this->lang->line('xin_view_awards_all');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <?php $request_leaves = employee_request_leaves();?>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/timesheet/leave/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $request_leaves;?> <?php echo $this->lang->line('xin_leave_request');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_pending');?> <?php echo pending_leave_request();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_approved');?> <?php echo accepted_leave_request();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
</div>
  <div class="row <?php echo $get_animate;?>">
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/tickets/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-purple"><i class="fa fa-ticket"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_tickets();?> <?php echo $this->lang->line('xin_hr_total_tickets');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_open');?> <?php echo total_open_tickets();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_closed');?> <?php echo total_closed_tickets();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/travel/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-aqua"><i class="fa fa-plane"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_hr_calendar_trvl_request');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_pending');?> <?php echo pending_travel();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_accepted');?> <?php echo accepted_travel();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/training/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-red"><i class="fa fa-graduation-cap"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('left_training');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_pending');?> <?php echo total_pending_training();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_accepted');?> <?php echo total_started_training();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/assets/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-primary"><i class="fa fa-flask"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_assets();?> <?php echo $this->lang->line('xin_assets');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_assets_working');?> <?php echo total_assets_working();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_assets_not_working');?> <?php echo total_assets_not_working();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>  
</div>
<?php } else {?>
<div class="row <?php echo $get_animate;?>">

  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-primary">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-user float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('dashboard_employees');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/employees');?>"><?php echo $this->Employees_model->get_total_employees();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('xin_employees_active');?> <?php echo active_employees();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_employees_inactive');?> <?php echo inactive_employees();?> </span></span> </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-green">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-money float-right"></i> </div>
        <div class="text-white">
          <?php $all_sal = total_salaries_paid();?>
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('dashboard_total_salaries');?></h6>
          <h4 class="mb-4"><?php echo $this->Xin_model->currency_sign($all_sal);?></h4>
          <a class="text-card-muted" href="<?php echo site_url('admin/payroll/generate_payslip/');?>"><?php echo $this->lang->line('xin_view_payslips_all');?></a> </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-purple">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-trophy float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('left_awards');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/awards');?>"><?php echo $this->Exin_model->total_employee_awards_dash();?></a></h4>
          <a class="text-card-muted" href="<?php echo site_url('admin/awards/');?>"><?php echo $this->lang->line('xin_view_awards_all');?></a> </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-yellow">
    <?php $request_leaves = employee_request_leaves();?>
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-calendar float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_leave_request');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/timesheet/leave/');?>"><?php echo $request_leaves;?></a></h4>
          <span class="badge bg-teal"> <?php echo $this->lang->line('xin_pending');?> <?php echo pending_leave_request();?> </span><span class="ml-2"> <span class="badge bg-green"> <?php echo $this->lang->line('xin_approved');?> <?php echo accepted_leave_request();?> </span></span> <span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_rejected');?> <?php echo rejected_leave_request();?> </span></span></div>
      </div>
    </div>
  </div>
</div>
  <div class="row <?php echo $get_animate;?>">
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-purple">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-ticket float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_hr_total_tickets');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/tickets');?>"><?php echo total_tickets();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('xin_hr_total_open_tickets');?> <?php echo total_open_tickets();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_hr_total_closed_tickets');?> <?php echo total_closed_tickets();?> </span></span> </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-aqua">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-plane float-right"></i> </div>
        <div class="text-white">
          <?php $travel_expense = total_travel_expense();?>
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_hr_calendar_trvl_request');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/travel/');?>"><?php echo $this->Xin_model->currency_sign($travel_expense);?></a></h4>
          <span class="badge bg-yellow"> <?php echo $this->lang->line('xin_pending');?> <?php echo pending_travel();?> </span><span class="ml-2"> <span class="badge bg-green"> <?php echo $this->lang->line('xin_accepted');?> <?php echo accepted_travel();?> </span></span> <span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_rejected');?> <?php echo rejected_travel();?> </span></span></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-red">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-graduation-cap float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('left_training');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/training/');?>"><?php echo total_training();?></a></h4>
          <span class="badge bg-yellow"> <?php echo $this->lang->line('xin_pending');?> <?php echo total_pending_training();?> </span><span class="ml-2"> <span class="badge bg-aqua"> <?php echo $this->lang->line('xin_started');?> <?php echo total_started_training();?> </span></span> <span class="ml-2"> <span class="badge bg-green"> <?php echo $this->lang->line('xin_completed');?> <?php echo total_completed_training();?> </span></span></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-primary">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-flask float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_assets');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/assets/');?>"><?php echo total_assets();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('xin_assets_working');?> <?php echo total_assets_working();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_assets_not_working');?> <?php echo total_assets_not_working();?> </span></span></div>
      </div>
    </div>
  </div>
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
                    <?php $dc_color = array('#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $dj=0;foreach($this->Department_model->all_departments() as $department) { ?>
                    <?php
						$dcondition = "department_id =" . "'" . $department->department_id . "'";
						$this->db->select('*');
						$this->db->from('xin_employees');
						$this->db->where($dcondition);
						$dquery = $this->db->get();
						// check if department available
						if ($dquery->num_rows() > 0) {
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $dc_color[$dj];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($department->department_name);?> (<?php echo $dquery->num_rows();?>)</td>
                    </tr>
                    <?php $dj++; } ?>
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
                    <?php $dk=0;foreach($this->Designation_model->all_designations() as $designation) { ?>
                    <?php
						$dcondition1 = "designation_id =" . "'" . $designation->designation_id . "'";
						$this->db->select('*');
						$this->db->from('xin_employees');
						$this->db->where($dcondition1);
						$dquery1 = $this->db->get();
						// check if department available
						if ($dquery1->num_rows() > 0) {
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $c_color2[$dk];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($designation->designation_name);?> (<?php echo $dquery1->num_rows();?>)</td>
                    </tr>
                    <?php $dk++; } ?>
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
<?php
$current_month = date('Y-m-d');
$working = $this->Xin_model->current_month_day_attendance($current_month);
$query = $this->Xin_model->all_employees_status();
$total = $query->num_rows();
// absent
$abs = $total - $working;
?>
<?php
$emp_abs = $abs / $total * 100;
$emp_work = $working / $total * 100;
?>
<?php
$emp_abs = $abs / $total * 100;
$emp_work = $working / $total * 100;
?>
<div class="row row-card-no-pd mt--2 <?php echo $get_animate;?>">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><span><?php echo $this->lang->line('xin_hrsale_absent_today');?></span></h5>
                        <p class="text-muted"><?php echo $this->lang->line('xin_absent');?></p>
                    </div>
                    <h3 class="text-info fw-bold"><?php echo $abs;?></h3>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-info w-75" role="progressbar" aria-valuenow="<?php echo $this->Xin_model->set_percentage($emp_abs);?>" aria-valuemin="8" aria-valuemax="100" style="width: <?php echo $this->Xin_model->set_percentage($emp_abs);?>%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"><?php echo $this->lang->line('xin_hrsale_absent_status');?></p>
                    <p class="text-muted mb-0"><?php echo $this->Xin_model->set_percentage($emp_abs);?>%</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><span><?php echo $this->lang->line('xin_hrsale_present_today');?></span></h5>
                        <p class="text-muted"><?php echo $this->lang->line('xin_emp_working');?></p>
                    </div>
                    <h3 class="text-info fw-bold"><?php echo $working;?></h3>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-info w-75" role="progressbar" aria-valuenow="<?php echo $this->Xin_model->set_percentage($emp_work);?>" aria-valuemin="8" aria-valuemax="100" style="width: <?php echo $this->Xin_model->set_percentage($emp_work);?>%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"><?php echo $this->lang->line('xin_hrsale_present_status');?></p>
                    <p class="text-muted mb-0"><?php echo $this->Xin_model->set_percentage($emp_work);?>%</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><span><?php echo $this->lang->line('dashboard_projects');?></span></h5>
                        <p class="text-muted"><?php echo $this->lang->line('xin_hrsale_project_status');?></p>
                    </div>
                    <?php $completed_proj = $this->Project_model->complete_projects();?>
                    <?php $proj = $this->Xin_model->get_all_projects();
					if($proj < 1) {
						$proj_percnt = 0;
					} else {
						$proj_percnt = $completed_proj / $proj * 100;
                    }
					?>
                    <h3 class="text-info fw-bold"><a class="text-card-mduted" href="<?php echo site_url('admin/project');?>"><?php echo $this->Xin_model->get_all_projects();?></a></h3>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-info w-75" role="progressbar" aria-valuenow="<?php echo $this->Xin_model->set_percentage($proj_percnt);?>" aria-valuemin="8" aria-valuemax="100" style="width: <?php echo $this->Xin_model->set_percentage($proj_percnt);?>%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"><?php echo $this->lang->line('xin_completed');?></p>
                    <p class="text-muted mb-0"><?php echo $this->Xin_model->set_percentage($proj_percnt);?>%</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><span><?php echo $this->lang->line('xin_tasks');?></span></h5>
                        <p class="text-muted"><?php echo $this->lang->line('xin_hrsale_task_status');?></p>
                    </div>
                    <?php $completed_tasks = completed_tasks();?>
                    <?php $task_all = $this->Xin_model->get_all_tasks();
					if($task_all < 1) {
						$task_percnt = 0;
					} else {
						$task_percnt = $completed_tasks / $task_all * 100;
                    }
                    ?>
                    <h3 class="text-info fw-bold"><a class="text-card-mduted" href="<?php echo site_url('admin/timesheet/tasks');?>"><?php echo $this->Xin_model->get_all_tasks();?></a></h3>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-info w-75" role="progressbar" aria-valuenow="<?php echo $this->Xin_model->set_percentage($task_percnt);?>" aria-valuemin="8" aria-valuemax="100" style="width: <?php echo $this->Xin_model->set_percentage($task_percnt);?>%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"><?php echo $this->lang->line('xin_completed');?></p>
                    <p class="text-muted mb-0"><?php echo $this->Xin_model->set_percentage($task_percnt);?>%</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row <?php echo $get_animate;?>">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_employee_location_txt');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <?php $c_color3 = array('#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $lj=0;foreach($this->Xin_model->all_locations() as $location) { ?>
                    <?php
						$lcondition = "location_id =" . "'" . $location->location_id . "'";
						$this->db->select('*');
						$this->db->from('xin_employees');
						$this->db->where($lcondition);
						$lquery = $this->db->get();
						// check if department available
						if ($lquery->num_rows() > 0) {
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $c_color3[$lj];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($location->location_name);?> (<?php echo $lquery->num_rows();?>)</td>
                    </tr>
                    <?php $lj++; } ?>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="employee_location" height="200" width="" style="display: block;  height: 200px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_employee_company_txt');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <?php $c_color4 = array('#975df3','#001f3f','#39cccc','#3c8dbc','#006400','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $ck=0;foreach($this->Xin_model->all_companies_dash() as $ecompany) { ?>
                    <?php
						$conditione = "company_id =" . "'" . $ecompany->company_id . "'";
						$this->db->select('*');
						$this->db->from('xin_employees');
						$this->db->where($conditione);
						$cquery1 = $this->db->get();
						// check if department available
						if ($cquery1->num_rows() > 0) {
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $c_color4[$ck];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($ecompany->name);?> (<?php echo $cquery1->num_rows();?>)</td>
                    </tr>
                    <?php $ck++; } ?>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="employee_company" height="200" width="" style="display: block; height: 200px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>