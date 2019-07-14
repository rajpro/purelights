<div class="row">

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Search Client
        </h4>
        <?php if (empty($search)): ?>
        <?php echo form_open(base_url('client')); ?>
        <div class="row">
            <div class="col-md-4">
              <?php text_input('Search Customer For Installment','find_customer', set_value('find_customer'));?>
              <p class="text-small text-muted">Enter Customer Number or Name Ex:(123456 or Rahul Kumar)</p>
            </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary mr-2 float-right">Search</button>
        <?php form_close(); ?>
        <?php else: ?>

        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Clients
        <a href="<?=base_url('client/add')?>" class="badge badge-primary float-right">Add Client</a>
        </h4>
        
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Referred By</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($results)): foreach($results as $value): ?>
            <tr class="<?=($value['clt_status']=='deactive')?'bg-danger':''?>">
              <td><?=$value['clt_full_name']?></td>
              <td><?=$value['clt_referral']?></td>
              <td><?=$value['clt_mobile']?></td>
              <td><?=$value['clt_email']?></td>
              <td>
                <?=$value['clt_address']?>, ps: <?=$value['clt_ps']?><br>
                <?=$this->config->item('state'.$value['clt_state'])[$value['clt_district']]?>,<?=$this->config->item('states')[$value['clt_state']]?><br>
                <?=$value['clt_pin']?>
              </td>
              <td>
                <div class="dropdown">
                  <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="action<?=$value['clt_id']?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                  </a>

                  <div class="dropdown-menu" aria-labelledby="action<?=$value['clt_id']?>">
                    <a class="dropdown-item" href="<?=base_url('sale/add/'.$value['clt_id'])?>">Sale</a>
                    <a class="dropdown-item" href="<?=base_url('installment/add/'.$value['clt_id'])?>">Installment</a>
                    <a class="dropdown-item" href="<?=base_url('client/edit/'.$value['clt_id'])?>">Edit</a>
                    <a class="dropdown-item" href="<?=base_url('client/delete/'.$value['clt_id'])?>">Delete</a>
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