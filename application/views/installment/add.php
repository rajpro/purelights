<div class="row">
  <div class="col-md-12">
    <?php form_alert_warning() ?>
    <?php form_alert_success() ?>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add a Installment</h4>
          <div class="row">
          <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Cheque</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($sales)): foreach ($sales as $value): ?>
            <tr>
              <td><?=$value['prd_name']?></td>
              <td>
                <?php 
                  $cheques = json_decode($value['cheques']);
                  echo count($cheques);
                ?>
              </td>
              <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#installment<?=$value['id']?>">
                  Add Installment
                </button>

                <!-- Modal -->
                <div class="modal fade" id="installment<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="installment<?=$value['id']?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Installment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php echo form_open(base_url('installment/add_install/'.$value['id'])); ?>
                      <div class="modal-body">
                        <div class="col-md-12">
                          <?php text_input('Cheque No','lg_cheque_no', $cheques[$ledger[$value['id']]]);?>
                        </div>
                        <div class="col-md-12">
                          <?php dropdown_input('Payment Type', 'lg_payment_type', ['0'=>'Choose Payment Type', 'cash'=>'Cash', 'cheque'=>'Cheque'])?>
                        </div>
                        <div class="col-md-12">
                          <?php text_input('Installment Amount','lg_amount', $value['inst_amount']);?>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php endforeach;endif; ?>
          </tbody>
        </table>

            
            
          </div>
          
      </div>
    </div>
  </div>
</div>