
<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/client-contacts.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
    	<input type="hidden" id="contact_no" name="contact_no"/>
        <p>Are you sure you want to delete this contact?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="delete-state-btn-modal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE MODAL -->

<!-- INFO MODAL -->
<div id="infoModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Contact Information</h3>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-striped">
            <tr>    
                <th>First Name</th><td id="first_name"></td>
            </tr>
            <tr>
                <th>Pref. First Name</th><td id="pref_fname"></td>
            </tr>
            <tr>
                <th>Last Name</th><td id="last_name"></td>
            </tr>
            <tr>
                <th>Middle Name</th><td id="middle_name"></td>
            </tr>
            <tr>
                <th>Birthday</th><td id="birthday"></td>
            </tr>
            <tr>
                <th>Position</th><td id="position"></td>
            </tr>
            <tr>
                <th>Mobile No</th><td id="mobile_no"></td>
            </tr>
            <tr>
                <th>Email</th><td id="email"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!-- END INFO MODAL -->

<div class="topmargin"></div>


<div class="row">
    <div class="span12">
        <h2 class="titles">Contacts Information
        	<small> 
        		(<?php echo $company["client_no"]?>)
                <?php echo $company["company_name"]?>
                </small>
        	</h2>
        <hr>
    </div>
    
    <div class="span12">
        <form class="form-inline" method="post" action="<?php echo base_url("libraries/clients/saveContactInfo") ?>">
            <input type="hidden" id="company_no" value="<?php echo $company["client_no"] ?>" name="company_no"/>
            Contact's Name
            <select name="contact_no">
                <?php foreach ($contacts as $contact) : ?>
                    <option value="<?php echo $contact["contact_no"] ?>">
                        <?php echo $contact["last_name"].", ".$contact["first_name"] ?>
                    </option>
                <?php endforeach ; ?>
            </select>
            <button type="submit" class="btn"><i class="icon-plus"></i></button>
        </form>
    </div>
    
    <div class="span12" style="400px;overflow-y: auto;margin-top: 10px;" id="tbl">
    	<div class="alert <?php echo $status ?>" style="display: none;">
            <?php echo $status_msg ?>
        </div>
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
                            <a href="#" show-id="<?php echo $value["id"] ?>" id="view-info" class="btn btn-mini">VIEW</a>
                            <button type="button" class="btn btn-mini btn-danger delete-state-btn" del-id="<?php echo $value["contact_no"] ?>">
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
