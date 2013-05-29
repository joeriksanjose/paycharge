
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/client.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this client?</p>
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
        <h3 id="myModalLabel">Client Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <div class="alert alert-success" id="edit-success-box" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="frm-edit" style="width: 500px;">
            <input type="hidden" name="id" id="id"/>
             <div class="control-group">
            <label class="control-label" for="e_company_name">Company Name</label>
            <div class="controls controls-row">
              <input type="text" id="e_company_name" name="e_company_name">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_department">Department</label>
            <div class="controls">
              <input type="text" id="e_department" name="e_department">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_state">State</label>
            <div class="controls">
                <select name="e_state" id="e_state">
                    <?php foreach ($states as $state) : ?>
                        <option value="<?php echo $state["state_no"] ?>"><?php echo $state["state_name"] ?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_address_line1">Address Line 1</label>
            <div class="controls">
              <input type="text" id="e_address_line1" name="e_address_line1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_address_line2">Address Line 2</label>
            <div class="controls">
              <input type="text" id="e_address_line2" name="e_address_line2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_contact_first_name">Contact First Name</label>
            <div class="controls">
              <input type="text" id="e_contact_first_name" name="e_contact_first_name">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_contact_full_name">Contact Full Name</label>
            <div class="controls">
              <input type="text" id="e_contact_full_name" name="e_contact_full_name">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_contact_title">Contact Title</label>
            <div class="controls">
              <input type="text" id="e_contact_title" name="e_contact_title">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_client_no">Client No.</label>
            <div class="controls">
              <input type="text" id="e_client_no" name="e_client_no">
            </div>
          </div>
          </form>
    </div>
    <div class="modal-footer">
        <button class="btn" id="edit-btn-modal">Update Client</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END SHOW INFO MODAL -->


<div class="topmargin"></div>


<div class="row">
    <div class="span12">
        <h2 class="titles">Clients/Company</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-state-form" style="display: none;">
        <?php //if ($add_error) : ?>
        <div class="alert alert-error" style="display: none" id="div-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php //echo $error_msg ?>
        </div>
        
        <form class="form-horizontal centerDiv" id="frm-new-state"
        action="<?php echo base_url("libraries/clients/save_clients"); ?>" method="post">
            <input type="hidden" name="id" id="id"/>
            <div class="span5">
                 <div class="control-group">
                <label class="control-label" for="company_name">Company Name</label>
                <div class="controls controls-row">
                  <input type="text" id="company_name" name="company_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="department">Department</label>
                <div class="controls">
                  <input type="text" id="department" name="department">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="department">State</label>
                <div class="controls">
                    <select name="state_no">
                        <?php foreach ($states as $state) : ?>
                            <option value="<?php echo $state["state_no"] ?>"><?php echo $state["state_name"] ?></option>
                        <?php endforeach ; ?>
                    </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="address_line1">Address Line 1</label>
                <div class="controls">
                  <input type="text" id="address_line1" name="address_line1">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="address_line2">Address Line 2</label>
                <div class="controls">
                  <input type="text" id="address_line2" name="address_line2">
                </div>
              </div>
          </div>
          <div class="span5">
              <div class="control-group">
                <label class="control-label" for="contact_first_name">Contact First Name</label>
                <div class="controls">
                  <input type="text" id="contact_first_name" name="contact_first_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="contact_full_name">Contact Full Name</label>
                <div class="controls">
                  <input type="text" id="contact_full_name" name="contact_full_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="contact_title">Contact Title</label>
                <div class="controls">
                  <input type="text" id="contact_title" name="contact_title">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="client_no">Client No.</label>
                <div class="controls">
                  <input type="text" id="client_no" name="client_no">
                  <span class="help-inline">Ex. 300000001</span>
                </div>
              </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Add client</button>
                      <button type="button" class="btn" id="close-add-form">Cancel</button>
                    </div>
                  </div>
              </div>
           </form>
       </div>
    <div class="span12">
        <button type="button" id="add-new-state" class="btn"><i class="icon-plus"></i> Add new client</button>
        <button class="btn" type="button" id="trig-file-browser">Import from CSV file</button>
        <input style="margin-bottom: 0px;" id="file-name" type="text" readonly="true" class="input-medium">
        <button type="button" id="upload" class="btn"><i class="icon-circle-arrow-up"></i></button>
        <form id="frm-importer" style="display: none;" enctype="multipart/form-data" method="post" action="<?php echo base_url("excel_import/importCsv") ?>">
            <input type="file" id="csv_file" name="csv_file">
            <input type="hidden" name="key" value="cl">
        </form>
        <div class="form-search pull-right">
            <input type="text" class="input-xlarge search-query" placeholder="Search" id="search">
            <button type="button" class="btn" id="btn-search"><i class="icon-search"></i></button>
        </div>
        
        <?php if($ok):?>
        <div class="alert alert-success" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $success_msg ?>
        </div>
        <?php endif;?>
        <div class="alert alert-success" style="display:none; margin-top: 10px" id="div-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
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
    <div class="span12" style="max-height: 400px; overflow: auto; margin-top: 10px;" id="tbl">
        <table class="table table-striped table-bordered table-condensed" id="admin-table" style="font-size: 12px;">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Department</th>
                <th>C. First Name</th>
                <th>C. Full Name</th><br />
                <th>C. Title</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($count) : ?>
                <?php foreach ($data as $value) : ?>
                    <tr>
                        <td><?php echo $value["company_name"] ?></td>
                        <td><?php echo $value["department"] ?></td>
                        <td><?php echo $value["contact_first_name"] ?></td>
                        <td><?php echo $value["contact_full_name"] ?></td>
                        <td><?php echo $value["contact_title"] ?></td>
                        <td><?php echo $value["state_name"] ?></td>
                        <td>
                            <button type="button" class="btn btn-mini edit-state-btn" show-id="<?php echo $value["id"] ?>"><i class="icon-edit"></i></button>
                            <button type="button" class="btn btn-mini btn-danger delete-state-btn" del-id="<?php echo $value["id"] ?>">
                                <i class="icon-trash icon-white"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9">No records found</td>
                </tr>
            <?php endif ; ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $footer ?>
<script>
    $("#admin-table").tablesorter();
</script>
