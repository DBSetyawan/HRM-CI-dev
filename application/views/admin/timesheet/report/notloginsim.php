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
            <div class="col-md-4">
            <div class="form-group">
              <label for="first_name">Tanggal Mulai</label>
              <input class="form-control attendance_begda" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="attendance_begda" name="attendance_begda" type="text" value="<?php echo date('Y-m-d');?>">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label for="first_name">Tanggal Sampai</label>
              <input class="form-control attendance_endda" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="attendance_endda" name="attendance_endda" type="text" value="<?php echo date('Y-m-d');?>">
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
    <h3 class="box-title">
        Laporan Absen SIM Payroll
    </h3>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th style="width:120px;">FingerPrintID</th>
            <th style="width:120px;">DateLog</th>
            <th style="width:120px;">TimeLog</th>
            <th style="width:120px;">FunctionKey</th>
            <th style="width:120px;">Edited</th>
            <th style="width:120px;">UserName</th>
            <th style="width:120px;">FlagAbsence</th>
            <th style="width:120px;">DateTime</th>
            <th style="width:120px;">EmployeeStatus</th>
            <th style="width:120px;">FunctionKeyEdited</th>
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
            url : site_url+"timesheetreport/get_notloginsim/?attendance_begda="+$('#attendance_begda').val()+"&attendance_endda="+$('#attendance_endda').val(),
            type : 'GET'
        },
        dom: 'lBfrtip',
        "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
        "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
        },
        aoColumns: [
            {mData : "FingerPrintID"},
            {mData : "DateLog"},
            {mData : "TimeLog"},
            {mData : "FunctionKey"},
            {mData : "Edited"},
            {mData : "UserName"},
            {mData : "FlagAbsence"},
            {mData : "DateTime"},
            {mData : "EmployeeStatus"},
            {mData : "FunctionKeyEdited"},
        ],
        "paging" : false
    });

// Month & Year
$('.attendance_begda').datepicker({
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
$('.attendance_endda').datepicker({
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
    var attendance_begda = $('#attendance_begda').val();
    var attendance_endda = $('#attendance_endda').val();
    var date_format = $('#date_format').val();
    if(attendance_begda == '' || attendance_endda == '' ){
        toastr.error('Please select date.');
    } else {
    $('#att_date').html(date_format);
         var xin_table2 = $('#xin_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : site_url+"timesheetreport/get_notloginsim/?attendance_begda="+$('#attendance_begda').val()+"&attendance_endda="+$('#attendance_endda').val(),
                type : 'GET'
            },
            // "buttons": ['csv', 'excel', 'pdf', 'print'],
            dom: 'lBfrtip',
            "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            },
            aoColumns: [
                {mData : "FingerPrintID"},
                {mData : "DateLog"},
                {mData : "TimeLog"},
                {mData : "FunctionKey"},
                {mData : "Edited"},
                {mData : "UserName"},
                {mData : "FlagAbsence"},
                {mData : "DateTime"},
                {mData : "EmployeeStatus"},
                {mData : "FunctionKeyEdited"},
            ],
            "paging" : false
        });
        xin_table2.api().ajax.reload(function(){ }, true);
    }
});
});
//http://maps.google.com/mapfiles/ms/icons/blue-dot.png
</script>