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
    <h4 class="widget-user-username welcome-hrsale-user"><?php echo $this->lang->line('hr_accounting_dashboard_title');?></h4>
    <h5 class="widget-user-desc welcome-hrsale-user-text"><?php echo $this->lang->line('xin_title_today_is');?> <?php echo date('l, j F Y');?></h5>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-md-3 col-12">
    <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="ion ion-stats-bars"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Xin_model->currency_sign(dashboard_total_sales());?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_total_deposit');?></span> </div>
      <!-- /.info-box-content --> 
    </div>
    <!-- /.info-box --> 
  </div>
  <!-- /.col -->
  <div class="col-xl-3 col-md-3 col-12">
    <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo $this->Xin_model->currency_sign(dashboard_total_expense());?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_total_expenses');?></span> </div>
      <!-- /.info-box-content --> 
    </div>
    <!-- /.info-box --> 
  </div>
  <!-- /.col --> 
  
  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>
  <div class="col-xl-3 col-md-3 col-12">
    <div class="info-box"> <span class="info-box-icon bg-purple"><i class="fa fa-user"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo dashboard_total_payees();?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_total_payees');?></span> </div>
      <!-- /.info-box-content --> 
    </div>
    <!-- /.info-box --> 
  </div>
  <!-- /.col -->
  <div class="col-xl-3 col-md-3 col-12">
    <div class="info-box"> <span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>
      <div class="info-box-content"> <span class="info-box-number"><?php echo dashboard_total_payers();?></span> <span class="info-box-text"><?php echo $this->lang->line('xin_total_payers');?></span> </div>
      <!-- /.info-box-content --> 
    </div>
    <!-- /.info-box --> 
  </div>
  <!-- /.col --> 
</div>
<div class="row">
  <div class="col-md-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_invoices_summary');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/invoices/');?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-list"></i> <?php echo $this->lang->line('xin_invoices_title');?></a> </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo dashboard_unpaid_invoices();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#f96868" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_payroll_unpaid');?></div>
          </div>
          <!-- ./col -->
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo dashboard_paid_invoices();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#46be8a" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_payment_paid');?></div>
          </div>
          <!-- ./col -->
          <div class="col-xs-6 col-md-4 text-center">
            <input type="text" class="knob" value="<?php echo dashboard_cancelled_invoices();?>" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#48b0f7" data-readonly="true">
            <div class="knob-label"><?php echo $this->lang->line('xin_acc_inv_cancelled');?></div>
          </div>
          <!-- ./col --> 
        </div>
        <h4 style="margin-top: 0px; margin-bottom: 5px;font-size: 16px;"><?php echo $this->lang->line('xin_recent_invoices');?></h4>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_invoice_no');?></th>
              <th width="130px;"><?php echo $this->lang->line('xin_project');?></th>
              <th width="100px;"><?php echo $this->lang->line('xin_amount');?></th>
              <th><?php echo $this->lang->line('xin_invoice_date');?></th>
              <th><?php echo $this->lang->line('xin_invoice_due_date');?></th>
              <th width="80px;"><?php echo $this->lang->line('dashboard_xin_status');?></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach(dashboard_last_two_invoices() as $linvoices){?>
            <?php
				// get project
                  $project = $this->Project_model->read_project_information($linvoices->project_id); 
                  if(!is_null($project)){
                    $project_name = $project[0]->title;
                  } else {
                      $project_name = '--';	
                  }
				// get grand_total
			 	$grand_total = $this->Xin_model->currency_sign($linvoices->grand_total);
				$invoice_date = '<i class="fa fa-calendar position-left"></i> '.$this->Xin_model->set_date_format($linvoices->invoice_date);
			  	$invoice_due_date = '<i class="fa fa-calendar position-left"></i> '.$this->Xin_model->set_date_format($linvoices->invoice_due_date);
				if($linvoices->status == 0){
					$status = '<span class="label label-danger">'.$this->lang->line('xin_payroll_unpaid').'</span>';
				} else if($linvoices->status == 1) {
					$status = '<span class="label label-success">'.$this->lang->line('xin_payment_paid').'</span>';
				} else {
					$status = '<span class="label label-info">'.$this->lang->line('xin_acc_inv_cancelled').'</span>';
				}
			?>
            <tr>
              <td><a href="<?php echo site_url('admin/invoices/view/');?><?php echo $linvoices->invoice_id;?>" target="_blank"> <?php echo $linvoices->invoice_number;?> </a></td>
              <td><?php echo $project_name;?></td>
              <td class="amount"><?php echo $grand_total;?></td>
              <td><?php echo $invoice_date;?></td>
              <td><?php echo $invoice_due_date;?></td>
              <td><?php echo $status;?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_acc_accounts');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/accounting/bank_cash/');?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-list"></i> <?php echo $this->lang->line('xin_acc_account_list');?></a> </div>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <th><?php echo $this->lang->line('xin_acc_account');?></th>
              <th class="text-right"><?php echo $this->lang->line('xin_amount');?></th>
            </tr>
           <?php foreach(dashboard_bankcash() as $bank_account){?>
            <?php
				$bank_cash = $this->Finance_model->read_transaction_by_bank_info($bank_account->bankcash_id);
				if(!is_null($bank_cash)){
					$account = '<a data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_acc_ledger_view').'" href="'.site_url('admin/accounting/accounts_ledger/'.$bank_account->bankcash_id.'').'" target="_blank">'.$bank_account->account_name.'</a>';
				} else {
					$account = $bank_account->account_name;
				}
			?>
            <tr>
              <td><?php echo $account;?></td>
              <td class="text-right amount"><?php echo $this->Xin_model->currency_sign($bank_account->account_balance);?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-5">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_latest_income');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/accounting/transactions/');?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-list"></i> <?php echo $this->lang->line('xin_acc_view_transactions');?></a> </div>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <th><?php echo $this->lang->line('xin_e_details_date');?></th>
              <th><?php echo $this->lang->line('xin_description');?></th>
              <th class="text-right"><?php echo $this->lang->line('xin_amount');?></th>
            </tr>
            <?php foreach(dashboard_last_five_income() as $lincome){?>
            <tr>
              <td><?php echo $this->Xin_model->set_date_format($lincome->transaction_date);?></td>
              <td><?php echo $lincome->description;?></td>
              <td class="text-right amount"><?php echo $this->Xin_model->currency_sign($lincome->amount);?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('xin_total_payers');?></h3>
        <div class="box-tools pull-right"> <a href="<?php echo site_url('admin/accounting/transactions/');?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-list"></i> <?php echo $this->lang->line('xin_latest_expense');?></a> </div>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <th><?php echo $this->lang->line('xin_e_details_date');?></th>
              <th><?php echo $this->lang->line('xin_description');?></th>
              <th class="text-right"><?php echo $this->lang->line('xin_amount');?></th>
            </tr>
            <?php foreach(dashboard_last_five_expense() as $lexpense){?>
            <tr>
              <td><?php echo $this->Xin_model->set_date_format($lexpense->transaction_date);?></td>
              <td><?php echo $lexpense->description;?></td>
              <td class="text-right amount"><?php echo $this->Xin_model->currency_sign($lexpense->amount);?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/accounting/accounts_calendar');?>