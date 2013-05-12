<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/transaction/upcoming_rate.js") ?>"></script>
<div class="topmargin"></div>
<div class="row">
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <div class="span12">
        <h2>
            Upcoming Rate Increase
            <small>( <?php echo $award_info["modern_award_name"] ?> )</small>
        </h2>
        <hr>
    </div>
    <div class="span12" id="new-rate" style="display: none;">
        <div class="alert alert-error" id="error_div" style="display: none;">
            
        </div>
        <form class="form-horizontal" id="frm-new-rate" action="<?php echo base_url("libraries/admin/save_admin"); ?>" method="post">
            <div class="span5">
                <div class="control-group">
                    <label class="control-label" for="trans_no">Transaction No.</label>
                    <div class="controls controls-row">
                        <input type="text" id="trans_no" name="trans_no">
                        <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
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
                    <label class="control-label" for="rate_3">Pay Rate 8</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">
                                $
                            </span>
                            <input type="text" id="rate_3" name="rate_8">
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
    <div class="span12" style="margin-top: 10px;">
        <button type="button" id="add-new-rate" class="btn"><i class="icon-plus"></i> Add new rate</button>
        <div class="form-search pull-right">
            <input type="text" class="input-xlarge search-query" id="search-award">
            <button type="button" class="btn" id="btn-search-award"><i class="icon-search"></i></button>
        </div>
    </div>
    <div class="span12" style="max-height: 400px; overflow: auto;">
        <table class="table table-bordered table-striped" id="rate-table" style="font-size: 11px; margin-top: 15px;">
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
                <?php if ($upcoming_rate_increase) : ?>
                    <?php foreach($upcoming_rate_increase as $increase) : ?>
                    <tr>
                        <td><?php echo $increase["created_at"] ?></td>
                    </tr>
                    <?php endforeach ; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12">No upcoming rate increase</td>
                    </tr>
                <?php endif ; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $footer ?>