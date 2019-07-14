<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Product
        <a href="<?=base_url('product/add')?>" class="badge badge-primary float-right">Add Product</a>
        </h4>
        
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Base Price</th>
              <th>Subsidy</th>
              <th>Firm Type</th>
              <th>EMI</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {results}
            <tr>
              <td>{prd_name}</td>
              <td>{prd_price}/-</td>
              <td>{prd_base_price}/-</td>
              <td>{prd_subsidy}%</td>
              <td>{prd_firm_type}</td>
              <td>{prd_emi}</td>
              <td>
                <label class="badge badge-primary">{prd_status}</label>
              </td>
              <td>
                <a href="<?=base_url('product/edit')?>/{prd_id}">
                  <label class="badge badge-primary">
                  <i class="mdi mdi-grease-pencil icon-size"></i>
                  </label>
                </a>
                <a href="<?=base_url('product/delete')?>/{prd_id}">
                  <label class="badge badge-primary">
                  <i class="mdi mdi-delete icon-size"></i>
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