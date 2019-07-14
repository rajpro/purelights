<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Marketing Members
        <a href="<?=base_url('marketing/add')?>" class="badge badge-primary float-right">Add Marketing Member</a>
        </h4>
        
        <table class="table">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Referral No.</th>
              <th>Referred By</th>
              <th>Sallary</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {results}
            <tr>
              <td>{mrk_full_name}</td>
              <td>{mrk_referral}</td>
              <td>{mrk_referred_by}</td>
              <td>{mrk_salary}/-</td>
              <td><label class="badge badge-danger">{mrk_status}</label></td>
              <td>
                <a href="<?=base_url('marketing/edit')?>/{mrk_id}">
                  <label class="badge badge-primary">
                  <i class="mdi mdi-grease-pencil icon-size"></i>
                  </label>
                </a>
                <a href="<?=base_url('marketing/delete')?>/{mrk_id}">
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