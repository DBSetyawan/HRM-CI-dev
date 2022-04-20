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

$c_hadir = count($hadir);
$c_absen = count($absen);
$c_dalamkota = count($dalamkota);
$c_luarkota = count($luarkota);
$c_dangerarea = count($dangerarea);

?>
<div class="row">
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                Log In Hari Ini                
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6 col-md-6 text-center">
                        <input type="text" class="knob" value="<?php echo $c_hadir;?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-max="<?=$total-2?>" data-fgColor="#46be8a" data-readonly="true">
                        <div class="knob-label">
                            <a href="<?php echo site_url('admin/timesheetreport/haslogin');?>">Log In</a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col --> 
                    <div class="col-xs-6 col-md-6 text-center">
                        <input type="text" class="knob" value="<?php echo (!empty($c_absen)?$c_absen-2 : 0);?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-max="<?=$total-2?>" data-fgColor="#f96868" data-readonly="true">
                        <div class="knob-label">
                            <a href="<?php echo site_url('admin/timesheetreport/notlogin');?>">Tidak Log In</a>
                        </div>
                    </div>
                <!-- ./col -->
                </div>        
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                Berdasarkan Area                
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6 col-md-4 text-center">
                        <input type="text" class="knob" value="<?php echo $c_dalamkota;?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-max="<?=$total-2?>" data-fgColor="#46be8a" data-readonly="true">
                        <div class="knob-label">
                            <a href="<?php echo site_url('admin/timesheetreport/dalamkota/');?>">
                                Dalam Kota
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col --> 
                    <div class="col-xs-6 col-md-4 text-center">
                        <input type="text" class="knob" value="<?php echo $c_dangerarea;?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-max="<?=$total-2?>" data-fgColor="#f39c12" data-readonly="true">
                        <div class="knob-label">
                            <a href="<?php echo site_url('admin/timesheetreport/dangerarea/');?>">
                                Danger Area
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 text-center">
                        <input type="text" class="knob" value="<?php echo $c_luarkota;?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-max="<?=$total-2?>" data-fgColor="#f96868" data-readonly="true">
                        <div class="knob-label">
                            <a href="<?php echo site_url('admin/timesheetreport/luarkota/');?>">
                                Luar Kota
                            </a>
                        </div>
                    </div>
                <!-- ./col -->
                </div>        
            </div>
        </div>
    </div>
</div>

<?php
/*

<div class="row <?php echo $get_animate;?>">
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
                                        <td>
                                        <?php echo $this->lang->line('xin_emp_working');?> (<?php echo $working;?>)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div style="width:4px;border:5px solid #f56954;"></div></td>
                                        <td>
                                        <?php echo $this->lang->line('xin_absent');?> (<?php echo $abs;?>)
                                        </td>
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
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Log In Berdasar Jam</h3>
            </div>
            <div class="box-body">
                <div class="box-block">
                </div>
            </div>
        </div>
    </div>
</div>

*/
?>

<div class="row">
    <div class="col-md-5">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Daftar Tidak Login
                </h3>
                <div class="box-tools pull-right"> 
                    <a href="<?php echo site_url('admin/timesheetreport/notlogin');?>">
                        <button type="button" class="btn btn-xs btn-primary"> 
                            <span class="fa fa-calendar-plus-o"></span> <?php echo $this->lang->line('xin_view_all');?>
                        </button>
                    </a> 
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="table_absen" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Daftar Keluar Kota
                </h3>
                <div class="box-tools pull-right"> 
                    <a href="<?php echo site_url('admin/timesheetreport/luarkota/');?>">
                        <button type="button" class="btn btn-xs btn-primary"> 
                            <span class="fa fa-calendar-plus-o"></span> <?php echo $this->lang->line('xin_view_all');?>
                        </button>
                    </a> 
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="table_luarkota" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //$this->load->view('admin/accounting/accounts_calendar');?>
<script src="<?php echo base_url();?>skin/hrsale_assets/vendor/datatables-1/datatables.min.js"></script>
<script src="<?php echo base_url();?>skin/hrsale_assets/vendor/charts/chart.min.js" type="text/javascript"></script>    
<script src="<?php echo base_url();?>skin/hrsale_assets/vendor/canvasjs/canvasjs.min.js" type="text/javascript"></script>    
<script src="<?php echo base_url();?>skin/hrsale_assets/hrsale_scripts/xchart/attendance_log_dashboard.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/hrsale_assets/theme_assets/bower_components/jquery-knob/js/jquery.knob.js"></script>
    <script type="text/javascript">
    $(function () {
    /* jQueryKnob */
    $(".knob").knob({
      draw: function () {
        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      },
    // max : 243
    });
    /* END JQUERY KNOB */
});
</script>

<script type="text/javascript">

var absenTable = $('#table_absen').DataTable({
    data : <?=json_encode($absen)?>,
    "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],
    columns: [
            { data: "user_id" },
            { data: "first_name" },
        ],
    columnDefs : [
                    {
                        "render": function ( data, type, row ) {
                            return row['first_name']+" "+row['last_name'];
                        },
                        "targets": 1
                    },
                ],
    // searching : false
});

absenTable.on('draw.dt', 
    function () { 
        var info = absenTable.page.info(); 
        absenTable.column(0, { search: 'applied', order: 'applied', page: 'applied' })
                            .nodes()
                            .each(function (cell, i) { 
                                cell.innerHTML = i + 1 + info.start; 
                            }); 
    }
);

var luarkotaTable = $('#table_luarkota').DataTable({
    data : <?=json_encode($luarkota)?>,
    "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],
    columns: [
            { data: "user_id" },
            { data: "first_name" },
            { data: "clock_in_date_log" },
            { data: "clock_in_date_log" },
        ],
    columnDefs : [
                    {
                        "render": function ( data, type, row ) {
                            return row['first_name']+" "+row['last_name'];
                        },
                        "targets": 1
                    },                    
                    {
                        "render": function ( data, type, row ) {
                            return "<a href='<?=base_url()?>admin/timesheetreport/history_pegawai?date="+data+"&employee_id="+row['user_id']+"' target='_blank'>Detail</a>";
                        },
                        "targets": 3
                    },
                ],
    // searching : false
});

luarkotaTable.on('draw.dt', 
    function () { 
        var info = luarkotaTable.page.info(); 
        luarkotaTable.column(0, { search: 'applied', order: 'applied', page: 'applied' })
                            .nodes()
                            .each(function (cell, i) { 
                                cell.innerHTML = i + 1 + info.start; 
                            }); 
    }
);


$(function(){
    absenTable.draw();
    luarkotaTable.draw();
});

</script>