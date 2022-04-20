<?php $system = $this->Xin_model->read_setting_info(1); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><?php echo $this->lang->line('xin_hr_calendar_options');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body collapse in">
        <div class="card-block">
          <div class="row">
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <div id='external-jadwals'>
                    <div class="fc-jadwals-container">
                      <div class='fc-jadwal' data-color='#2D95BF'><?php echo $this->lang->line('xin_hr_jadwals');?></div>
                      <div class='fc-jadwal' data-color='#48CFAE'><?php echo $this->lang->line('xin_hr_meetings');?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="card-block">
                      <form class="add form-hrm" method="post" name="calendar_jadwal_date" action="">
                        <div class="form-body">
                          <div class="form-group">
                            <label for="attendance_date" class=""><?php echo $this->lang->line('xin_hr_jadwal_month_year');?></label>
                            <input class="form-control jadwal_date" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="jadwal_date" name="calendar_jadwal_date" type="text" value="<?php if(isset($_POST['calendar_jadwal_date'])){ echo $_POST['calendar_jadwal_date']; } else { echo date('Y-m'); }?>">
                          </div>
                        </div>
                        <input type="hidden" id="exact_date" value="" />
                        <div class="form-actions right">
                          <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_hr_get_jadwal');?></button>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div id='calendar_hr'></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
