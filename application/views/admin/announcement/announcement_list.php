<?php
/* Announcement view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<?php if(in_array('254',$role_resources_ids)) {?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<div class="box mb-4 <?php echo $get_animate;?>">
  <div id="accordion">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_announcement');?></h3>
      <div class="box-tools pull-right"> <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false">
        <button type="button" class="btn btn-xs btn-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line('xin_add_new');?></button>
        </a> </div>
    </div>
    <div id="add_form" class="collapse add-form <?php echo $get_animate;?>" data-parent="#accordion" style="">
      <div class="box-body">
        <?php $attributes = array('name' => 'add_announcement', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('user_id' => $session['user_id']);?>
        <?php echo form_open('admin/announcement/add_announcement', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title"><?php echo $this->lang->line('xin_title');?></label>
                <input class="form-control" placeholder="<?php echo $this->lang->line('xin_title');?>" name="title" type="text" value="">
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
              <div class="row">
                <div class="col-md-6">
                  <?php if($user_info[0]->user_role_id==1){ ?>
                  <div class="form-group">
                    <label for="designation" class="control-label"><?php echo $this->lang->line('module_company_title');?></label>
                    <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                      <option value=""></option>
                      <?php foreach($get_all_companies as $company) {?>
                      <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php } else {?>
                  <?php $ecompany_id = $user_info[0]->company_id;?>
                  <div class="form-group">
                    <label for="designation" class="control-label"><?php echo $this->lang->line('module_company_title');?></label>
                    <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                      <option value=""></option>
                      <?php foreach($get_all_companies as $company) {?>
						  <?php if($ecompany_id == $company->company_id):?>
                          <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                          <?php endif;?>
                      <?php } ?>
                    </select>
                  </div>
                  <?php }?>
                </div>
                <div class="col-md-6" id="location_ajax">
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('left_location');?></label>
                  <select disabled="disabled" name="location_id" id="location_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_location');?>">
                    <option value=""></option>
                  </select>
                </div>
                </div>
                <!--<div class="col-md-6">
                  <div class="form-group" id="department_ajax">
                    <label for="department" class="control-label"><?php echo $this->lang->line('xin_department');?></label>
                    <select class="form-control" name="department_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_department');?>">
                      <option value=""></option>
                    </select>
                  </div>
                </div>-->
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="8" rows="5" id="description"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">Foto : <a href="javascript:void(0)" class="btn btn-success btn-block text-uppercase" id="clock_btn_in" >Ambil Gambar</a></label>
                    <div id="results_image" class="text-center"></div>
                    <input type="hidden" name="photo_announcement" id="photo_announcement">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-3">
              <div class="form-group" id="department_ajax">
                <label for="department" class="control-label"><?php echo $this->lang->line('xin_department');?></label>
                <select class="form-control" name="department_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_department');?>">
                  <option value=""></option>
                </select>
              </div>
            </div>
          <div class="col-md-3">
          <div class="form-group">
            <label for="summary"><?php echo $this->lang->line('xin_summary');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('xin_summary');?>" name="summary" id="summary">
          </div>
          </div></div>
          <?php $count_module_attributes = $this->Custom_fields_model->count_announcements_module_attributes();?>
            <?php if($count_module_attributes > 0):?>
            <div class="row">
              <?php $module_attributes = $this->Custom_fields_model->announcements_hrsale_module_attributes();?>
              <?php foreach($module_attributes as $mattribute):?>
              <?php if($mattribute->attribute_type == 'date'){?>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
                  <input class="form-control date" placeholder="<?php echo $mattribute->attribute_label;?>" name="<?php echo $mattribute->attribute;?>" type="text">
                </div>
              </div>
              <?php } else if($mattribute->attribute_type == 'select'){?>
              <div class="col-md-4">
                <?php $iselc_val = $this->Custom_fields_model->get_attribute_selection_values($mattribute->custom_field_id);?>
                <div class="form-group">
                  <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
                  <select class="form-control" name="<?php echo $mattribute->attribute;?>" data-plugin="select_hrm" data-placeholder="<?php echo $mattribute->attribute_label;?>">
                    <?php foreach($iselc_val as $selc_val) {?>
                    <option value="<?php echo $selc_val->attributes_select_value_id?>"><?php echo $selc_val->select_label?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <?php } else if($mattribute->attribute_type == 'multiselect'){?>
              <div class="col-md-4">
                <?php $imulti_selc_val = $this->Custom_fields_model->get_attribute_selection_values($mattribute->custom_field_id);?>
                <div class="form-group">
                  <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
                  <select multiple="multiple" class="form-control" name="<?php echo $mattribute->attribute;?>[]" data-plugin="select_hrm" data-placeholder="<?php echo $mattribute->attribute_label;?>">
                    <?php foreach($imulti_selc_val as $multi_selc_val) {?>
                    <option value="<?php echo $multi_selc_val->attributes_select_value_id?>"><?php echo $multi_selc_val->select_label?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <?php } else if($mattribute->attribute_type == 'textarea'){?>
              <div class="col-md-8">
                <div class="form-group">
                  <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
                  <input class="form-control" placeholder="<?php echo $mattribute->attribute_label;?>" name="<?php echo $mattribute->attribute;?>" type="text">
                </div>
              </div>
              <?php } else if($mattribute->attribute_type == 'fileupload'){?>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
                  <input class="form-control-file" name="<?php echo $mattribute->attribute;?>" type="file">
                </div>
              </div>
              <?php } else { ?>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="<?php echo $mattribute->attribute;?>"><?php echo $mattribute->attribute_label;?></label>
                  <input class="form-control" placeholder="<?php echo $mattribute->attribute_label;?>" name="<?php echo $mattribute->attribute;?>" type="text">
                </div>
              </div>
              <?php }	?>
              <?php endforeach;?>
            </div>
            <?php endif;?>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
          </div>
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="box <?php echo $get_animate;?>">
  <div class="box-header with-border">
    <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_announcements');?> </h3>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('xin_action');?></th>
            <th width="420"><?php echo $this->lang->line('xin_title');?></th>
            <th><?php echo $this->lang->line('left_company');?></th>
            <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_start_date');?></th>
            <th><i class="fa fa-calendar"></i> <?php echo $this->lang->line('xin_end_date');?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
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

<script type="text/javascript">var announcement_url = '<?php echo site_url("announcement") ?>';</script>
<script type="text/javascript" src="<?php echo base_url();?>skin/hrsale_assets/vendor/webcamjs/webcam.min.js"></script>

<script language="JavaScript">
     Webcam.set({
      width: 500,
      height: 400,
      image_format: 'jpeg',
      jpeg_quality: 90
     });

     // preload shutter audio clip
     var shutter = new Audio();
     shutter.autoplay = true;
     shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

    function take_snapshot() {
        shutter.play();
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('results_image').innerHTML = 
            '<img src="'+data_uri+'"/>';
            console.log(data_uri);
            $('#photo_announcement').val(data_uri);
            // $('#image_in').val(data_uri);
            $('#myModalCamera').modal('hide');
            // $('#btn_submit_div').show();
            Webcam.reset();
        });
    }

    function opencamera(){
        Webcam.attach( '#my_camera' );
    }

    $(function(){
        $('#clock_btn_in').click(function(){
            $('#myModalCamera').modal('show');
            opencamera();
        });
        $('#clock_btn_out').click(function(){
            $('#myModalCamera').modal('show');
            opencamera();
        });
        // $('#submit_btn_attendance').click(function(){
        //     var form_submit = $('#set_clocking').serialize();
        //     $('#set_clocking').submit();
        // });
        $('#close_camera').click(function(){
            $('#myModalCamera').modal('hide');
            Webcam.reset();
        });
    })
</script>
