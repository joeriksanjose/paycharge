<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_contact.js") ?>"></script>
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">
<div class="topmargin"></div>

<div class="row">
    <div class="span12">
        <h3><?php echo $client_info["company_name"] ?> Contacts List</h3>
        <hr>
    </div>
    <div class="span12" style="border-bottom: 1px solid #efefef; margin-bottom: 20px; display: none;" id="new-contact-frm">
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
          </div>
          <div class="span5">
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
                <label class="control-label">Access Levels</label>
                <div class="controls">
                  <label class="checkbox">
                    <input type="checkbox" id="can_view" name="can_view" checked="true" class="input-medium" value="1"> Can View
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" id="can_approve" name="can_approve" class="input-medium" value="1"> Can Approve
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" id="can_forecast" name="can_forecast" class="input-medium" value="1"> Can Forecast
                  </label>
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
    <div class="span12">
        <button type="button" class="btn" id="add-contact-btn"><i class="icon-plus"></i> Add new contact</button>
        <div class="form-inline pull-right" style="margin-bottom: 20px;">
            <div class="input-append">
                <input type="text" class="span3" id="search-input" placeholder="Search by name, email.">
                <button type="button" class="btn" id="search-btn"><i class="icon-search"></i></button>
            </div>
        </div>
    </div>
    <div class="span12">
        <table class="table table-bordered table-condensed table-striped" style="font-size: 12px;" id="tbl-c-list">
            <thead>
                <tr>
                    <th>Contact No</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$contacts) : ?>
                    <tr>
                        <td colspan="5">Empty Record.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?php echo $contact["contact_no"] ?></td>
                            <td><?php echo $contact["last_name"].", ".$contact["first_name"]." ".$contact["middle_name"] ?></td>
                            <td><?php echo $contact["contact_phone_no"] ?></td>
                            <td><?php echo $contact["email"] ?></td>
                            <td>
                                
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#tbl-c-list").tablesorter();
</script>
<?php echo $footer ?>