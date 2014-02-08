<?php echo $header?>
<script src="<?php echo base_url('public/js/reports/rate_confirmation.js')?>"></script>
<div class="topmargin"></div>

<!-- <input type="hidden" id="hidTransNo" value="<?php echo $trans_no?>"/>
<input type="hidden" id="hidModernNo" value="<?php echo $modern_no?>"/> -->
<input type="hidden" id="hid-base-url" value="<?php echo base_url()?>"/>




<div class="form-horizontal" style="position: fixed;background-color: #FFFFFF;width: 100%;padding-top: 30px;margin-top: -10px">
    <?php if ($client["can_forecast"]) : ?>
    <div class="control-group">
        <label class="control-label">Rates</label>
        <div class="controls">
            <select class="span7" id="cmbRate">
                <option></option>
                <?php foreach ($get_award as $key => $value):?>
                    <option trans_name="<?php echo $value["transaction_name"]?>" value="<?php echo $value["trans_no"]?>"><?php echo $value["trans_no"]." - ".$value["transaction_name"]?></option>
                <?php endforeach;?>
            </select>

        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Enter Grade #</label>
        <div class="controls">
            <div class="input-append">
                <input type="text" id="txtGrade"/>
                <input type="button" class="btn btn-primary" value="Add" id ="btnGo"/>
                <input type="button" class="btn btn-primary" value="Save" id ="btnSave" disabled="disabled"/>
                <input type="button" class="btn btn-danger" value="Reset" id ="btnReset"/>
            </div>

        </div>
    </div>
    <?php else : ?>
    
    <div class="control-group">
        <label class="control-label">Rates</label>
        <div class="controls">
            <select class="span7" id="cmbRate" disabled="disabled">
                <option></option>
                <?php foreach ($get_award as $key => $value):?>
                    <option trans_name="<?php echo $value["transaction_name"]?>" value="<?php echo $value["trans_no"]?>"><?php echo $value["trans_no"]." - ".$value["transaction_name"]?></option>
                <?php endforeach;?>
            </select>

        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Enter Grade #</label>
        <div class="controls">
            <div class="input-append">
                <input type="text" id="txtGrade" disabled="disabled"/>
                <input type="button" class="btn btn-primary" value="Add" id ="btnGo" disabled="disabled"/>
                <input type="button" class="btn btn-primary" value="Save" id ="btnSave" disabled="disabled"/>
                <input type="button" class="btn btn-danger" value="Reset" id ="btnReset" disabled="disabled"/>
            </div>

        </div>
    </div>
        
    <?php endif ?>
</div>

<div class="alert alert-error" id="div-error"style="display:none;margin-top: 150px">
     
</div>

<div class="alert alert-success" id="div-success"style="display:none;margin-top: 150px">
     Successfully saved forecast.
</div>

<div id="div"  style="margin-top: 150px"></div>
<div id="div_all"></div>