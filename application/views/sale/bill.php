<div class="col-md-12">

    <div style="margin-top:25px;display:block;"></div>
    <h1 class="text-center">Purelights</h1>

    <div class="row">
        <div class="col-md-12">
            <div>
                <h2 style="display: inline-block;">Invoice</h2>
                <h3 style="display: inline-block;" class="float-right">Order # 12345</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>Billed To:</strong><br>
                        <?=$model['clt_full_name']?><br>
                        <?=$model['clt_address']?><br>
                        <?=$model['clt_ps']?>, <?=$this->config->item('state'.$model['clt_state'])[$model['clt_district']]?><br>
                        <?=$this->config->item('states')[$model['clt_state']]?>, <?=$model['clt_pin']?>
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                    <strong>Shipped To:</strong><br>
                        <?=$model['clt_full_name']?><br>
                        <?=$model['clt_address']?><br>
                        <?=$model['clt_ps']?>, <?=$this->config->item('state'.$model['clt_state'])[$model['clt_district']]?><br>
                        <?=$this->config->item('states')[$model['clt_state']]?>, <?=$model['clt_pin']?>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Via Cash<br>
                        <?=$model['clt_email']?>
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        <?=$model['buy_date']?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Min Price</strong></td>
                                    <td class="text-center"><strong>Paid Price</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td><?=$model['prd_name']?></td>
                                    <td class="text-center"><?=$model['prd_price']?></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center"><?=$model['prd_base_price']?>/-</td>
                                    <td class="text-center"><?=$model['paid_amount']?>/-</td>
                                    <td class="text-right"><?=$model['paid_amount']?>/-</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right"><?=$model['paid_amount']?>/-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
