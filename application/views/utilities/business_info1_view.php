<?php echo $header ?>
<div class="topmargin"></div>
<div class="row">
    <div class="span12">
        <h2 class="titles">Business Info</h2>
        <hr>
        <h2><small>Company 1</small></h2>
    </div>
    <div class="span12 centerDiv">
        <?php if ($ok) : ?>
        <div class="alert alert-success">
            <b>Done!</b> Successfully updated.
        </div>
        <?php endif; ?>
        <?php if ($error) : ?>
        <div class="alert alert-error">
            <b>Error!</b> Database error.
        </div>
        <?php endif; ?>
        
        <?php 
        $attributes = array("id"=>"frm-company1", "class"=>"form-horizontal centerDiv");
        echo form_open_multipart("utilities1/business_company/upload1", $attributes)?>
            <div class="control-group">
                <label class="control-label">Owner</label>
                <div class="controls">
                    <input type="text" id="company_owner" name="company_owner" value="<?php echo $data["company_owner"]?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Company Name</label>
                <div class="controls">
                    <input type="text" id="company_name" name="company_name" value="<?php echo $data["company_name"]?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Company Address</label>
                <div class="controls">
                    <textarea id="c_address" name="c_address"><?php echo $data["c_address"]?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Contact Details</label>
                <div class="controls">
                    <textarea id="contact_details" name="contact_details"><?php echo $data["contact_details"]?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">PDF Filename</label>
                <div class="controls">
                    <input type="file" id="pdf-filename" name="pdf"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">
                    <input type="file" id="logo" name="logo"/>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $footer ?>
