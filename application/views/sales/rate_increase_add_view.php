<?php echo $header ?>

<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_rates.js") ?>"></script>

<input type="hidden" id="base_url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this rate?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="delete-btn-modal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE MODAL -->

<div class="topmargin"></div>

<div class="row">
    <div class="span12" id="new-rate" style="display: none;">
        <div class="alert alert-error" id="error_div" style="display: none;"></div>
        <form class="form-horizontal" id="frm-new-rate" action="<?php echo base_url("sales"); ?>" method="post">
            <input type="hidden" name="pd_no" value="<?php echo $charge_rate["trans_no"] ?>">
            <input type="hidden" name="transaction_name" value="<?php echo $charge_rate["transaction_name"] ?>">
            <input type="hidden" id="hid-edit-id" name="hid-edit-id">
            <div class="span5">
                <div class="control-group">
                    <label class="control-label" for="trans_no">Transaction No.</label>
                    <div class="controls controls-row">
                        <input type="text" id="trans_no" name="trans_no" value="<?php echo $charge_rate["trans_no"] ?>" readonly="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="created_at">Effective Date</label>
                    <div class="controls">
                      <div id="datetimepicker" class="input-append">
                        <input type="text" id="created_at" name="created_at" class="input-medium">
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                      </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_1">Pay Rate 1</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_1" name="rate_1">    
                        </div>
                        
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_2">Pay Rate 2</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_2" name="rate_2">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_3">Pay Rate 3</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_3" name="rate_3">
                        </div>                        
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_4">Pay Rate 4</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_4" name="rate_4">
                         </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_5">Pay Rate 5</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_5" name="rate_5">
                        </div>
                    </div>
                </div>
            </div>
            <div class="span5">
                <div class="control-group">
                    <label class="control-label" for="rate_6">Pay Rate 6</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_6" name="rate_6">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_7">Pay Rate 7</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_7" name="rate_7">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_8">Pay Rate 8</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_8" name="rate_8">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_9">Pay Rate 9</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_9" name="rate_9">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="rate_10">Pay Rate 10</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_10" name="rate_10">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn" id="btn-add">Add rate</button>
                        <button type="button" class="btn" id="close-add-form">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="span12">
        <h2>
            Upcoming rates |
            <small>
                <?php
                    echo $charge_rate["transaction_name"];
                ?>
            </small>
        </h2>
        <hr>
    </div>
    <div class="span12" style="margin-bottom: 10px;">
        <button type="button" id="add-new-rate" class="btn"><i class="icon-plus"></i> Add new rate</button>
    </div>
    <div class="span12">
        <table class="table table-bordered table-condensed" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>Effective Date</th>
                    <th>Rate 1</th>
                    <th>Rate 2</th>
                    <th>Rate 3</th>
                    <th>Rate 4</th>
                    <th>Rate 5</th>
                    <th>Rate 6</th>
                    <th>Rate 7</th>
                    <th>Rate 8</th>
                    <th>Rate 9</th>
                    <th>Rate 10</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($upcoming_rate) : ?>
                    <?php foreach ($upcoming_rate as $rate) : ?>
                        <td><?php echo date("d/m/Y", strtotime($rate["created_at"])) ?></td>
                        <td><?php echo $rate["rate_1"] ?></td>
                        <td><?php echo $rate["rate_2"] ?></td>
                        <td><?php echo $rate["rate_3"] ?></td>
                        <td><?php echo $rate["rate_4"] ?></td>
                        <td><?php echo $rate["rate_5"] ?></td>
                        <td><?php echo $rate["rate_6"] ?></td>
                        <td><?php echo $rate["rate_7"] ?></td>
                        <td><?php echo $rate["rate_8"] ?></td>
                        <td><?php echo $rate["rate_9"] ?></td>
                        <td><?php echo $rate["rate_10"] ?></td>
                        <td>
                            <button type="button" class="btn btn-mini btn-edit" edit-id="<?php echo $rate["id"] ?>"><i class="icon-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-mini btn-delete-rate" del-id="<?php echo $rate["id"] ?>"><i class="icon-trash icon-white"></i></button>
                        </td>
                    <?php endforeach ?>
                <?php else : ?>
                    <td colspan="12">No upcoming rates.</td>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $footer ?>