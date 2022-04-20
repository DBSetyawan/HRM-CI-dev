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
        <?php echo form_open('admin/timesheet/attendance_log_list', $attributes, $hidden);?>
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
    <h3 class="box-title">Laporan Sudah Login</h3>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th style="width:120px;"><?php echo $this->lang->line('xin_employee');?></th>
            <th style="width:90px;">Photo</th>
            <th style="width:100px;"><?php echo $this->lang->line('xin_e_details_date');?></th>
            <th style="width:100px;">First Log</th>
            <th style="width:100px;">Last Log</th>
            <th style="width:100px;">Lokasi Terakhir</th>
            <th style="width:100px;">PIC</th>
            <th style="width:100px;">Detail</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?php echo base_url();?>skin/hrsale_assets/vendor/datatables/media/css/dataTables.min.css">

<script src="<?php echo base_url();?>skin/hrsale_assets/vendor/datatables-1/datatables.min.js"></script>


<script type="text/javascript">   
$(function(){

    var xin_table = $('#xin_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : site_url+"timesheetreport/get_login_rpt/?attendance_date="+$('#attendance_date').val(),
            type : 'GET'
        },
        dom: 'lBfrtip',
        "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
        "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
        },
        "paging" : false
    });

// Month & Year
$('.attendance_date').datepicker({
    changeMonth: true,
    changeYear: true,
    maxDate: '0',
    dateFormat:'yy-mm-dd',
    altField: "#date_format",
    altFormat: js_date_format,
    yearRange: '1970:' + new Date().getFullYear(),
    beforeShow: function(input) {
        $(input).datepicker("widget").show();
    }
});

/* attendance daily report */
$("#attendance_daily_report").submit(function(e){
    /*Form Submit*/
    e.preventDefault();
    var attendance_date = $('#attendance_date').val();
    var date_format = $('#date_format').val();
    if(attendance_date == ''){
        toastr.error('Please select date.');
    } else {
    $('#att_date').html(date_format);
         var xin_table2 = $('#xin_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : site_url+"timesheetreport/get_login_rpt/?attendance_date="+$('#attendance_date').val(),
                type : 'GET'
            },
            // "buttons": ['csv', 'excel', 'pdf', 'print'],
            dom: 'lBfrtip',
            "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            },
            "paging" : false
        });
        xin_table2.api().ajax.reload(function(){ }, true);
    }
});
});
//http://maps.google.com/mapfiles/ms/icons/blue-dot.png
</script>