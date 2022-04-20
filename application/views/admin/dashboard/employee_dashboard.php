<?php 
$session = $this->session->userdata('username');
$user_info = $this->Exin_model->read_user_info($session['user_id']);
if($user_info[0]->password=='$2y$12$3xcEaqm5vdQNswKV3fD2l.bL1a3.qQasv.S/uHzcC4L2/XXRq/I3G'){
  redirect('/admin/profile?change_password=true');
}
$theme = $this->Xin_model->read_theme_info(1);
if($user_info[0]->profile_picture!='' && $user_info[0]->profile_picture!='no file') {
  $lde_file = base_url().'uploads/profile/'.$user_info[0]->profile_picture;
} else { 
  if($user_info[0]->gender=='Male') {  
    $lde_file = base_url().'uploads/profile/default_male.jpg'; 
  } else {  
    $lde_file = base_url().'uploads/profile/default_female.jpg';
  }
}
$last_login =  new DateTime($user_info[0]->last_login_date);
// get designation
$designation = $this->Designation_model->read_designation_information($user_info[0]->designation_id);
if(!is_null($designation)){
  $designation_name = $designation[0]->designation_name;
} else {
  $designation_name = '--'; 
}
$role_user = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);
if(!is_null($role_user)){
  $role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
  $role_resources_ids = explode(',',0); 
}
?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $announcement = $this->Announcement_model->get_new_announcements();?>
<div class="row <?php echo $get_animate;?>">
<?php if(in_array('14',$role_resources_ids)) { ?>
  <?php if($system[0]->module_awards=='true'){?>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state"> <a class="text-muted" href="<?php echo site_url('admin/awards/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-primary"><i class="fa fa-trophy"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Exin_model->total_employee_awards_dash();?> <?php echo $this->lang->line('left_awards');?></span> <span class="info-box-text"><span class=""> <?php echo $this->lang->line('xin_view');?> </span></span></div>
      <!-- /.info-box-content --> 
    </div>
    </a> 
    <!-- /.info-box --> 
  </div>
  <?php } else {?>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state"> <a class="text-muted" href="<?php echo site_url('admin/timesheet/attendance/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-primary"><i class="fa fa-clock-o"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('dashboard_attendance');?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_view');?></span> </div>
      <!-- /.info-box-content --> 
    </div>
    </a> 
    <!-- /.info-box --> 
  </div>
  <?php } ?>
  <?php } ?>
  <?php if(in_array('37',$role_resources_ids)) { ?>
  <!-- /.col -->
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state"> <a class="text-muted" href="<?php echo site_url('admin/payroll/payment_history/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('left_payslips');?> <?php echo $this->lang->line('xin_view');?></span></div>
      <!-- /.info-box-content --> 
    </div>
    </a> 
    <!-- /.info-box --> 
  </div>
  <!-- /.col --> 
  <?php } ?>
  <!-- fix for small devices only -->
  <?php if(in_array('46',$role_resources_ids)) { ?>
  <div class="clearfix visible-sm-block"></div>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state"> <a class="text-muted" href="<?php echo site_url('admin/timesheet/leave/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-purple"><i class="fa fa-calendar"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_performance_management');?> <?php echo $this->lang->line('left_leave');?></span></div>
      <!-- /.info-box-content --> 
    </div>
    </a> 
    <!-- /.info-box --> 
  </div>
  <?php } ?>
  <?php if($system[0]->module_travel=='true'){?>
  <!-- /.col -->
  <?php if(in_array('17',$role_resources_ids)) { ?>
  <div class="col-xl-6 col-md-3 col-12 hr-mini-state"> <a class="text-muted" href="<?php echo site_url('admin/travel/');?>">
    <div class="info-box hrsalle-mini-stat"> <span class="info-box-icon bg-red"><i class="fa fa-plane"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->lang->line('xin_travel');?> <?php echo $this->lang->line('xin_requests');?></span></div>
      <!-- /.info-box-content --> 
    </div>
    </a> 
    <!-- /.info-box --> 
  </div>  
  <?php } ?>
  <!-- /.col -->
  <?php } ?>
</div>
<?php
$att_date =  date('d-M-Y');
$attendance_date = date('d-M-Y');
// get office shift for employee
$get_day = strtotime($att_date);
$day = date('l', $get_day);
$strtotime = strtotime($attendance_date);
$new_date = date('d-M-Y', $strtotime);
// office shift
$u_shift = $this->Timesheet_model->read_office_shift_information($user_info[0]->office_shift_id);

// get clock in/clock out of each employee
if($day == 'Monday') {
  if($u_shift[0]->monday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_monday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->monday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->monday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
} else if($day == 'Tuesday') {
  if($u_shift[0]->tuesday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_tuesday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->tuesday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->tuesday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
} else if($day == 'Wednesday') {
  if($u_shift[0]->wednesday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_wednesday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->wednesday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->wednesday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
} else if($day == 'Thursday') {
  if($u_shift[0]->thursday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_thursday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->thursday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->thursday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
} else if($day == 'Friday') {
  if($u_shift[0]->friday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_friday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->friday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->friday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
} else if($day == 'Saturday') {
  if($u_shift[0]->saturday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_saturday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->saturday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->saturday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
} else if($day == 'Sunday') {
  if($u_shift[0]->sunday_in_time==''){
    $office_shift = $this->lang->line('dashboard_today_sunday_shift');
  } else {
    $in_time =  new DateTime($u_shift[0]->sunday_in_time. ' ' .$attendance_date);
    $out_time =  new DateTime($u_shift[0]->sunday_out_time. ' ' .$attendance_date);
    $clock_in = $in_time->format('h:i a');
    $clock_out = $out_time->format('h:i a');
    $office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
  }
}
?>
<?php $sys_arr = explode(',',$system[0]->system_ip_address); ?>
<?php $attendances = $this->Timesheet_model->attendance_time_checks($user_info[0]->user_id); $dat = $attendances->result();?>
<?php
$bgatt = 'bg-success';
if($attendances->num_rows() < 1) {
  $bgatt = 'bg-success';
} else {
  $bgatt = 'bg-danger';
}
?>
<div class="row <?php echo $get_animate;?>">
  <div class="col-md-12">


  <?php foreach($announcement as $new_announcement):?>
  <?php
    $current_date = strtotime(date('Y-m-d'));
    $announcement_end_date = strtotime($new_announcement->end_date);
    if($current_date <= $announcement_end_date) {
  ?>

  <div class="alert alert-success alert-dismissible fade in mb-1" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    <strong><?php echo $new_announcement->title;?>:</strong> <?php echo $new_announcement->summary;?> <a href="#" class="alert-link" data-toggle="modal" data-target=".view-modal-annoucement" data-announcement_id="<?php echo $new_announcement->announcement_id;?>"><?php echo $this->lang->line('xin_view');?></a> </div>
  <?php } ?>
  <?php endforeach;?>

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">
          <!-- <?php echo $this->lang->line('xin_attendance_mark_attendance');?> -->
            Clock In
          </a>
        </li>
        <!-- <li><a href="#tab_2" data-toggle="tab"><?php echo $this->lang->line('xin_attendance_overview_this_month');?></a></li> -->
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="box-widget widget-user"> 
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header <?php echo $bgatt;?> bg-darken-2">
              <h3 class="widget-user-username"><?php echo $user_info[0]->first_name. ' ' .$user_info[0]->last_name;?> </h3>
              <h5 class="widget-user-desc"><?php echo $designation_name;?></h5>
            </div>
            <div class="widget-user-image"> <img class="img-circle" src="<?php echo $lde_file;?>" alt="User Avatar"> </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <p class="text-muted pb-0-5"><?php echo $this->lang->line('dashboard_last_login');?>: <?php echo $this->Xin_model->set_date_format($user_info[0]->last_login_date).' '.$last_login->format('h:i a');?></p>
                    <p class="text-muted pb-0-5"><?php echo $office_shift;?></p>
                  </div>
                  <!-- /.description-block --> 
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="text-xs-center">
                    <div class="text-xs-center pb-0-5">

                      <?php $attributes = array('name' => 'set_log', 'id' => 'set_clocking', 'autocomplete' => 'off', 'class' => 'form');?>
                      <?php $hidden = array('user_id' => $session['user_id']);?>
                      <?php echo form_open('admin/timesheet/set_log', $attributes, $hidden);?>
                      <input type="hidden" name="timeshseet" value="<?php echo $user_info[0]->user_id;?>">
                      <input type="hidden" value="clock_in" name="clock_state" id="clock_state">
                      <input type="hidden" value="" name="time_id" id="time_id">
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-success btn-block text-uppercase" type="button" id="clock_btn_in"><i class="fa fa-arrow-circle-right"></i> <?php echo $this->lang->line('dashboard_clock_in');?></button>
                        </div>
                      </div>
                      <input type="hidden" value="" name="image" id="image">
                      <input type="hidden" value="" name="latitude_in" id="latitude">
                      <input type="hidden" value="" name="longitude_in" id="longitude">
                      <input type="hidden" value="" name="address" id="address">
                      <?php echo form_close(); ?> </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row"> 

                  <div class="col-md-12" id="btn_submit_div" style="display: none;">
                    <div id="results_image" class="text-center"></div>    <br>
                    <button type="button" id="submit_btn_attendance" class="btn btn-primary btn-block">Submit</button>
                  </div>
              </div>
              <br>
                <div class="row">
                    <style>
                    /* Set the size of the div element that contains the map */
                    #map {
                    height: 200px;  /* The height is 400 pixels */
                    width: 100%;  /* The width is the width of the web page */
                    }
                    </style>
                    <h3>Current Location : </h3>
                    <div id="map"></div>
                </div>
              <?php if(in_array('10',$role_resources_ids)) { ?>
              <div class="row">
                <div class="col-md-12 col-md-offset-1">
                  <div class="margin">
                    <div class="btn-group"> <a type="button" href="<?php echo site_url('admin/timesheet/');?>" class="btn btn-default btn-flat">My Attendance Timesheet</a> </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.row --> 
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <?php
                $date = strtotime(date("Y-m-d"));
                $day = date('d', $date);
                $month = date('m', $date);
                $year = date('Y', $date);
        // total days in month
        $daysInMonth = cal_days_in_month(0, $month, $year);
        $imonth = date('F', $date);
        $r = $this->Xin_model->read_user_info($session['user_id']);
        $pcount = 0;
        $acount = 0;
        $lcount = 0;
        for($i = 1; $i <= $daysInMonth; $i++):
          $i = str_pad($i, 2, 0, STR_PAD_LEFT);
          // get date <
          $attendance_date = $year.'-'.$month.'-'.$i;
          $get_day = strtotime($attendance_date);
          $day = date('l', $get_day);
          $user_id = $r[0]->user_id;
          $office_shift_id = $r[0]->office_shift_id;
          $attendance_status = '';
          // get holiday
          $h_date_chck = $this->Timesheet_model->holiday_date_check($attendance_date);
          $holiday_arr = array();
          if($h_date_chck->num_rows() == 1){
            $h_date = $this->Timesheet_model->holiday_date($attendance_date);
            $begin = new DateTime( $h_date[0]->start_date );
            $end = new DateTime( $h_date[0]->end_date);
            $end = $end->modify( '+1 day' ); 
            
            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($begin, $interval ,$end);
            
            foreach($daterange as $date){
              $holiday_arr[] =  $date->format("Y-m-d");
            }
          } else {
            $holiday_arr[] = '99-99-99';
          }
          // get leave/employee
          $leave_date_chck = $this->Timesheet_model->leave_date_check($user_id,$attendance_date);
          $leave_arr = array();
          if($leave_date_chck->num_rows() == 1){
            $leave_date = $this->Timesheet_model->leave_date($user_id,$attendance_date);
            $begin1 = new DateTime( $leave_date[0]->from_date );
            $end1 = new DateTime( $leave_date[0]->to_date);
            $end1 = $end1->modify( '+1 day' ); 
            
            $interval1 = new DateInterval('P1D');
            $daterange1 = new DatePeriod($begin1, $interval1 ,$end1);
            
            foreach($daterange1 as $date1){
              $leave_arr[] =  $date1->format("Y-m-d");
            } 
          } else {
            $leave_arr[] = '99-99-99';
          }
          $office_shift = $this->Timesheet_model->read_office_shift_information($office_shift_id);
          $check = $this->Timesheet_model->attendance_first_in_check($user_id,$attendance_date);
          // get holiday>events
          if($office_shift[0]->monday_in_time == '' && $day == 'Monday') {
            $status = 'H';  
            $pcount += 0;
            //$acount += 0;
          } else if($office_shift[0]->tuesday_in_time == '' && $day == 'Tuesday') {
            $status = 'H';
            $pcount += 0;
            //$acount += 0;
          } else if($office_shift[0]->wednesday_in_time == '' && $day == 'Wednesday') {
            $status = 'H';
            $pcount += 0;
            //$acount += 0;
          } else if($office_shift[0]->thursday_in_time == '' && $day == 'Thursday') {
            $status = 'H';
            $pcount += 0;
            //$acount += 0;
          } else if($office_shift[0]->friday_in_time == '' && $day == 'Friday') {
            $status = 'H';
            $pcount += 0;
            //$acount += 0;
          } else if($office_shift[0]->saturday_in_time == '' && $day == 'Saturday') {
            $status = 'H';
            $pcount += 0;
            //$acount -= 1;
          } else if($office_shift[0]->sunday_in_time == '' && $day == 'Sunday') {
            $status = 'H';
            $pcount += 0;
            //$acount -= 1;
          } else if(in_array($attendance_date,$holiday_arr)) { // holiday
            $status = 'H';
            $pcount += 0;
            //$acount += 0;
          } else if(in_array($attendance_date,$leave_arr)) { // on leave
            $status = 'L';
            $pcount += 0;
            $lcount += 1;
          //  $acount += 0;
          } else if($check->num_rows() > 0){
            $pcount += 1;
            //$acount -= 1;
          } else {
            $status = 'A';
            //$acount += 1;
            $pcount += 0;
            // set to present date
            $iattendance_date = strtotime($attendance_date);
            $icurrent_date = strtotime(date('Y-m-d'));
            if($iattendance_date <= $icurrent_date){
              $acount += 1;
            } else {
              $acount += 0;
            }
          }
        endfor;
                ?>
          <div class="">
            <div class="box-body">
              <div class="table-responsive" data-pattern="priority-columns">
                <table class="table table-striped m-md-b-0">
                  <tbody>
                    <tr>
                      <th scope="row" colspan="2" style="text-align: center;"><?php echo $this->lang->line('xin_attendance_this_month');?></th>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_attendance_total_present');?></th>
                      <td class="text-right"><?php echo $pcount;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_attendance_total_absent');?></th>
                      <td class="text-right"><?php echo $acount;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_attendance_total_leave');?></th>
                      <td class="text-right"><?php echo $lcount;?></td>
                    </tr>
                    <?php if(in_array('261',$role_resources_ids)) { ?>
                    <tr>
                      <th scope="row" colspan="2" style="text-align: center;"><a href="<?php echo site_url('admin/timesheet/timecalendar/');?>"><?php echo $this->lang->line('xin_attendance_cal_view');?></a></th>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.tab-pane --> 
      </div>
      <!-- /.tab-content --> 
    </div>
    <!-- Widget: user widget style 1 --> 
  </div>
  <!-- /.widget-user -->
</div>


<!-- Modal -->
<div id="myModalCamera" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Take Picture</h4>
      </div>
      <div class="modal-body">
         <div id="my_camera"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onClick="take_snapshot()"> <i class="fa fa-camera"></i> Take </button>
        <button type="button" class="btn btn-default" id="close_camera">Close</button>
      </div>
    </div>

  </div>
</div>

<style type="text/css">
.btn-group {
  margin-top:5px !important;
}
</style>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $system[0]->google_maps_api_key;?>&callback=initMap">    </script>
<script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
var map, infoWindow;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 6
            });
    infoWindow = new google.maps.InfoWindow;

}

function getCurrentLoc(){
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
        console.log(pos);
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
        geo_loc = processGeolocationResult(position);
        currLatLong = geo_loc.split(",");


        var alamat ="";
        var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        currgeocoder = new google.maps.Geocoder();
        currgeocoder.geocode({
                'location': myLatlng
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results[0].formatted_address);
                    infoWindow.setContent(results[0].formatted_address);
                    $("#address").val(results[0].formatted_address);
                    /*$("#address").val(results[0].formatted_address);*/
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        console.log("lokasi "+alamat);
        infoWindow.setPosition(pos);
        /*infoWindow.setContent(initializeCurrent(currLatLong[0], currLatLong[1]));*/
        infoWindow.open(map);
        map.setCenter(pos);
        }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    alert('Tidak Bisa Mendapatkan Lokasi Saat Ini.');
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
    'Error: The Geolocation service failed.' :
    'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}
function processGeolocationResult(position) {
    html5Lat = position.coords.latitude; //Get latitude
    html5Lon = position.coords.longitude; //Get longitude
    html5TimeStamp = position.timestamp; //Get timestamp
    html5Accuracy = position.coords.accuracy; //Get accuracy in meters
    return (html5Lat).toFixed(8) + ", " + (html5Lon).toFixed(8);
}

function initializeCurrent(latcurr, longcurr) {
    currgeocoder = new google.maps.Geocoder();

    console.log(latcurr + "-- ######## --" + longcurr);

    if (latcurr != '' && longcurr != '') {
        //call google api function
        var myLatlng = new google.maps.LatLng(latcurr, longcurr);
        return getCurrentAddress(myLatlng);
    }
}
function getCurrentAddress(location) {
    currgeocoder.geocode({
        'location': location
    }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            //console.log(results[0]);
            return results[0];
            /*$("#address").val(results[0].formatted_address);*/
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function tes(){
if ("geolocation" in navigator){ //check geolocation available 
//try to get user current location using getCurrentPosition() method
navigator.geolocation.getCurrentPosition(function(position){ 
alert(position);
console.log(position);
$("#result").html("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
});
}else{
console.log("Browser doesn't support geolocation!");
}
}
</script>


 <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $system[0]->google_maps_api_key;?>&sensor=false"></script> -->



<script type="text/javascript">
    $(function(){
        // getCurrentLoc();
    })
</script>

<script type="text/javascript" src="<?php echo base_url();?>skin/hrsale_assets/vendor/webcamjs/webcam.min.js"></script>

<script language="JavaScript">
     Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
     });

     // preload shutter audio clip
    //  var shutter = new Audio();
    //  shutter.autoplay = true;
    //  shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

    function take_snapshot() {
        // shutter.play();
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('results_image').innerHTML = 
            '<img src="'+data_uri+'"/>';
            
            $('#image').val(data_uri);
            // $('#image_in').val(data_uri);
            $('#myModalCamera').modal('hide');
            $('#btn_submit_div').show();
            Webcam.reset();
        });
    }

    function opencamera(){
        Webcam.attach( '#my_camera' );
    }

    $(function(){
        $('#clock_btn_in').click(function(){
            getCurrentLoc();
            $('#myModalCamera').modal('show');
            opencamera();
        });
        $('#clock_btn_out').click(function(){
            getCurrentLoc();
            $('#myModalCamera').modal('show');
            opencamera();
        });
        $('#submit_btn_attendance').click(function(){
            var form_submit = $('#set_clocking').serialize();
            $('#set_clocking').submit();
        });
        $('#close_camera').click(function(){
            $('#myModalCamera').modal('hide');
            Webcam.reset();
        });
    })
</script>

