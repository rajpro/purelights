<div class="row">
  <div class="col-md-12">
    <?php form_alert_warning() ?>
    <?php form_alert_success() ?>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Marketing Members</h4>
          <?php echo form_open(base_url('marketing/add')); ?>
          <div class="row">
            <!-- Users -->
            <div class="col-md-4">
              <?php text_input('Full Name','mrk_full_name', set_value('mrk_full_name'));?>
            </div>
            <?php if ($this->session->userdata('usertype') == 'admin'): ?>
            <div class="col-md-4">
              <?php text_input('Salary', 'mrk_salary', set_value('mrk_salary'));?>
            </div>
            <?php endif; ?>
            <!-- Address -->
            <div class="col-md-4">
              <?php text_input('Mobile', 'mrk_mobile', set_value('mrk_mobile'));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Email', 'mrk_email', set_value('mrk_email'));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Address', 'mrk_address', set_value('mrk_address'));?>
            </div>
            <div class="col-md-4">
              <?php dropdown_input('State', 'state', $this->config->item('states'), set_value('state'),['id'=>'state'])?>
            </div>
            <div class="col-md-4 district">
              <?php dropdown_input('District', 'district', $this->config->item('state'.set_value('state')), set_value('district'))?>
            </div>
            <!-- Bank -->
            <div class="col-md-4">
              <?php text_input('IFSC', 'ifsc', set_value('ifsc'));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Account Number', 'mrk_account_no', set_value('mrk_account_no'));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Password', 'password', set_value('password'));?>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 float-right">Submit</button>
          <?=form_close();?>
      </div>
    </div>
  </div>
</div>