<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_home2.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/view_client.js") ?>"></script>
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">

<!-- DELETE CONTACT MODAL -->
<div id="deleteContactModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this contact?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="btnDeleteContactModal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE CONTACT MODAL -->

<!-- SHOW ADD EXISTING MODAL -->
<div id="showExistingModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add existing modal</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" id="div-edit-error" style="display:none;"></div>
        <div class="alert alert-success" id="edit-success-box" style="display:none;"></div>
        <form class="form-horizontal centerDiv" method="post" action="<?php echo base_url("sales/home/addExistingContact") ?>">
            <div class="control-group">
                <label class="control-label">Contacts</label>
                <div class="controls controls-row">
                    <input type="hidden" name="company_no" id="hid_company_no" value="<?php echo $client_info["client_no"] ?>">
                    <select name="contact_nos[]" multiple="multiple" style="min-height: 100px; max-height: 300px;">
                        <?php foreach ($existing_contacts as $contact) : ?>
                            <option value="<?php echo $contact["contact_no"] ?>">
                                <?php echo $contact["last_name"].", ".$contact["first_name"] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-info">Add contact</button>
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
    </form>
</div>
<!-- END SHOW ADD EXISTING MODAL -->

<div class="topmargin"></div>
<div class="row">
    
    <!-- Clients list navigation -->
    <?php echo $side_nav ?>
    
    <div class="span9">
        <h4><?php echo $client_info["client_no"]." - ".$client_info["company_name"] ?></h4>
        <hr>
    </div>
    <div class="span9">
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#con" data-toggle="tab">Contacts</a></li>
          <li><a href="#modern" data-toggle="tab">Modern Awards</a></li>
          <li><a href="#client" data-toggle="tab">Client Agreements</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="con">
           <!-- EDIT FORM -->
           <form class="form-horizontal" id="frmEditContact" method="post" style="display: none;"
            action="<?php echo base_url("sales/home/updateContact") ?>">
                <div id="eDivError" style="display: none;"></div>
                <div id="divError" style="display: none;"></div>
                <table class="table">
                    <tr>
                        <td>Contact No.</td>
                        <td>
                            <input type="text" tabindex="1" name="e_contact_no" id="e_contact_no" readonly="true">
                        </td>
                    </tr>
                    <tr>
                        <td>First Name *</td>
                        <td><input type="text" tabindex="2" name="e_first_name" id="e_first_name"></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;">Pref. First Name</td>
                        <td><input type="text" tabindex="3" name="e_pref_first_name" id="e_pref_first_name"></td>
                    </tr>
                    <tr>
                        <td>Last Name *</td>
                        <td><input type="text" tabindex="4" name="e_last_name" id="e_last_name"></td>
                    </tr>
                    <tr>
                        <td>Middle Name</td>
                        <td><input type="text" tabindex="5" name="e_middle_name" id="e_middle_name"></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>
                            <div id="e_datetimepicker" class="input-append">
                                <input type="text" tabindex="6" id="e_date_of_birth" readonly="true" name="e_date_of_birth" class="input-medium">
                                <span class="add-on">
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Position *</td>
                        <td><input type="text" tabindex="7" name="e_position" id="e_position"></td>
                    </tr>
                    <tr>
                        <td>Mobile No. *</td>
                        <td><input type="text" tabindex="8" name="e_contact_phone_no" id="e_contact_phone_no"></td>
                    </tr>
                    <tr>
                        <td>Email *</td>
                        <td><input type="text" tabindex="9" name="e_email" id="e_email"></td>
                    </tr>
                    <tr>
                        <td>Access Levels *</td>
                        <td>
                            <label class="checkbox inline">
                                <input type="checkbox" tabindex="13" name="e_can_view" id="e_can_view" value="1"> Can view
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" tabindex="14" name="e_can_approve" id="e_can_approve" value="1"> Can approve
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" tabindex="15" name="e_can_forecast" id="e_can_forecast" value="1"> Can forecast
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" tabindex="17" class="btn pull-right" id="hideEditForm" style="margin-left: 5px;">Cancel</button>
                            <button type="submit" tabindex="16" class="btn pull-right">Update Contact</button>
                        </td>
                    </tr>
                </table>
            </form>
            <!-- END EDIT FORM -->
              
            <!-- NEW FORM -->
            <form class="form-horizontal" id="frmNewContact" method="post" style="display: none;"
            action="<?php echo base_url("sales/home/addNewContact") ?>">
                <div id="divError" style="display: none;"></div>
                <table class="table">
                    <tr>
                        <td>Contact No.</td>
                        <td>
                            <input type="text" tabindex="1" name="contact_no" id="contact_no">
                            <button type="button" id="generateClientNo" class="btn btn-inverse">Generate No.</button>
                        </td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" tabindex="2" name="first_name" id="first_name"></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;">Pref. First Name</td>
                        <td><input type="text" tabindex="3" name="pref_first_name" id="pref_first_name"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" tabindex="4" name="last_name" id="last_name"></td>
                    </tr>
                    <tr>
                        <td>Middle Name</td>
                        <td><input type="text" tabindex="5" name="middle_name" id="middle_name"></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>
                            <div id="datetimepicker" class="input-append">
                                <input type="text" tabindex="6" id="date_of_birth" readonly="true" name="date_of_birth" class="input-medium">
                                <span class="add-on">
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td><input type="text" tabindex="7" name="position" id="position"></td>
                    </tr>
                    <tr>
                        <td>Mobile No.</td>
                        <td><input type="text" tabindex="8" name="contact_phone_no" id="contact_phone_no"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" tabindex="9" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" tabindex="10" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" tabindex="11" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td>Retype Password</td>
                        <td><input type="password" tabindex="12" id="re_password"></td>
                    </tr>
                    <tr>
                        <td>Access Levels</td>
                        <td>
                            <label class="checkbox inline">
                                <input type="checkbox" tabindex="13" name="can_view" id="can_view" value="1"> Can view
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" tabindex="14" name="can_approve" id="can_approve" value="1"> Can approve
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" tabindex="15" name="can_forecast" id="can_forecast" value="1"> Can forecast
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="client_nos[]" value="<?php echo $client_info["client_no"] ?>">
                            <button type="button" tabindex="17" class="btn pull-right" id="hideContactForm" style="margin-left: 5px;">Cancel</button>
                            <button type="submit" tabindex="16" class="btn pull-right">Save Contact</button>
                        </td>
                    </tr>
                </table>
            </form>
            <button type="button" class="btn" id="showContactForm"><i class="icon-user"></i> Add new contact</button>
            <button type="button" class="btn" id="showExistingForm"><i class="icon-user"></i> Add existing contact</button>
            <div class="input-append pull-right">
                <input id="searchContactInput" type="text" style="width: 320px;" placeholder="Search by name (Surname, Firstname or Lastname)">
                <button class="btn" id="searchContactBtn" type="button"><i class="icon-search"></i></button>
                <div class="loading"></div>
            </div>
            <?php if($ok):?>
            <div class="alert alert-success" style="margin-top: 10px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $success_msg ?>
            </div>
            <?php endif;?>
            <?php if ($error): ?>
            <div class="alert alert-error" id="div-error" style="margin-top: 10px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $error_msg ?>
            </div>
            <?php endif ; ?>
            <table class="table table-bordered table-condensed table-hover" style="font-size: 12px;" id="tblSalesContacts">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (count($contacts)) : ?>
                        <?php foreach ($contacts as $contact) : ?>
                            <tr>
                                <td><?php echo $contact["contact_no"] ?></td>
                                <td><?php echo $contact["last_name"].", ".$contact["first_name"]." ".$contact["middle_name"] ?></td>
                                <td><?php echo $contact["contact_phone_no"] ?></td>
                                <td><?php echo $contact["email"] ?></td>
                                <td>
                                    <button type="button" class="btn btn-mini btnEditContact" id="<?php echo $contact["contact_no"] ?>">
                                        <i class="icon-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-mini btn-danger btnDeleteContact" id="<?php echo $contact["contact_no"] ?>">
                                        <i class="icon-trash icon-white"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr><td colspan="5">Empty record.</td></tr>
                    <?php endif ?>
                </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="modern">
            <h2>Still working here...</h2>
          </div>
          <div class="tab-pane fade" id="client">
            <h2>Still working here...</h2>
          </div>
        </div>
    </div>
    
</div>

<?php echo $footer ?>