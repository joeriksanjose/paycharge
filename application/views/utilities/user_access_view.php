<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/paycharge.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">
<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" id="delete-btn-modal">Delete User</button>
    </div>
</div>
<!-- END DELETE MODAL -->

<!-- SHOW INFO MODAL -->
<div id="showModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">User Info</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="edit-error-box" style="display:none;"></div>
        <div class="alert alert-success" id="edit-success-box" style="display:none;"></div>
        <form class="form-horizontal centerDiv" id="edit-form" style="width: 500px;">
          <div class="control-group">
            <label class="control-label" for="e_admin">User Type</label>
            <div class="controls">
              <select id="e_admin" name="e_admin" disabled>
                  <option value="1">Administrator</option>
                  <option value="0">Sales</option>
              </select>
            </div>
          </div>
          <div class="control-group" id="e_state_assign" style="display: none;">
            <label class="control-label" for="e_state_no">State Assignment</label>
            <div class="controls">
              <select multiple="multiple" disabled="disabled" id="e_state_no" name="e_state_no[]" style="height: 100px; max-height: 100px;">
                  <?php foreach ($states as $state) : ?>
                      <option value="<?php echo $state["state_no"] ?>"><?php echo $state["state_name"] ?></option>
                  <?php endforeach ; ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_full_name">Full Name</label>
            <div class="controls">
              <input type="text" disabled="" id="e_full_name" name="e_full_name" value="<?php echo $post_values["full_name"] ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_username">User ID</label>
            <div class="controls">
              <input type="text" disabled id="e_username" name="e_username" value="<?php echo $post_values["username"] ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_password">Current Password</label>
            <div class="controls">
              <input type="password" id="e_password" name="e_password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="n_password">New Password</label>
            <div class="controls">
              <input type="password" id="n_password" name="n_password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="e_c_password">Confirm Password</label>
            <div class="controls">
              <input type="password" id="e_c_password" name="e_c_password">
            </div>
          </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn" id="edit-btn-modal">Update User</button>
    </div>
</div>
<!-- END SHOW INFO MODAL -->

<div class="topmargin"></div>

<div class="row">
    <div class="span12">
        <h2 class="titles">User Access</h2>
        <hr>
    </div>
    
    <div class="span12" id="new-user-form" style="display: <?php echo $display_form ?>;">
        <?php if ($add_error) : ?>
        <div class="alert alert-error">
            <?php echo $error_msg ?>
        </div>
        <?php endif ; ?>
        <?php if ($add_success) : ?>
        <div class="alert alert-success">
            <?php echo $success_msg ?>
        </div>
        <?php endif ; ?>
        <form class="form-horizontal centerDiv" style="width: 500px;" action="<?php echo base_url("home/addNewUser"); ?>" method="post">
          <div class="control-group">
            <label class="control-label" for="admin">User Type</label>
            <div class="controls">
              <select id="admin" name="admin">
                  <?php if ($post_values["admin"] == 1) : ?>
                  <option value="1" selected="selected">Administrator</option>
                  <option value="0">Sales</option>
                  <?php else : ?>
                  <option value="1">Administrator</option>
                  <option value="0" selected="selected">Sales</option>
                  <?php endif ; ?>
              </select>
            </div>
          </div>
          <div class="control-group" id="state_assign" style="display: none;">
            <label class="control-label" for="state_no">State Assignment</label>
            <div class="controls">
              <select multiple="multiple" disabled="disabled" id="state_no" name="state_no[]" style="height: 100px; max-height: 100px;">
                  <?php foreach ($states as $state) : ?>
                      <option value="<?php echo $state["state_no"] ?>"><?php echo $state["state_name"] ?></option>
                  <?php endforeach ; ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="full_name">Full Name</label>
            <div class="controls">
              <input type="text" id="full_name" name="full_name" value="<?php echo $post_values["full_name"] ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="username">User ID</label>
            <div class="controls">
              <input type="text" id="username" name="username" value="<?php echo $post_values["username"] ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input type="password" id="password" name="password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="c_password">Confirm Password</label>
            <div class="controls">
              <input type="password" id="c_password" name="c_password">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn">Add User</button>
              <button type="button" class="btn" id="close-add-form">Cancel</button>
            </div>
          </div>
        </form>
        <hr>
    </div>
    
    <div class="span12">
        <button type="button" id="add-new-user" class="btn"><i class="icon-plus"></i> Add new user</button>
        <div class="form-search pull-right">
            <input type="text" class="input-xlarge search-query" id="search">
            <button type="submit" class="btn" id="btn-search"><i class="icon-search"></i></button>
        </div>
     </div>     
        <div class="span12" style="400px;overflow-y: auto;margin-top: 10px;" id="tbl">
        <table class="table table-striped table-bordered" id="user-table">
            <thead>
            <tr>
                <th>User ID</th>
                <th>User Full Name</th>
                <th>User Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($users)) : ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user["username"] ?></td>
                        <td><?php echo $user["full_name"] ?></td>
                        <td><?php echo $user["admin"] ? "Administrator" : "Sales" ?></td>
                        <td>
                            <a href="#" class="btn edit-btn" show-id="<?php echo $user["id"] ?>"><i class="icon-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger delete-btn" del-id="<?php echo $user["id"] ?>">
                                <i class="icon-trash icon-white"></i> Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">No records found</td>
                </tr>
            <?php endif ; ?>
            </tbody>
        </table>
       
    </div>
</div>
<?php echo $footer ?>
