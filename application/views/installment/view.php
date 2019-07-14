<div class="row">
    <!-- Customer Profile -->
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Customer Profile
        </h4>

        <table class="table">
            <tr>
                <td>Name:</td>
                <td><?=$model['clt_full_name']?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><?=$model['clt_mobile']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$model['clt_email']?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?=$model['clt_address']?>,<?=$model['clt_ps']?><br>
                <?=$this->config->item('state'.$model['clt_state'])[$model['clt_district']]?>,<?=$this->config->item('states')[$model['clt_state']]?>,<?=$model['clt_pin']?>
                </td>
            </tr>
            <tr>
                <td>Aadhar:</td>
                <td><?=$model['clt_aadhar']?></td>
            </tr>
            <tr>
                <td>PAN:</td>
                <td><?=$model['clt_pan']?></td>
            </tr>
        </table>
      </div>
    </div>
  </div>

    <!-- Company Profile -->
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Agent Profile
        </h4>

        <table class="table">
            <tr>
                <td>Name:</td>
                <td><?=$model['mrk_full_name']?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><?=$model['mrk_mobile']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$model['mrk_email']?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?=$model['mrk_address']?></td>
            </tr>
            <tr>
                <td></td>
                <td><?=$model['mrk_full_name']?></td>
            </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Company Profile
        </h4>

        <code><pre><?php print_r($model);?></pre></code>
      </div>
    </div>
  </div>
</div>