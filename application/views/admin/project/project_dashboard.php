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
    <h4 class="widget-user-username welcome-hrsale-user"><?php echo $this->lang->line('hr_project_dashboard_title');?></h4>
    <h5 class="widget-user-desc welcome-hrsale-user-text"><?php echo $this->lang->line('xin_title_today_is');?> <?php echo date('l, j F Y');?></h5>
  </div>
</div>

<?php if($system[0]->project_dashboard=='0'){?>
<div class="row <?php echo $get_animate;?>">
 <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/project');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-primary"><i class="fa fa-th-list"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_projects();?> <?php echo $this->lang->line('left_projects');?></span> <span class="info-box-text"><span class="badge bg-green"> <?php echo $this->lang->line('dashboard_completed');?> <?php echo total_completed_projects();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_project_cancelled');?> <?php echo total_cancelled_projects();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/timesheet/tasks');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-green"><i class="fa fa-tasks"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_tasks();?> <?php echo $this->lang->line('left_tasks');?></span> <span class="info-box-text"><span class="badge bg-green"> <?php echo $this->lang->line('dashboard_completed');?> <?php echo total_completed_tasks();?> </span><span class="ml-2"> <span class="badge bg-yellow"> <?php echo $this->lang->line('xin_in_progress');?> <?php echo total_inprogress_tasks();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/clients');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-purple"><i class="fa fa-user"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_clients();?> <?php echo $this->lang->line('xin_project_clients');?></span> <span class="info-box-text"> <?php echo $this->lang->line('xin_view_clients_all');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <div class="col-xl-3 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/leads');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_leads();?> <?php echo $this->lang->line('xin_leads');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_changed_clients_leads_all');?> <?php echo total_leads_converted();?> </span> </span></div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
</div>

  <div class="row <?php echo $get_animate;?>">
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/invoices/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-purple"><i class="fa fa-calendar-plus-o"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_invoices();?> <?php echo $this->lang->line('xin_invoices_title');?></span> <span class="info-box-text"><span class="badge bg-green"> <?php echo $this->lang->line('xin_payment_paid');?> <?php echo total_paid_invoices();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_payroll_unpaid');?> <?php echo total_unpaid_invoices();?> </span></span> </span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/quotes/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-check-o"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_estimate();?> <?php echo $this->lang->line('xin_title_quotes');?></span> <span class="info-box-text"><span class="badge badge-info"> <?php echo $this->lang->line('xin_quote_converted_project');?> <?php echo total_estimate_converted();?> </span> </span></div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/quoted_projects');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo total_quoted_projects();?> <?php echo $this->lang->line('xin_quoted_projects');?></span> <span class="info-box-text"> <?php echo $this->lang->line('xin_view_all');?></span> </div>
      <!-- /.info-box-content --> 
    </div></a>
    <!-- /.info-box --> 
  </div>
  
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state">
    <a class="text-muted" href="<?php echo site_url('admin/invoices/payments_history/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
      <div class="info-box-content"> <span class="info-box-number"> <?php echo $this->lang->line('xin_acc_invoice_payments');?></span> <span> <?php echo $this->Xin_model->currency_sign(total_invoices_paid());?> </span></div>
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
        <div class="mini-stat-icon"> <i class="fa fa-th-list float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('left_projects');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/project');?>"><?php echo total_projects();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('dashboard_completed');?> <?php echo total_completed_projects();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_project_cancelled');?> <?php echo total_cancelled_projects();?> </span></span> </div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-green">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-tasks float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('left_tasks');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/timesheet/tasks');?>"><?php echo total_tasks();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('dashboard_completed');?> <?php echo total_completed_tasks();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_in_progress');?> <?php echo total_inprogress_tasks();?> </span></span> </div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-purple">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-user float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_project_clients');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/clients');?>"><?php echo total_clients();?></a></h4>
          <a class="text-card-muted" href="<?php echo site_url('admin/clients/');?>"><?php echo $this->lang->line('xin_view_clients_all');?></a> </div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-yellow">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-user-plus float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_leads');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/leads/');?>"><?php echo total_leads();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('xin_changed_clients_leads_all');?> <?php echo total_leads_converted();?> </span> </div>
      </div>
    </div>
  </div>
</div>
<div class="row <?php echo $get_animate;?>">
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-purple">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-calendar-plus-o float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_invoices_title');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/invoices/');?>"><?php echo total_invoices();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('xin_payment_paid');?> <?php echo total_paid_invoices();?> </span> <span class="badge badge-info"> <?php echo $this->lang->line('xin_payroll_unpaid');?> <?php echo total_unpaid_invoices();?> </span></div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-aqua">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-calendar-check-o float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_title_quotes');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/quotes/');?>"><?php echo total_estimate();?></a></h4>
          <span class="badge badge-info"> <?php echo $this->lang->line('xin_quote_converted_project');?> <?php echo total_estimate_converted();?> </span> </div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-red">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-list-alt float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_quoted_projects');?></h6>
          <h4 class="mb-4"><a class="text-card-muted" href="<?php echo site_url('admin/quoted_projects');?>"><?php echo total_quoted_projects();?></a></h4>
          <a class="text-card-muted" href="<?php echo site_url('admin/quoted_projects/');?>"><?php echo $this->lang->line('xin_view_all');?></a> </div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-3">
    <div class="card mini-stat bg-primary">
      <div class="card-body mini-stat-img">
        <div class="mini-stat-icon"> <i class="fa fa-money float-right"></i> </div>
        <div class="text-white">
          <h6 class="text-uppercase mb-3"><?php echo $this->lang->line('xin_acc_invoice_payments');?></h6>
          <h4 class="mb-4"><?php echo $this->Xin_model->currency_sign(total_invoices_paid());?></h4>
          <a class="text-card-muted" href="<?php echo site_url('admin/invoices/payments_history/');?>"><?php echo $this->lang->line('xin_view_all_invoice_payments');?></a> </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="row <?php echo $get_animate;?>">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_projects_status');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <?php $dc_color = array('#666EE8','#9793d7','#c6619e','#d3733b','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $dj=0;$projects = get_projects_status(); foreach($projects->result() as $eproject) { ?>
                    <?php
						$row = total_projects_status($eproject->status);
						if($eproject->status==0){
							$csname = htmlspecialchars_decode($this->lang->line('xin_not_started'));
						} else if($eproject->status==1){
							$csname = htmlspecialchars_decode($this->lang->line('xin_in_progress'));
						} else if($eproject->status==2){
							$csname = htmlspecialchars_decode($this->lang->line('xin_completed'));
						} else if($eproject->status==3){
							$csname = htmlspecialchars_decode($this->lang->line('xin_project_cancelled'));
						} else if($eproject->status==4){
							$csname = htmlspecialchars_decode($this->lang->line('xin_project_hold'));
						}
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $dc_color[$dj];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($csname);?> (<?php echo $row;?>)</td>
                    </tr>
                    <?php $dj++; } ?>
                    <?php  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="projects_status" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_tasks_status');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <?php $dc_color = array('#3c8dbc','#006400','#dd4b39','#a98852','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b','#46be8a','#f96868','#00c0ef','#3c8dbc','#f39c12','#605ca8','#d81b60','#001f3f','#39cccc','#3c8dbc','#006400','#dd4b39','#a98852','#b26fc2','#66456e','#c674ad','#975df3','#61a3ca','#6bddbd','#6bdd74','#95b655','#668b20','#bea034','#d3733b');?>
                    <?php $sj=0;$tasks = get_tasks_status(); foreach($tasks->result() as $etask) { ?>
                    <?php
						$trow = total_projects_status($etask->task_status);
						if($etask->task_status==0){
							$sname = htmlspecialchars_decode($this->lang->line('xin_not_started'));
						} else if($etask->task_status==1){
							$sname = htmlspecialchars_decode($this->lang->line('xin_in_progress'));
						} else if($etask->task_status==2){
							$sname = htmlspecialchars_decode($this->lang->line('xin_completed'));
						} else if($etask->task_status==3){
							$sname = htmlspecialchars_decode($this->lang->line('xin_project_cancelled'));
						} else if($etask->task_status==4){
							$sname = htmlspecialchars_decode($this->lang->line('xin_project_hold'));
						}	
					?>
                    <tr>
                      <td><div style="width:4px;border:5px solid <?php echo $dc_color[$sj];?>;"></div></td>
                      <td><?php echo htmlspecialchars_decode($sname);?> (<?php echo $trow;?>)</td>
                    </tr>
                    <?php $sj++; } ?>
                    <?php  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="tasks_status" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_last_projects');?></h3>
          <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/project/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-th-list"></span> <?php echo $this->lang->line('left_projects');?></button>
            </a> </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php foreach(total_last_projects() as $ls_projects):?>
		  <?php       
            //status
            if($ls_projects->status == 0) {
                $status = '<span class="label label-warning">'.$this->lang->line('xin_not_started').'</span>';
            } else if($ls_projects->status ==1){
                $status = '<span class="label label-primary">'.$this->lang->line('xin_in_progress').'</span>';
            } else if($ls_projects->status ==2){
                $status = '<span class="label label-success">'.$this->lang->line('xin_completed').'</span>';
            } else if($ls_projects->status ==3){
                $status = '<span class="label label-danger">'.$this->lang->line('xin_project_cancelled').'</span>';
            } else {
                $status = '<span class="label label-danger">'.$this->lang->line('xin_project_hold').'</span>';
            }
            $client = $this->Clients_model->read_client_info($ls_projects->client_id);
			if(!is_null($client)) {
				$client_name = $client[0]->name;
			} else {
				$client_name = '--';
			}
            ?>
            <strong><?php echo '<a href="'.site_url().'admin/project/detail/'.$ls_projects->project_id . '">'.$ls_projects->title.'</a>';?></strong>

          <p class="">
           <?php echo $this->lang->line('xin_project_client').': '.$client_name;?>
          </p>
          <p><?php echo $this->lang->line('xin_completed').' '.$ls_projects->project_progress.'%'.' <span class="pull-right">'.$status.'</span>'; ?></p>

          <hr>
          <?php endforeach;?>     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_last_tasks');?></h3>
          <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/timesheet/tasks/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-tasks"></span> <?php echo $this->lang->line('left_tasks');?></button>
            </a> </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php foreach(total_last_tasks() as $ls_tasks):?>
		  <?php       
            // task category
			$task_cat = $this->Project_model->read_task_category_information($ls_tasks->task_name);
			if(!is_null($task_cat)){
				$task_catname = $task_cat[0]->category_name;
			} else {
				$task_catname = '--';
			}
			// task status			
			if($ls_tasks->task_status == 0) {
				$status = '<span class="label label-warning">'.$this->lang->line('xin_not_started').'</span>';
			} else if($ls_tasks->task_status ==1){
				$status = '<span class="label label-primary">'.$this->lang->line('xin_in_progress').'</span>';
			} else if($ls_tasks->task_status ==2){
				$status = '<span class="label label-success">'.$this->lang->line('xin_completed').'</span>';
			} else if($ls_tasks->task_status ==3){
				$status = '<span class="label label-danger">'.$this->lang->line('xin_project_cancelled').'</span>';
			} else {
				$status = '<span class="label label-danger">'.$this->lang->line('xin_project_hold').'</span>';
			}
			// task project
			$prj_task = $this->Project_model->read_project_information($ls_tasks->project_id);
			if(!is_null($prj_task)){
				$prj_name = $prj_task[0]->title;
			} else {
				$prj_name = '--';
			}
            
            ?>
            <strong><?php echo '<a href="'.site_url().'admin/timesheet/task_details/id/'.$ls_tasks->task_id . '/">'.$task_catname.'</a>';?></strong>

          <p class="text-muted">
           <?php echo $this->lang->line('xin_project').': '.$prj_name;?>
          </p>
          <p><?php echo $this->lang->line('xin_completed').' '.$ls_tasks->task_progress.'%'.' <span class="pull-right">'.$status.'</span>'; ?></p>

          <hr>
          <?php endforeach;?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_last_clients');?></h3>
          <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/clients/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-user"></span> <?php echo $this->lang->line('xin_project_clients');?></button>
            </a> </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php $role_resources_ids = $this->Xin_model->user_role_resource(); foreach(total_last_clients() as $ls_clients):?>
		  <?php
             // get country
              $country = $this->Xin_model->read_country_info($ls_clients->country);
              if(!is_null($country)){
                $c_name = $country[0]->country_name;
              } else {
                  $c_name = '--';	
              }
			  // task status			
				if($ls_clients->is_active == 1) {
					$status = '<span class="label label-success">'.$this->lang->line('xin_employees_active').'</span>';
				} else {
					$status = '<span class="label label-danger">'.$this->lang->line('xin_employees_inactive').'</span>';
				}
            ?>
            <strong><?php echo $ls_clients->name;?></strong>

          <p class="text-muted">
           <?php echo $ls_clients->company_name.' <span class="pull-right">'.$c_name.'</span>'; ?></p>
		   <?php echo $status;?>
          <hr>
          <?php endforeach;?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_last_leads');?></h3>
          <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/leads/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-user-plus"></span> <?php echo $this->lang->line('xin_leads');?></button>
            </a> </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php $role_resources_ids = $this->Xin_model->user_role_resource(); foreach(total_last_leads() as $ls_leads):?>
		  <?php
            // get country
              $country = $this->Xin_model->read_country_info($ls_leads->country);
              if(!is_null($country)){
                $c_name = $country[0]->country_name;
              } else {
                  $c_name = '--';	
              }	
              $lead_flup = $this->Clients_model->get_total_lead_followup($ls_leads->client_id);
            // change to client
                if($ls_leads->is_changed == '0'){
                    $opt = '<span class="badge bg-purple">'.$this->lang->line('xin_lead').'</span>';
                } else {
                    $opt = '<span class="badge bg-green">'.$this->lang->line('xin_changed_client_leads_all').'</span>';
                }
                if($lead_flup > 0){
					if($ls_leads->is_changed == '0'){
						$ldflp_opt = '<span class="badge badge-info">'.$this->lang->line('xin_lead_followup').'</span>';
					} else {
						$ldflp_opt = '<span class="badge bg-yellow">'.$this->lang->line('xin_lead_no_followup').'</span>';
					}
				} else {
					$ldflp_opt = '';
				}
            
            if($ls_leads->is_changed == 0){
            $dview = '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_lead_add_followup').'"><a href="'.site_url().'admin/leads/followup/'.$ls_leads->client_id.'"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light"><span class="fa fa-arrow-circle-right"></span></button></a></span>';
            } else {
                $dview = '';
            }
            ?>
            <strong><?php echo $ls_leads->name;?></strong>

          <p class="text-muted">
           <?php echo $ls_leads->company_name.' <span class="pull-right">'.$c_name.'</span>'; ?></p>
		   <?php echo $opt.' '.$ldflp_opt;?>
          <hr>
          <?php endforeach;?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    </div>
<div class="row">
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_last_invoices');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/invoices/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-calendar-plus-o"></span> <?php echo $this->lang->line('xin_invoices_title');?></button>
            </a> </div>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <th><?php echo $this->lang->line('xin_invoice_no');?></th>
              <th><?php echo $this->lang->line('xin_acc_total');?></th>
              <th><?php echo $this->lang->line('xin_invoice_due_date');?></th>
              <th><?php echo $this->lang->line('kpi_status');?></th>
            </tr>
            <?php $role_resources_ids = $this->Xin_model->user_role_resource(); foreach(total_last_invoices() as $ls_invoices):?>
			  <?php
                 // get country
                 $grand_total = $this->Xin_model->currency_sign($ls_invoices->grand_total);
                  // get project
                  $project = $this->Project_model->read_project_information($ls_invoices->project_id); 
                  if(!is_null($project)){
                    $project_name = $project[0]->title;
                  } else {
                      $project_name = '--';	
                  }
                  $invoice_date = '<i class="far fa-calendar-alt position-left"></i> '.$this->Xin_model->set_date_format($ls_invoices->invoice_date);
                  $invoice_due_date = '<i class="far fa-calendar-alt position-left"></i> '.$this->Xin_model->set_date_format($ls_invoices->invoice_due_date);
                  //invoice_number
                  $invoice_number = '';
                    if(in_array('330',$role_resources_ids)) { //view
                        $invoice_number = '<a href="'.site_url().'admin/invoices/view/'.$ls_invoices->invoice_id.'/">'.$ls_invoices->invoice_number.'</a>';
                    } else {
                        $invoice_number = $ls_invoices->invoice_number;
                    }
                    if($ls_invoices->status == 0){
                        $status = '<span class="label label-danger">'.$this->lang->line('xin_payroll_unpaid').'</span>';
                    } else if($ls_invoices->status == 1) {
                        $status = '<span class="label label-success">'.$this->lang->line('xin_payment_paid').'</span>';
                    } else {
                        $status = '<span class="label label-info">'.$this->lang->line('xin_acc_inv_cancelled').'</span>';
                    }
                ?>
            <tr>
                <td><?php echo $invoice_number;?></td>
                <td><?php echo $grand_total;?></td>
                <td><?php echo $invoice_due_date;?></td>
                <td><?php echo $status;?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_last_estimates');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/quotes/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-calendar-check-o"></span> <?php echo $this->lang->line('xin_estimates');?></button>
            </a> </div>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
            <th><?php echo $this->lang->line('xin_title_quote_hash');?></th>
            <th><?php echo $this->lang->line('xin_acc_total');?></th>
            <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_invoice_due_date');?></th>
            <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
            </tr>
            <?php $role_resources_ids = $this->Xin_model->user_role_resource(); foreach(total_last_estimates() as $ls_estimates):?>
			  <?php
                 /// get country
                   $company_info = $this->Company_model->read_company_information($ls_estimates->company_id);
                    if(!is_null($company_info)){
                        $grand_total = $this->Xin_model->company_currency_sign($ls_estimates->grand_total,$ls_estimates->company_id);	
                    } else {
                        $grand_total = $this->Xin_model->currency_sign($ls_estimates->grand_total);
                    }
                            
                            
                   // get project
                  $project = $this->Project_model->read_project_information($ls_estimates->project_id); 
                  if(!is_null($project)){
                    $project_name = $project[0]->title;
                  } else {
                      $project_name = '--';	
                  }
                $quote_date = '<i class="far fa-calendar-alt position-left"></i> '.$this->Xin_model->set_date_format($ls_estimates->quote_date);
                $quote_due_date = '<i class="far fa-calendar-alt position-left"></i> '.$this->Xin_model->set_date_format($ls_estimates->quote_due_date);
                $quote_number = '';
                if(in_array('330',$role_resources_ids)) { //view
                    $quote_number = '<a href="'.site_url().'admin/quotes/view/'.$ls_estimates->quote_id.'/">'.$ls_estimates->quote_number.'</a>';
                } else {
                    $quote_number = $ls_estimates->quote_number;
                }
                if($ls_estimates->status == 0){
                    $status = '<span class="label label-warning">'.$this->lang->line('xin_quoted_title').'</span>';
                } else {
                    $status = '<span class="label label-success">'.$this->lang->line('xin_quote_invoiced').'</span>';
                }
                $quote_convert_record = $this->Quotes_model->read_quote_converted_info($ls_estimates->quote_id);
                ?>
            <tr>
                <td><?php echo $quote_number;?></td>
                <td><?php echo $grand_total;?></td>
                <td><?php echo $quote_due_date;?></td>
                <td><?php echo $status;?></td>
              </tr>
              <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3">
        <div class="box">
          <div class="box-body">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_hr_calendar_options');?> </h3>
            </div>
            
            <div class="list-group" id="list_group">
              <span class="list-group-item calendar-options text-green hrsale-drag-option" data-record="0"> <i class="fa fa-list"></i> <?php echo $this->lang->line('left_projects');?></span>
              <span class="list-group-item calendar-options text-maroon hrsale-drag-option" data-record="0"> <i class="fa fa-tasks"></i> <?php echo $this->lang->line('left_tasks');?></span>
              <span class="list-group-item calendar-options text-navy hrsale-drag-option" data-record="0"> <i class="fa fa-calendar-plus-o"></i> <?php echo $this->lang->line('xin_invoices_title');?></span>
              <span class="list-group-item calendar-options text-teal hrsale-drag-option" data-record="0"> <i class="fa fa-calendar-check-o"></i> <?php echo $this->lang->line('xin_estimates');?></span>
              <span class="list-group-item calendar-options text-aqua hrsale-drag-option" data-record="0"> <i class="ion ion-thumbsup"></i> <?php echo $this->lang->line('xin_lead_follow_up');?></span>
              <span class="list-group-item calendar-options text-yellow hrsale-drag-option" data-record="0"> <i class="fa fa-money"></i> <?php echo $this->lang->line('xin_acc_invoice_payments');?></span>
              
            </div>  
            </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="box">
          <div class="box-body">
            <div id='calendar_projects'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>