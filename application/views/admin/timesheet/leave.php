<?php
/* Leave Application view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $user = $this->Xin_model->read_employee_info($session['user_id']);?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $xuser_info = $this->Xin_model->read_user_info($session['user_id']);?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource();?>
<?php $depart = $this->Xin_model->get_employee_leaves_department_wise($xuser_info[0]->department_id); ?>
<?php $sisa = $this->Timesheet_model->sisa_cuti($xuser_info[0]->employee_id);?>
<?php $jum_book = $this->Timesheet_model->cuti_book($session['user_id']);?>
<?php
  if($user[0]->password=='$2y$12$3xcEaqm5vdQNswKV3fD2l.bL1a3.qQasv.S/uHzcC4L2/XXRq/I3G'){
    redirect('/admin/profile?change_password=true');
  } ?>
<?php
// reports to 
$reports_to = get_reports_team_data($session['user_id']); ?>
<?php if($xuser_info[0]->user_role_id==1){ ?>
<div id="filter_hrsale" class="collapse add-formd <?php echo $get_animate;?>" data-parent="#accordion" style="">
<div class="row">
  <div class="col-md-12">
    <div class="box mb-4">
    <div class="box-header  with-border">
      <h3 class="box-title"><?php echo $this->lang->line('xin_filter');?></h3>
          <div class="box-tools pull-right"> <a class="text-dark collapsed" data-toggle="collapse" href="#filter_hrsale" aria-expanded="false">
            <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-minus"></span> <?php echo $this->lang->line('xin_hide');?></button>
            </a> </div>
        </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <?php $attributes = array('name' => 'ihr_report', 'id' => 'ihr_report', 'class' => 'm-b-1 add form-hrm');?>
            <?php $hidden = array('user_id' => $session['user_id']);?>
            <?php echo form_open('admin/timesheet/leave_list', $attributes, $hidden);?>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="department"><?php echo $this->lang->line('module_company_title');?></label>
                  <select class="form-control" name="company" id="aj_companyf" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>" required>
                    <option value="0"><?php echo $this->lang->line('xin_all_companies');?></option>
                    <?php foreach($get_all_companies as $company) {?>
                    <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group" id="employee_ajaxf">
                  <label for="department"><?php echo $this->lang->line('dashboard_single_employee');?></label>
                  <select id="employee_id" name="employee_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                    <option value="0"><?php echo $this->lang->line('xin_all_employees');?></option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                    <select class="form-control" name="status" id="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
                      <option value="0" ><?php echo $this->lang->line('xin_acc_all');?></option>
                      <option value="1" ><?php echo $this->lang->line('xin_pending');?></option>
                      <option value="2" ><?php echo $this->lang->line('xin_approved');?></option>
                      <option value="3" ><?php echo $this->lang->line('xin_rejected');?></option>
                    </select>
                  </div>
              </div>
              <div class="col-md-1"><label for="xin_get">&nbsp;</label><button name="hrsale_form" type="submit" class="btn btn-primary"><i class="fa fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_get');?></button>
            </div>
            </div>
            
            <?php echo form_close(); ?> </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>
<?php //if(in_array('287',$role_resources_ids)) {?>
<?php $lv = explode(",",$user[0]->leave_categories); ?>
<?php $leave_categories = "'".implode("','", $lv)."'";?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<?php $leaave_cat = get_employee_leave_category($leave_categories,$session['user_id']);?>
<div class="box mb-4 <?php echo $get_animate;?>">
  <div id="accordion">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $this->lang->line('xin_add_leave');?></h3>
      <div class="box-tools pull-right"> <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false">
        <button type="button" class="btn btn-xs btn-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line('xin_add_new');?></button>
        </a> </div>
    </div>
    <div id="add_form" class="collapse add-form <?php echo $get_animate;?>" data-parent="#accordion" style="">
      <div class="box-body">
        <?php $attributes = array('name' => 'add_leave', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/timesheet/add_leave', $attributes, $hidden);?>
        <?php $leaave_cat = get_employee_leave_category($leave_categories,$session['user_id']);?>
        <div class="bg-white">
          <div class="box-block">
            <div class="row">
              <div class="col-md-6">
                <?php $role_resources_ids = $this->Xin_model->user_role_resource();
				if($user_info[0]->user_role_id==1){ ?>
                <div class="row">
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
                      <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
                        <option value=""></option>
                        <?php foreach($get_all_companies as $company) {?>
                        <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="employee_ajax">
                      <label for="employees" class="control-label"><?php echo $this->lang->line('xin_employee');?></label>
                      <select disabled="disabled" class="form-control" name="employee_id" id="employee_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
                </div>
                <?php } else {?>
                <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $session['user_id'];?>" />
                <input type="hidden" name="company_id" id="company_id" value="<?php echo $user[0]->company_id;?>" />
                <?php } ?>
                <div class="form-group" id="get_leave_types">
                  <label for="leave_type" class="control-label"><?php echo $this->lang->line('xin_leave_type');?></label>
                  <select class="form-control" id="leave_type" name="leave_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_leave_type');?>">
                    <option value=""></option>
                    <?php if($user_info[0]->user_role_id!=9999){?>
						<?php foreach($leaave_cat as $type) {?>
                        <?php
                        if($jum_book[0]->jum_book == NULL || $jum_book[0]->jum_book==0){
                          $jum_booking = 0;
                        } else{
                          $jum_booking = $jum_book[0]->jum_book;
                        }
                        $sisanya = ($sisa[0]->sisa - $jum_book[0]->jum_book);
                          if($type->Jenis == 'C') { $tipe_ijin = $type->Nama." ( sisa : ".$sisa[0]->sisa." - dibooking : ".$jum_booking.")";}else{$tipe_ijin = $type->Nama;}?>
                        <option value="<?php echo $type->Jenis;?>"><?php echo $tipe_ijin;?></option>
                        <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                      <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                      <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" value="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="description"><?php echo $this->lang->line('xin_remarks');?></label>
                  <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_remarks');?>" name="remarks" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label>
                  <input type="checkbox" class="minimal" value="1" id="leave_half_day" name="leave_half_day">
				  <?php echo $this->lang->line('xin_hr_leave_half_day');?></span> </label>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <fieldset class="form-group">
                    <label for="attachment"><?php echo $this->lang->line('xin_attachment');?></label>
                    <input type="file" class="form-control-file" id="attachment" name="attachment">
                    <small><?php echo $this->lang->line('xin_leave_file_type');?></small>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="summary"><?php echo $this->lang->line('xin_leave_reason');?></label>
              <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_leave_reason');?>" name="reason" cols="30" rows="3" id="reason"></textarea>
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<?php// } ?>
<?php if($xuser_info[0]->user_role_id==1){ ?>
<div class="box <?php echo $get_animate;?>">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_leave');?></h3>
    <?php if($xuser_info[0]->user_role_id==1){ ?><div class="box-tools pull-right"> <a class="text-dark collapsed" data-toggle="collapse" href="#filter_hrsale" aria-expanded="false">
        <button type="button" class="btn btn-xs btn-primary"> <span class="fa fa-filter"></span> <?php echo $this->lang->line('xin_filter');?></button>
       </a> </div><?php } ?>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('xin_action');?></th>
            <th width="300"><?php echo $this->lang->line('xin_leave_type');?></th>
            <th><?php echo $this->lang->line('left_department');?></th>
            <th><?php echo $this->lang->line('xin_employee');?></th>
            <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_leave_duration');?></th>
            <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_applied_on');?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<?php } else {?>
<div class="row">
  <div class="col-md-12"> 
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1-1" data-toggle="tab"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_my_leave');?></a></li>
        <?php if($reports_to > 0 || $xuser_info[0]->user_role_id== 5 || $xuser_info[0]->user_role_id== 6) { ?>
        <li><a href="#tab_2-2" data-toggle="tab"><?php echo $this->lang->line('xin_my_team');?> <?php echo $this->lang->line('left_leave');?></a></li>
        <?php }
        if($xuser_info[0]->user_role_id== 3){?>
        <li><a href="#tab_3-3" data-toggle="tab">Ijin Belum Approve HRGA</a></li>
        <?php } ?>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1-1">
          <div class="box <?php echo $get_animate;?>">
            <div class="box-header with-border">
                <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_leave');?> </h3>
              </div>
            <div class="box-body">
                <div class="box-datatable table-responsive">
                  <table class="datatables-demo table table-striped table-bordered" id="xin_table">
                    <thead>
                      <tr>
                        <th><?php echo $this->lang->line('xin_action');?></th>
                        <th width="300"><?php echo $this->lang->line('xin_leave_type');?></th>
                        <th><?php echo $this->lang->line('left_department');?></th>
                        <th><?php echo $this->lang->line('xin_employee');?></th>
                        <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_leave_duration');?></th>
                        <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_applied_on');?></th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">
        <div class="box-header with-border">
              <h3 class="box-title"><?php echo $this->lang->line('xin_my_team');?> <?php echo $this->lang->line('left_leave');?></h3>
            </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_my_team_table" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th width="300"><?php echo $this->lang->line('xin_leave_type');?></th>
                    <th><?php echo $this->lang->line('left_department');?></th>
                    <th><?php echo $this->lang->line('xin_employee');?></th>
                    <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_leave_duration');?></th>
                    <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_applied_on');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3-3">
        <div class="box-header with-border">
              <h3 class="box-title">Ijin Belum Approve HRGA</h3>
            </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <?php
              $session = $this->session->userdata('username');
              $user = $session['username'];
              $hasil= preg_replace('/[^A-Za-z0-9]/', '', $user);

              ?>

              <iframe src="../../other_modul/ijin_hrga.php?user=<?php echo $hasil; ?>" width="100%" height="1100" style="border:none;"></iframe>
            </div>
          </div>
          </div>
        <!-- /.tab-pane --> 
      </div>
      <!-- /.tab-content --> 
    </div>
    <!-- nav-tabs-custom --> 
  </div>
  <!-- /.col --> 
</div>
<?php } ?>
