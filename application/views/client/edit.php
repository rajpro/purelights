<?php
    $bank_detail = (array)json_decode($model['clt_bank_detail']);
?>
<div class="row">
  <div class="col-md-12">
    <?php form_alert_warning() ?>
    <?php form_alert_success() ?>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Client</h4>
          <?php echo form_open(base_url('client/edit/'.$model['clt_id'])); ?>
          <div class="row">
            
           
            <div class="col-md-4">
              <?php text_input('Full Name','clt_full_name', set_value('clt_full_name', $model['clt_full_name']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Email', 'clt_email', set_value('clt_email', $model['clt_email']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Mobile', 'clt_mobile', set_value('clt_mobile', $model['clt_mobile']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Aadhar Card', 'clt_aadhar', set_value('clt_aadhar', $model['clt_aadhar']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('PAN No.', 'clt_pan', set_value('clt_pan', $model['clt_pan']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Date of Birth', 'clt_dob', set_value('clt_dob', $model['clt_dob']), ['id'=>'dob']);?>
            </div>
            <div class="col-md-4">
              <?php text_input('Address', 'clt_address', set_value('clt_address', $model['clt_address']));?>
            </div>
            <div class="col-md-4">
              <?php dropdown_input('State', 'clt_state', $this->config->item('states'), set_value('clt_state', $model['clt_state']),['id'=>'state'])?>
            </div>
            <div class="col-md-4 district">
              <?php dropdown_input('District', 'clt_district', $this->config->item('state'.set_value('clt_state', $model['clt_state'])), set_value('clt_district', $model['clt_district']))?>
            </div>
            <div class="col-md-4">
              <?php text_input('Police Station', 'clt_ps', set_value('clt_ps', $model['clt_ps']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('PIN', 'clt_pin', set_value('clt_pin', $model['clt_pin']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('IFSC', 'ifsc', set_value('ifsc', $bank_detail['IFSC']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Account Number', 'account_no', set_value('account_no', $bank_detail['ACCOUNT']));?>
            </div>
            <div class="col-md-4">
              <?php dropdown_input('Status', 'clt_status', ['0'=>'Choose Status', 'active'=>'Active', 'deactive'=>'Deactive'], set_value('clt_status', $model['clt_status']))?>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 float-right">Submit</button>
          <?=form_close();?>
      </div>
    </div>
  </div>
</div>