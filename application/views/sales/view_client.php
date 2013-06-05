<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_home2.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/view_client.js") ?>"></script>
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">
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
            <button type="button" class="btn" id="showContactForm"><i class="icon-plus"></i> Add new contact</button>
            <div class="input-append pull-right">
                <input id="search-contact-input" type="text" style="width: 320px;" placeholder="Search by name (Surname, Firstname or Lastname)">
                <button class="btn" id="search-contact-btn" type="button"><i class="icon-search"></i></button>
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
            <table class="table table-bordered table-condensed table-hover" style="font-size: 12px;">
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
                                <td></td>
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