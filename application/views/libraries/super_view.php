
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/super.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this super?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="delete-btn-modal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE MODAL -->


<!-- SHOW INFO MODAL -->
<div id="showModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Super Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="frm-edit" style="width: 500px;">
            <input type="hidden" name="id" id="id"/>
            <div class="control-group">
            <label class="control-label">Super No.</label>
            <div class="controls controls-row">
              <input type="text" id="e_super_no" name="e_super_no" class="input-medium" disabled>
              <input type="button" id="btn_e_gen" class="btn btn-inverse" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Super value</label>
            <div class="controls">
              <input type="text" id="e_super" name="e_super" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Effective Date</label>
            <div class="controls">
              <div id="e_datetimepicker" class="input-append">
                <input type="text" id="e_effective_date" name="e_effective_date" class="input-medium">
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
            </div>
          </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" id="edit-btn-modal">Update</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END SHOW INFO MODAL -->


<div class="topmargin"></div>


<div class="row">
    <div class="span12">Super</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-form" style="display: none;">
        <div class="alert alert-error" style="display: none" id="div-error"></div>
        
        <form class="form-horizontal centerDiv" style="width: 500px;" id="frm-new"
        action="<?php echo base_url("libraries/super/save"); ?>" method="post">
          
          <div class="control-group">
            <label class="control-label">Super No.</label>
            <div class="controls controls-row">
              <input type="text" id="super_no" name="super_no" class="input-medium">
              <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="username">Super Value</label>
            <div class="controls">
              <input type="text" id="super" name="super" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Effective Date</label>
            <div class="controls">
              <div id="datetimepicker" class="input-append">
                <input type="text" id="effective_date" name="effective_date" class="input-medium">
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
              
            </div>
          </div>
          
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn">Add</button>
              <button type="button" class="btn" id="close-add-form">Cancel</button>
            </div>
          </div>
        </form>
        <hr>
    </div>
   
    <div class="span12">
        <button type="button" id="add-new" class="btn"><i class="icon-plus"></i> Add new super</button>
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
        <table class="table table-striped table-bordered" id="super-table">
            <thead>
            <tr>
                <th>Super No</th>
                <th>Super value</th>
                <th>Effective Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($count) : ?>
                <?php foreach ($data as $value) : 
                ?>
                    <tr>
                        <td><?php echo $value["super_no"] ?></td>
                        <td><?php echo $value["super"] ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value["effective_date"])) ?></td>
                        <td>
                            <button type="button" class="btn edit-btn" show-id="<?php echo $value["id"] ?>"><i class="icon-edit"></i> Edit</button>
                            <button type="button" class="btn btn-danger delete-btn" del-id="<?php echo $value["id"] ?>">
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
    $("#super-table").tablesorter();
</script>