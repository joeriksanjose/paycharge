
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/state.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this state?</p>
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
        <h3 id="myModalLabel">State Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <div class="alert alert-success" id="edit-success-box" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="frm-edit" style="width: 500px;">
            <input type="hidden" name="id" id="id"/>
            <div class="control-group">
            <label class="control-label">State No.</label>
            <div class="controls controls-row">
              <input type="text" id="e_state_no" name="e_state_no" class="input-medium" disabled>
              <input type="button" id="btn_e_gen" class="btn btn-inverse" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">State Name</label>
            <div class="controls">
              <input type="text" id="e_state_name" name="e_state_name" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Payroll Tax %</label>
            <div class="controls">
              <input type="text" id="e_tax" name="e_tax" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox">
                  <input type="checkbox" name="e_swi_active" id="e_swi_active"/>
                  Active
              </label>
            </div>
          </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" id="edit-btn-modal">Update State</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END SHOW INFO MODAL -->


<div class="topmargin"></div>


<div class="row">
    <div class="span12">
        <h2 class="titles">State</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-state-form" style="display: none;">
        <?php //if ($add_error) : ?>
        <div class="alert alert-error" style="display: none" id="div-error">
            <?php //echo $error_msg ?>
        </div>
        
        <form class="form-horizontal centerDiv" style="width: 500px;" id="frm-new-state"
        action="<?php echo base_url("libraries/state/save_state"); ?>" method="post">
          
          <div class="control-group">
            <label class="control-label" for="full_name">State No.</label>
            <div class="controls controls-row">
              <input type="text" id="state_no" name="state_no" class="input-medium">
              <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="username">State Name</label>
            <div class="controls">
              <input type="text" id="state_name" name="state_name" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Payroll Tax %</label>
            <div class="controls">
              <input type="text" id="tax" name="tax" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox">
                  <input type="checkbox" name="swi_active" id="swi_active"/>
                  Active
              </label>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn">Add State</button>
              <button type="button" class="btn" id="close-add-form">Cancel</button>
            </div>
          </div>
        </form>
        <hr>
    </div>
   
    <div class="span12">
        <button type="button" id="add-new-state" class="btn"><i class="icon-plus"></i> Add new state</button>
        <div class="form-search pull-right">
            <input type="text" class="input-xlarge search-query" placeholder="Search" id="search">
            <button type="button" class="btn" id="btn-search"><i class="icon-search"></i></button>
        </div>
        
        <?php if($ok):?>
        <div class="alert alert-success" style="margin-top: 10px">
            <?php echo $success_msg ?>
        </div>
        <?php endif;?>
        <div class="alert alert-success" style="display:none; margin-top: 10px" id="div-success">
        </div>
    </div>
    <div class="span12" style="400px;overflow-y: auto;margin-top: 10px;" id="tbl">
        <table class="table table-striped table-bordered" id="state-table">
            <thead>
            <tr>
                <th>State No</th>
                <th>State Name</th>
                <th>Active</th>
                <th>Payroll Tax %</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($count) : ?>
                <?php foreach ($data as $value) : 
                      if($value["swi_active"]==1):
                          $swi_active = "YES";
                      else:
                          $swi_active = "NO";
                      endif;  
                ?>
                    <tr>
                        <td><?php echo $value["state_no"] ?></td>
                        <td><?php echo $value["state_name"] ?></td>
                        <td><?php echo $swi_active ?></td>
                        <td><?php echo $value["tax"] ?></td>
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
    $("#state-table").tablesorter();
</script>
