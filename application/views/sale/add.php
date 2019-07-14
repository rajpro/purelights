<div class="row">
  <div class="col-md-12">
    <?php form_alert_warning() ?>
    <?php form_alert_success() ?>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add a Sale</h4>
          <?php echo form_open(base_url('sale/add/'.$product_id)); ?>
          <div class="row">

            <div class="col-md-4">
              <?php dropdown_input('Product Name', 'product_id', $products, set_value('product_id'), ['id'=>'product_id'])?>
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-4 cheque">
            <?php if(!empty(set_value('cheques'))):foreach(set_value('cheques') as $value): ?>
              <input class='form-control' name='cheques[]' value='<?=$value?>' placeholder='Enter Cheque No' />
            <?php endforeach;endif; ?>
            </div>
            
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 float-right">Submit</button>
          <?=form_close();?>
      </div>
    </div>
  </div>
</div>