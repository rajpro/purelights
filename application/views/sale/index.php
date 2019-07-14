<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Sales
        </h4>
        <table class="table">
          <thead>
            <tr>
              <th>Client Name</th>
              <th>Product Name</th>
              <th>Paid Amount</th>
              <th>Buy Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {results}
            <tr>
              <td>{clt_full_name}</td>
              <td>{prd_name}</td>
              <td>{paid_amount}</td>
              <td>{buy_date}</td>
              <td>
                <a href="<?=base_url('sale/view')?>/{id}">
                  <label style="cursor:pointer;" class="badge badge-primary">
                  <i class="mdi mdi-television-guide icon-size"></i>
                  </label>
                </a>
                <a target="_blank" href="<?=base_url('sale/bill')?>/{id}">
                  <label style="cursor:pointer;" class="badge badge-primary">
                  <i class="mdi mdi-printer icon-size"></i>
                  </label>
                </a>
              </td>
            </tr>
            {/results}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>