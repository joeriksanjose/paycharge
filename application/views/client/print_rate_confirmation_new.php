<?php echo $header?>
<script src="<?php echo base_url('public/js/reports/rate_confirmation.js')?>"></script>
<div class="topmargin"></div>

<input type="hidden" id="hidTransNo" value="<?php echo $trans_no?>"/>
<input type="hidden" id="hidModernNo" value="<?php echo $modern_no?>"/>
<input type="hidden" id="hid-base-url" value="<?php echo base_url()?>"/>

<div class="form-horizontal">
    <div class="control-group">
        <label class="control-label">Enter Grade #</label>
        <div class="controls">
            <div class="input-append">
                <input type="text" id="txtGrade"/>
                <input type="button" class="btn btn-primary" value="Go" id ="btnGo"/>
            </div>

        </div>
    </div>
</div>

<div id="div"></div>