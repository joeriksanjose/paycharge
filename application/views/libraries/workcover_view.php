
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/workcover.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this workcover?</p>
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
        <h3 id="myModalLabel">Workcover Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="frm-edit" style="width: 500px;">
            <input type="hidden" name="id" id="id"/>
         <div class="control-group">
            <label class="control-label">Workcover No.</label>
            <div class="controls controls-row">
              <input type="text" id="e_work_cover_no" name="e_work_cover_no" class="input-medium" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Workcover</label>
            <div class="controls">
              <input type="text" id="e_work_cover" name="e_work_cover" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Workcover Code</label>
            <div class="controls">
              <input type="text" id="e_work_cover_code" name="e_work_cover_code" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">State</label>
            <div class="controls">
              <select id="e_state_no" name="e_state_no" class="input-medium">
                  
              </select>
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
    <div class="span12">
        <h2 class="titles">Workcover</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-form" style="display: none;">
        <div class="alert alert-error" style="display: none" id="error_div"></div>
        
        <form class="form-horizontal centerDiv" style="width: 500px;" id="frm-new"
        action="<?php echo base_url("libraries/workcover/save"); ?>" method="post">
          
          <div class="control-group">
            <label class="control-label">Workcover No.</label>
            <div class="controls controls-row">
              <input type="text" id="work_cover_no" name="work_cover_no" class="input-medium">
              <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="username">Workcover</label>
            <div class="controls">
              <input type="text" id="work_cover" name="work_cover" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Workcover Code</label>
            <div class="controls">
              <input type="text" id="work_cover_code" name="work_cover_code" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">State</label>
            <div class="controls">
              <select id="state_no" name="state_no" class="input-medium">
                  <?php foreach ($data_state as $key => $value) : ?>
                    <option value="<?php echo $value["state_no"]?>"><?php echo $value["state_name"]?></option>    
                  <?php endforeach; ?>
                  
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" id="btn-add" class="btn">Add</button>
              <button type="button" class="btn" id="close-add-form">Cancel</button>
            </div>
          </div>
        </form>
        <hr>
    </div>
</div>
    <div class="span12">
        <button type="button" id="add-new" class="btn"><i class="icon-plus"></i> Add new work cover</button>
        <button class="btn" type="button" id="trig-file-browser">Import from CSV file</button>
        <input style="margin-bottom: 0px;" id="file-name" type="text" readonly="true" class="input-medium">
        <button type="button" id="upload" class="btn"><i class="icon-circle-arrow-up"></i></button>
        <form id="frm-importer" style="display: none;" enctype="multipart/form-data" method="post" action="<?php echo base_url("excel_import/importCsv") ?>">
            <input type="file" id="csv_file" name="csv_file">
            <input type="hidden" name="key" value="w">
        </form>
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
        
        <!-- for importing from CSV -->
        <?php if ($import_status === 0) : ?>
        <div class="alert alert-error" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $stat_msg ?>
        </div>
        <?php elseif ($import_status === 1) : ?>
        <div class="alert alert-success" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $stat_msg ?>
        </div>
        <?php endif ; ?>
    </div>
    <div class="span12" style="400px;overflow-y: auto;margin-top: 10px;" id="tbl">
        <table class="table table-striped table-bordered" id="workcover-table">
            <thead>
            <tr>
                <th>Workcover No</th>
                <th>Workcover</th>
                <th>Workcover Code</th>
                <th>State Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($count) : ?>
                <?php foreach ($data as $value) : 
                ?>
                    <tr>
                        <td><?php echo $value["work_cover_no"] ?></td>
                        <td><?php echo $value["work_cover"] ?></td>
                        <td><?php echo $value["work_cover_code"] ?></td>
                        <td><?php echo $value["state_name"] ?></td>
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
    $("#workcover-table").tablesorter();
</script>