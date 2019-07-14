<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Installment Approval
        </h4>
        <table class="table">
          <thead>
            <tr>
              <th>Sale No.</th>
              <th>Payment Of</th>
              <th>Payment Type</th>
              <th>Referrence</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        <?php if (!empty($results)): foreach($results as $value): ?>
          <tr>
            <td><?=$value['lg_sale_id']?></td>
            <td><?=$value['lg_bill_type']?></td>
            <td><?=$value['lg_payment_type']?></td>
            <td><?=$value['lg_cheque_no']?></td>
            <td><?=$value['lg_amount']?></td>
            <td></td>
          </tr>
        <?php endforeach;endif; ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>