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
    <h4 class="widget-user-username welcome-hrsale-user"><?php echo $this->lang->line('hr_timesheet_dashboard_title');?></h4>
    <h5 class="widget-user-desc welcome-hrsale-user-text"><?php echo $this->lang->line('xin_title_today_is');?> <?php echo date('l, j F Y');?></h5>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Timesheet Report</h5>
      </div>
      <!-- /.card-header -->
      
      <!-- ./card-body -->
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              
              <h5 class="description-header"><?php echo employee_request_leaves();?></h5>
              <span class="description-text">Total Leaves</span>
              <span class="info-box-text"><span class="badge bg-green"> <?php echo $this->lang->line('xin_approved');?> <?php echo accepted_leave_request();?> </span><span class="ml-2"> <span class="badge bg-yellow"> <?php echo $this->lang->line('xin_pending');?> <?php echo pending_leave_request();?> </span></span> <span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_rejected');?> <?php echo rejected_leave_request();?> </span></span></span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              
              <h5 class="description-header"><?php echo employee_holidays();?></h5>
              <span class="description-text">Total Holidays</span>
              <span class="info-box-text"><span class="badge bg-green"> <?php echo $this->lang->line('xin_published');?> <?php echo employee_published_holidays();?> </span><span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_unpublished');?> <?php echo employee_unpublished_holidays();?> </span></span> </span>
              
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              
              <h5 class="description-header"><?php echo employee_overtime_request();?></h5>
              <span class="description-text">Total Overtime Request</span>
              <span class="info-box-text"><span class="badge bg-green"> <?php echo $this->lang->line('xin_approved');?> <?php echo employee_approved_overtime_request();?> </span><span class="ml-2"> <span class="badge bg-yellow"> <?php echo $this->lang->line('xin_pending');?> <?php echo employee_pending_overtime_request();?> </span></span> <span class="ml-2"> <span class="badge bg-red"> <?php echo $this->lang->line('xin_rejected');?> <?php echo employee_rejected_overtime_request();?> </span></span></span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block">
              
              <h5 class="description-header"><?php echo employee_total_shifts();?></h5>
              <span class="description-text">Total Office Shifts</span>
              <span class="info-box-text"><a href="<?php echo site_url('admin/timesheet/office_shift/');?>"><?php echo $this->lang->line('xin_view_all');?> <i class="fa fa-arrow-circle-o-right"></i></a></span>
            </div>
            <!-- /.description-block -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
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
<div class="row">
  
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_leave_status');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/timesheet/leave/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-th-list"></span> <?php echo $this->lang->line('xin_manage_leaves');?></button>
            </a> </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo accepted_leave_request();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#46be8a" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_approved');?></div>
          </div>
          <!-- ./col -->
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo pending_leave_request();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#ffc107" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_pending');?></div>
          </div>
          <!-- ./col --> 
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo rejected_leave_request();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#f96868" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_rejected');?></div>
          </div>
          <!-- ./col -->
        </div>
        
        
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_today_attendance_status');?></h3>
        <div class="box-tools pull-right"> <?php echo date('Y-m-d');?></div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-6 col-md-6 text-center">
            <input type="text" class="knob" value="<?php echo $working;?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#46be8a" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_emp_working');?></div>
          </div>
          <!-- ./col -->
          <div class="col-xs-6 col-md-6 text-center">
            <input type="text" class="knob" value="<?php echo $abs;?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#f96868" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_absent');?></div>
          </div>
          <!-- ./col --> 
        </div>
        
        
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_overtime_request_status');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/overtime_request/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-th-list"></span> <?php echo $this->lang->line('xin_overtime_request');?></button>
            </a> </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo employee_approved_overtime_request();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#46be8a" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_approved');?></div>
          </div>
          <!-- ./col -->
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo employee_pending_overtime_request();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#ffc107" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_pending');?></div>
          </div>
          <!-- ./col --> 
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo employee_rejected_overtime_request();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#f96868" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_rejected');?></div>
          </div>
          <!-- ./col -->
        </div>
        
        
      </div>
    </div>
  </div>
</div>
<div class="row <?php echo $get_animate;?>">
<div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_leave_status');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <tr>
                      <td><div style="width:4px;border:5px solid #00a65a;"></div></td>
                      <td><?php echo $this->lang->line('xin_approved');?> (<?php echo accepted_leave_request();?>)</td>
                    </tr>
                    <tr>
                      <td><div style="width:4px;border:5px solid #f39c12;"></div></td>
                      <td><?php echo $this->lang->line('xin_pending');?> (<?php echo pending_leave_request();?>)</td>
                    </tr>
                    <tr>
                      <td><div style="width:4px;border:5px solid #f56954;"></div></td>
                      <td><?php echo $this->lang->line('xin_rejected');?> (<?php echo rejected_leave_request();?>)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="leave_status" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_today_attendance_status');?></h3>
      </div>
      <div class="box-body">
        <div class="box-block">
          <div class="col-md-7">
            <div class="overflow-scrolls" style="overflow:auto; height:200px;">
              <div class="table-responsive">
                <table class="table mb-0 table-dashboard">
                  <tbody>
                    <tr>
                      <td><div style="width:4px;border:5px solid #00a65a;"></div></td>
                      <td><?php echo $this->lang->line('xin_emp_working');?> (<?php echo $working;?>)</td>
                    </tr>
                    <tr>
                      <td><div style="width:4px;border:5px solid #f56954;"></div></td>
                      <td><?php echo $this->lang->line('xin_absent');?> (<?php echo $abs;?>)</td>
                    </tr>
                    <?php  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <canvas id="attendance_status" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_latest_leave');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/timesheet/leave/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-calendar-plus-o"></span> <?php echo $this->lang->line('xin_view_all');?></button>
            </a> </div>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
                <th><?php echo $this->lang->line('xin_leave_type');?></th>
                <th><?php echo $this->lang->line('xin_employee');?></th>
                <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_leave_duration');?></th>
                <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_applied_on');?></th>
                <th><?php echo $this->lang->line('kpi_status');?></th>
            </tr>
            <?php $role_resources_ids = $this->Xin_model->user_role_resource(); foreach(total_last_leaves() as $ls_leaves):?>
			  <?php
                 // get start date and end date
				$user = $this->Xin_model->read_user_info($ls_leaves->employee_id);
				if(!is_null($user)){
					$full_name = $user[0]->first_name. ' '.$user[0]->last_name;
				} else {
					$full_name = '--';	
				}
				 
				// get leave type
				$leave_type = $this->Timesheet_model->read_leave_type_information($ls_leaves->leave_type_id);
				if(!is_null($leave_type)){
					$type_name = $leave_type[0]->type_name;
				} else {
					$type_name = '--';	
				}
				 
				$datetime1 = new DateTime($ls_leaves->from_date);
				$datetime2 = new DateTime($ls_leaves->to_date);
				$interval = $datetime1->diff($datetime2);
				if(strtotime($ls_leaves->from_date) == strtotime($ls_leaves->to_date)){
					$no_of_days =1;
				} else {
					$no_of_days = $interval->format('%a') + 1;
				}
				$applied_on = $this->Xin_model->set_date_format($ls_leaves->applied_on);
				 /*$duration = $this->Xin_model->set_date_format($ls_leaves->from_date).' '.$this->lang->line('dashboard_to').' '.$this->Xin_model->set_date_format($ls_leaves->to_date).'<br>'.$this->lang->line('xin_hrsale_total_days').': '.$no_of_days;*/
				
				 if($ls_leaves->is_half_day == 1){
				$duration = $this->Xin_model->set_date_format($ls_leaves->from_date).' '.$this->lang->line('dashboard_to').' '.$this->Xin_model->set_date_format($ls_leaves->to_date).'<br>'.$this->lang->line('xin_hrsale_total_days').': '.$this->lang->line('xin_hr_leave_half_day');
				} else {
					$duration = $this->Xin_model->set_date_format($ls_leaves->from_date).' '.$this->lang->line('dashboard_to').' '.$this->Xin_model->set_date_format($ls_leaves->to_date).'<br>'.$this->lang->line('xin_hrsale_total_days').': '.$no_of_days;
				}
				
				if($ls_leaves->status==1): $status = '<span class="badge bg-orange">'.$this->lang->line('xin_pending').'</span>';
				elseif($ls_leaves->status==2): $status = '<span class="badge bg-green">'.$this->lang->line('xin_approved').'</span>';
				elseif($ls_leaves->status==4): $status = '<span class="badge bg-green">'.$this->lang->line('xin_role_first_level_approved').'</span>';
				else: $status = '<span class="badge bg-red">'.$this->lang->line('xin_rejected').'</span>'; endif;
				
				$itype_name = $type_name.'<br><small class="text-muted"><i>'.$this->lang->line('xin_reason').': '.$ls_leaves->reason.'<i></i></i></small>';
                ?>
            <tr>
                <td><a href="<?php echo site_url('admin/timesheet/leave_details/id/').$ls_leaves->leave_id.'/';?>"><?php echo $type_name;?></a></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $duration;?></td>
                <td><?php echo $applied_on;?></td>
                <td><?php echo $status;?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <div class="row">
  <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_latest_holidays');?></h3>
          <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/timesheet/holidays/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-th-list"></span> <?php echo $this->lang->line('xin_view_all_holidays');?></button>
            </a> </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <table class="table table-striped table-bordered">
          <tbody>
            <tr>
                <th><?php echo $this->lang->line('xin_event_name');?></th>
                <th><?php echo $this->lang->line('xin_start_date');?></th>
                <th><?php echo $this->lang->line('kpi_status');?></th>
            </tr>
            <?php $role_resources_ids = $this->Xin_model->user_role_resource(); foreach(total_last_holidays() as $ls_holidays):?>
			  <?php
                 if($ls_holidays->is_publish==1): $publish = '<span class="badge bg-green">'.$this->lang->line('xin_published').'</span>'; else: $publish = '<span class="badge bg-orange">'.$this->lang->line('xin_unpublished').'</span>'; endif;
			 // get start date and end date
			 $sdate = $this->Xin_model->set_date_format($ls_holidays->start_date);
			 $edate = $this->Xin_model->set_date_format($ls_holidays->end_date);
                ?>
            <tr>
                <td><?php echo $ls_holidays->event_name;?></td>
                <td><?php echo $sdate;?></td>
                <td><?php echo $publish;?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>    
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('xin_overtime_request');?></h3>
          <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/overtime_request/');?>">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-th-list"></span> <?php echo $this->lang->line('xin_view_all');?></button>
            </a> </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped table-bordered">
          <tbody>
            <tr>
                <th><?php echo $this->lang->line('xin_employee');?></th>
                <th><?php echo $this->lang->line('xin_overtime_thours');?></th>
                <th><?php echo $this->lang->line('kpi_status');?></th>
            </tr>
            <?php foreach(total_last_overtime_request() as $ls_overtime):?>
			  <?php
                // total work
				$in_time = new DateTime($ls_overtime->request_clock_in);
				$out_time = new DateTime($ls_overtime->request_clock_out);
				
				$employee_id = $this->Xin_model->read_user_info($ls_overtime->employee_id);	
				if(!is_null($employee_id)) {
					$full_name = $employee_id[0]->employee_id;
				} else {
					$full_name = '';
				}
				
				
				$clock_in = $in_time->format('h:i a');			
				// attendance date
				$att_date_in = explode(' ',$ls_overtime->request_clock_in);
				$att_date_out = explode(' ',$ls_overtime->request_clock_out);
				$request_date = $this->Xin_model->set_date_format($ls_overtime->request_date);
				$cin_date = $clock_in;
				if($ls_overtime->request_clock_out=='') {
					$cout_date = '-';
					$total_time = '-';
				} else {
					$clock_out = $out_time->format('h:i a');
					$interval = $in_time->diff($out_time);
					$hours  = $interval->format('%h');
					$minutes = $interval->format('%i');			
					$total_time = $hours ."h ".$minutes."m";
					$cout_date = $clock_out;
				}
				if($ls_overtime->is_approved == '1'){
					$status = $this->lang->line('xin_pending');
				} else if($ls_overtime->is_approved == '2'){
					$status = $this->lang->line('xin_accepted');
				} else {
					$status = $this->lang->line('xin_rejected');
				}
                ?>
            <tr>
                <td><?php echo $full_name;?></td>
                <td><?php echo $total_time;?></td>
                <td><?php echo $status;?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>   
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<?php //$this->load->view('admin/accounting/accounts_calendar');?>