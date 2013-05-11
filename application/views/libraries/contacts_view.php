
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/contacts.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this contact?</p>
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
        <h3 id="myModalLabel">Contact Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <div class="alert alert-success" id="edit-success-box" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="frm-edit" style="width: 500px;">
            <input type="hidden" name="id" id="id"/>
             <div class="control-group">
            <label class="control-label" for="e_contact_no">Contacts No.</label>
            <div class="controls controls-row">
              <input type="text" id="e_contact_no" name="e_contact_no" readonly="true" class="input-medium disabled">
              <input type="button" id="e_btn_gen" class="btn btn-inverse btn-medium disabled" disabled="disabled" value="Generate No"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_first_name">First Name</label>
            <div class="controls">
              <input type="text" id="e_first_name" name="e_first_name" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_pref_first_name">Pref. First Name</label>
            <div class="controls">
              <input type="text" id="e_pref_first_name" name="e_pref_first_name" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_last_name">Last Name</label>
            <div class="controls">
              <input type="text" id="e_last_name" name="e_last_name" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_middle_name">Middle Name</label>
            <div class="controls">
              <input type="text" id="e_middle_name" name="e_middle_name" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Date of birth</label>
            <div class="controls">
              <div id="datetimepicker" class="input-append">
                <input type="text" id="e_date_of_birth" name="e_date_of_birth" class="input-medium">
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_position">Position</label>
            <div class="controls">
              <input type="text" id="e_position" name="e_position" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_contanct_phone_no">Mobile No.</label>
            <div class="controls">
              <input type="text" id="e_contact_phone_no" name="e_contact_phone_no" class="input-medium">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_email">Email</label>
            <div class="controls">
              <input type="text" id="e_email" name="e_email" class="input-medium">
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
        <h2 class="titles">Contacts</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-state-form" style="display: none;">
        <?php //if ($add_error) : ?>
        <div class="alert alert-error" style="display: none" id="div-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php //echo $error_msg ?>
        </div>
        
        <form class="form-horizontal centerDiv" id="frm-new-state"
        action="<?php echo base_url("libraries/contacts/save_contacts"); ?>" method="post">
          <div class="span5">
              <div class="control-group">
                <label class="control-label" for="contact_no">Contacts No.</label>
                <div class="controls controls-row">
                  <input type="text" id="contact_no" name="contact_no" class="input-medium">
                  <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="first_name">First Name</label>
                <div class="controls">
                  <input type="text" id="first_name" name="first_name" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="pref_first_name">Pref. First Name</label>
                <div class="controls">
                  <input type="text" id="pref_first_name" name="pref_first_name" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="last_name">Last Name</label>
                <div class="controls">
                  <input type="text" id="last_name" name="last_name" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="middle_name">Middle Name</label>
                <div class="controls">
                  <input type="text" id="middle_name" name="middle_name" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Date of birth</label>
                <div class="controls">
                  <div id="e_datetimepicker" class="input-append">
                    <input type="text" id="date_of_birth" name="date_of_birth" class="input-medium">
                    <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                      </i>
                    </span>
                  </div>
                </div>
              </div>
          </div>
          <div class="span5">
              
              <div class="control-group">
                <label class="control-label" for="position">Position</label>
                <div class="controls">
                  <input type="text" id="position" name="position" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="contanct_phone_no">Mobile No.</label>
                <div class="controls">
                  <input type="text" id="contact_phone_no" name="contact_phone_no" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                  <input type="text" id="email" name="email" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                  <input type="text" id="username" name="username" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                  <input type="password" id="password" name="password" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="re_password">Retype Password</label>
                <div class="controls">
                  <input type="password" id="re_password" name="re_password" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn">Add contact</button>
                  <button type="button" class="btn" id="close-add-form">Cancel</button>
                </div>
              </div>
          </div>
        </form>
        
    </div>
   <hr>
    <div class="span12">
        <button type="button" id="add-new-state" class="btn"><i class="icon-plus"></i> Add new contact</button>
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
    </div>
    <div class="span12" style="400px;overflow-y: auto;margin-top: 10px;" id="tbl">
        <table class="table table-striped table-bordered" id="admin-table" style="font-size: 12px;">
            <thead>
            <tr>
                <th>Contact No</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Mobile No</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($count) : ?>
                <?php foreach ($data as $value) : ?>
                    <tr>
                        <td><?php echo $value["contact_no"] ?></td>
                        <td><?php echo $value["last_name"] ?></td>
                        <td><?php echo $value["first_name"] ?></td>
                        <td><?php echo $value["middle_name"] ?></td>
                        <td><?php echo $value["contact_phone_no"] ?></td>
                        <td>
                            <a target="_blank" href="<?php echo base_url("libraries/contacts/client_info/".$value["contact_no"]) ?>" class="btn btn-mini">CLIENT</a>
                            <button type="button" class="btn btn-mini edit-state-btn" show-id="<?php echo $value["id"] ?>"><i class="icon-edit"></i></button>
                            <button type="button" class="btn btn-mini btn-danger delete-state-btn" del-id="<?php echo $value["id"] ?>">
                                <i class="icon-trash icon-white"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">No records found</td>
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
