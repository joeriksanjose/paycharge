
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/admin.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this admin?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="delete-state-btn-modal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE MODAL -->


<!-- SHOW INFO MODAL -->
<div id="showModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Admin Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <div class="alert alert-success" id="edit-success-box" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="frm-edit" style="width: 500px;">
            <input type="hidden" name="id" id="id"/>
            <div class="control-group">
            <label class="control-label">Admin No.</label>
            <div class="controls controls-row">
              <input type="text" id="e_admin_no" name="e_public_no" class="input-medium" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Admin</label>
            <div class="controls">
              <input type="text" id="e_admin" name="e_public_value" class="input-medium">
            </div>
          </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" id="edit-btn-modal">Update Admin</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END SHOW INFO MODAL -->


<div class="topmargin"></div>


<div class="row">
    <div class="span12">
        <h2 class="titles">Admin</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-state-form" style="display: none;">
        <?php //if ($add_error) : ?>
        <div class="alert alert-error" style="display: none" id="error_div">
            <?php //echo $error_msg ?>
        </div>
        
        <form class="form-horizontal centerDiv" style="width: 500px;" id="frm-new-state"
        action="<?php echo base_url("libraries/admin/save_admin"); ?>" method="post">
          
          <div class="control-group">
            <label class="control-label" for="full_name">Admin No.</label>
            <div class="controls controls-row">
              <input type="text" id="admin_no" name="admin_no" class="input-medium">
              <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="username">Admin</label>
            <div class="controls">
              <input type="text" id="admin" name="admin" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" id="btn-add" class="btn">Add admin</button>
              <button type="button" class="btn" id="close-add-form">Cancel</button>
            </div>
          </div>
        </form>
        <hr>
    </div>
   
    <div class="span12">
        <button type="button" id="add-new-state" class="btn"><i class="icon-plus"></i> Add new admin</button>
        <div class="form-search pull-right">
            <input type="text" class="input-xlarge search-query" placeholder="Search" id="search">
            <button type="button" class="btn" id="btn-search"><i class="icon-search"></i></button>
        </div>
        
        <?php if($ok):?>
        <div class="alert alert-success" id="div-ok" style="margin-top: 10px">
            <?php echo $success_msg ?>
        </div>
        <?php endif;?>
        <div class="alert alert-success" style="display:none; margin-top: 10px" id="div-success">
        </div>
    </div>
    <div class="span12" style="400px;overflow-y: auto;margin-top: 10px;" id="tbl">
        <table class="table table-striped table-bordered" id="admin-table">
            <thead>
            <tr>
                <th>Admin No</th>
                <th>Admin Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($count) : ?>
                <?php foreach ($data as $value) : ?>
                    <tr>
                        <td><?php echo $value["admin_no"] ?></td>
                        <td><?php echo $value["admin"] ?></td>
                        <td>
                            <button type="button" class="btn edit-state-btn" show-id="<?php echo $value["id"] ?>"><i class="icon-edit"></i> Edit</button>
                            <button type="button" class="btn btn-danger delete-state-btn" del-id="<?php echo $value["id"] ?>">
                                <i class="icon-trash icon-white"></i> Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No records found</td>
                </tr>
            <?php endif ; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php echo $footer ?>
<script>
    $("#admin-table").tablesorter();
</script>
