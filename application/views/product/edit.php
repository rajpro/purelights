<div class="row">
  <div class="col-md-12">
    <?php form_alert_warning() ?>
    <?php form_alert_success() ?>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Marketing Members</h4>
          <?php echo form_open(base_url('product/edit/'.$model['prd_id'])); ?>
          <div class="row">
            
            <div class="col-md-4">
              <?php text_input('Product Name','prd_name', set_value('prd_name', $model['prd_name']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Price', 'prd_price', set_value('prd_price', $model['prd_price']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Base Price', 'prd_base_price', set_value('prd_base_price', $model['prd_base_price']));?>
            </div>
            <div class="col-md-4">
              <?php dropdown_input('Firm Type', 'prd_firm_type', ['0'=>'Choose Firm Type', 'domestic'=>'Domestic', 'agriculture'=>'Agriculture', 'industry'=>'Industry'], set_value('prd_firm_type', $model['prd_firm_type']))?>
            </div>
            <div class="col-md-4">
              <?php text_input('Subsidy', 'prd_subsidy', set_value('prd_subsidy', $model['prd_subsidy']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('EMI', 'prd_emi', set_value('prd_emi', $model['prd_emi']));?>
            </div>

          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 float-right">Submit</button>
          <?=form_close();?>
      </div>
    </div>
  </div>
</div>