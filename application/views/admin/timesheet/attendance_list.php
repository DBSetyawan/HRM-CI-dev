<?php
/* Attendance view
*/
$system = $this->Xin_model->read_setting_info(1);
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<div class="box mb-4 <?php echo $get_animate;?>">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <?php $attributes = array('name' => 'attendance_daily_report', 'id' => 'attendance_daily_report', 'autocomplete' => 'off', 'class' => 'add form-hrm');?>
        <?php $hidden = array('user_id' => $session['user_id']);?>
        <?php echo form_open('admin/timesheet/attendance_list', $attributes, $hidden);?>
        <?php
			$data = array(
			  'type'        => 'hidden',
			  'name'        => 'date_format',
			  'id'          => 'date_format',
			  'value'       => $this->Xin_model->set_date_format(date('Y-m-d')),
			  'class'       => 'form-control',
			);
			echo form_input($data);
			?>
        <div class="row">
        <?php if($user_info[0]->user_role_id==1){ ?>
            <div class="col-md-4">
                <div class="form-group">
                <label for="name"><?php echo $this->lang->line('left_location');?></label>
                <select name="location_id" id="location_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_location');?>">
                <option value="0"><?php echo $this->lang->line('xin_acc_all');?></option>
                <?php foreach($all_office_shifts as $elocation) {?>
                <option value="<?php echo $elocation->location_id?>"><?php echo $elocation->location_name?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <?php } else {?>
            <input type="hidden" value="0" name="location_id" id="location_id" />
            <?php } ?>
            <div class="col-md-4">
            <div class="form-group">
              <label for="first_name"><?php echo $this->lang->line('xin_e_details_date');?></label>
              <input class="form-control attendance_date" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="attendance_date" name="attendance_date" type="text" value="<?php echo date('Y-m-d');?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> &nbsp;
              <label for="first_name">&nbsp;</label><br />
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_get');?></button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<div class="box <?php echo $get_animate;?>">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $this->lang->line('xin_daily_attendance_report');?></h3>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th colspan="3"><?php echo $this->lang->line('xin_hr_info');?></th>
            <th colspan="9"><?php echo $this->lang->line('xin_attendance_report');?></th>
          </tr>
          <tr>
            <th style="width:120px;">Actions</th>
            <th style="width:120px;"><?php echo $this->lang->line('xin_employee');?></th>
            <th style="width:120px;"><?php echo $this->lang->line('dashboard_employee_id');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('left_company');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('xin_e_details_date');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_xin_status');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_clock_in');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_clock_out');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_late');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_early_leaving');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_overtime');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_total_work');?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_total_rest');?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modalDetailAttendance" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Attendance Detail</h4>
        </div>
        <div class="modal-body">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="time" class="col-md-4"><?php echo $this->lang->line('xin_employee');?></label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" placeholder="<?php echo $this->lang->line('xin_employee');?>" name="shift_name" type="text" value="" id="dt_employee_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4"><?php echo $this->lang->line('dashboard_clock_in');?></label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_in">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">Clockin Latitude</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_in_latitude">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">Clockin Longitude</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_in_longitude">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">Clockin Address</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_in_address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">Clockin MAPS</label>
                </div>
                <div class="row">
                    <div id="mapsin" class="col-md-10" style="height: 200px"></div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">Clockin Image</label>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <img id="photoIN">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="time" class="col-md-4"><?php echo $this->lang->line('xin_e_details_date');?></label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4"><?php echo $this->lang->line('dashboard_clock_out');?></label>
                    <div class="col-md-8">
                        <input class="form-control" readonly="" placeholder="<?php echo $this->lang->line('dashboard_clock_out');?>" name="shift_name" type="text" value="" id="dt_clock_out">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">ClockOut Latitude</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_out_latitude">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">ClockOut Longitude</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_out_longitude">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">ClockOut Address</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="-" readonly=""  name="shift_name" type="text" value="" id="dt_clock_out_address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">ClockOut MAPS</label>
                </div>
                <div class="row">
                    <div id="mapsout" class="col-md-10" style="height: 200px" ></div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-md-4">ClockOut Image</label>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <img id="photoOut">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

    </div>
</div>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $system[0]->google_maps_api_key;?>&callback=initMap">    </script>

<script type="text/javascript">   
var mapsin, infoWindowIn,mapsout,infoWindowOut,markerIn = null,markerOut = null;
function initMap() {
    mapsin = new google.maps.Map(document.getElementById('mapsin'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 11
    });
    mapsout = new google.maps.Map(document.getElementById('mapsout'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 11
    });
    infoWindowIn = new google.maps.InfoWindow;
    infoWindowOut = new google.maps.InfoWindow;
}
function resetInput(){
    $('#dt_employee_name').val('');
    $('#dt_date').val('');
    $('#dt_clock_in').val('');
    $('#dt_clock_in_address').val('');
    $('#dt_clock_in_latitude').val('');
    $('#dt_clock_in_longitude').val('');
    $('#dt_clock_out').val('');
    $('#dt_clock_out_address').val('');
    $('#dt_clock_out_latitude').val('');
    $('#dt_clock_out_longitude').val('');
    $('#photoIN').attr("src","");
    $('#photoOut').attr("src","");
}
function setDataDetailAtt(data){
    resetInput();
    var dt_data = data[13];
    // console.log(data);
    $('#dt_employee_name').val(data[1]);
    $('#dt_date').val(data[4]);
    if(dt_data != null){

        $('#dt_clock_in').val(dt_data.clock_in);
        $('#dt_clock_in_address').val(dt_data.clock_in_address);
        $('#dt_clock_in_latitude').val(dt_data.clock_in_latitude);
        $('#dt_clock_in_longitude').val(dt_data.clock_in_longitude);
        $('#dt_clock_out').val(dt_data.clock_out);
        $('#dt_clock_out_address').val(dt_data.clock_out_address);
        $('#dt_clock_out_latitude').val(dt_data.clock_out_latitude);
        $('#dt_clock_out_longitude').val(dt_data.clock_out_longitude);
        var photoIN = dt_data.image_in;
        var photoOut = dt_data.image_out;
        if(photoIN != null){
            photoIN = photoIN.replace('[removed]','');
        }
        if(photoOut != null){
            photoOut = photoOut.replace('[removed]','');
        }
        $('#photoIN').attr("src","data:image/jpeg||image/gif||image/png;base64,"+photoIN);
        $('#photoOut').attr("src","data:image/jpeg||image/gif||image/png;base64,"+photoOut);
        if(parseFloat(dt_data.clock_in_latitude) != 0.0){
            mapsin.setCenter(new google.maps.LatLng(parseFloat(dt_data.clock_in_latitude), parseFloat(dt_data.clock_in_longitude)));
            markerIn = new google.maps.Marker({
                        map: mapsin,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                        position: {lat: parseFloat(dt_data.clock_in_latitude), lng: parseFloat(dt_data.clock_in_longitude)}
                      });

        }
        if(parseFloat(dt_data.clock_out_latitude) != 0.0){
            mapsout.setCenter(new google.maps.LatLng(parseFloat(dt_data.clock_out_latitude), parseFloat(dt_data.clock_out_longitude)));
            markerOut = new google.maps.Marker({
                        map: mapsout,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                        position: {lat: parseFloat(dt_data.clock_out_latitude), lng: parseFloat(dt_data.clock_out_longitude)}
                      });

        }
    }else{
        console.log(markerIn);
        console.log(markerOut);
        if(markerIn != null){
            markerIn.setMap(null);
        }
        if(markerOut != null){
            markerOut.setMap(null);
        }
    }
}


</script>