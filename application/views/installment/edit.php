<div class="row">
  <div class="col-md-12">
    <?php form_alert_warning() ?>
    <?php form_alert_success() ?>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Marketing Members</h4>
          <?php echo form_open(base_url('product/edit/'.$model['id'])); ?>
          <div class="row">
            
            <div class="col-md-4">
              <?php text_input('Product Name','name', set_value('name', $model['name']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Price', 'price', set_value('price', $model['price']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('Base Price', 'base_price', set_value('base_price', $model['base_price']));?>
            </div>
            <div class="col-md-4">
              <?php dropdown_input('Firm Type', 'firm_type', ['0'=>'Choose Firm Type', 'domestic'=>'Domestic', 'agriculture'=>'Agriculture', 'industry'=>'Industry'], set_value('firm_type', $model['firm_type']))?>
            </div>
            <div class="col-md-4">
              <?php text_input('Subsidy', 'subsidy', set_value('subsidy', $model['subsidy']));?>
            </div>
            <div class="col-md-4">
              <?php text_input('EMI', 'emi', set_value('emi', $model['emi']));?>
            </div>

          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 float-right">Submit</button>
          <?=form_close();?>
      </div>
    </div>
  </div>
</div>