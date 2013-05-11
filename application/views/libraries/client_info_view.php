<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/libraries/contacts-client.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this client info?</p>
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-danger" id="delete-state-btn-modal" value="Delete">
        <input type="button" class="btn" data-dismiss="modal" aria-hidden="true" value="Cancel">
    </div>
</div>
<!-- END DELETE MODAL -->

<!-- INFO MODAL -->
<div id="infoModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Client Information</h3>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Company Name</th><td id="s_company_name"></td>
            </tr>
            <tr>    
                <th>Department</th><td id="s_department"></td>
            </tr>
            <tr>
                <th>Address Line 1</th><td id="s_address1"></td>
            </tr>
            <tr>
                <th>Address Line 2</th><td id="s_address2"></td>
            </tr>
            <tr>
                <th>Contact First Name</th><td id="s_c_first_name"></td>
            </tr>
            <tr>
                <th>Contact Full Name</th><td id="s_c_full_name"></td>
            </tr>
            <tr>
                <th>Contact Title</th><td id="s_c_title"></td>
            </tr>
            <tr>
                <th>State</th><td id="s_state"></td>
            </tr>
            <tr>
                <th>Client No</th><td id="s_client_no"></td>
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
        <h2 style="width: 300px;">
            Client Information
            <small>
                (<?php echo $contact_info["contact_no"] ?>)
                <?php echo $contact_info["last_name"].", ".$contact_info["first_name"] ?>
            </small>
        </h2>
        <hr>
    </div>
    <div class="span12">
        <form class="form-inline" method="post" action="<?php echo base_url("libraries/contacts/saveClientInfo") ?>">
            <input type="hidden" id="contact_no" value="<?php echo $contact_no ?>" name="contact_no">
            Client's Name
            <select name="company_no">
                <?php foreach ($clients as $client) : ?>
                    <option value="<?php echo $client["client_no"] ?>">
                        <?php echo $client["company_name"] ?>
                    </option>
                <?php endforeach ; ?>
            </select>
            <button type="submit" class="btn"><i class="icon-plus"></i></button>
        </form>
    </div>
    <div class="span12" style="max-height: 400px; overflow: auto;" id="tbl">        
        <div class="alert <?php echo $status ?>" style="display: <?php echo $display ?>;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $status_msg ?>
        </div>
        <table class="table table-striped table-bordered" id="admin-table" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Department</th>
                    <th>C. First Name</th>
                    <th>C. Full Name</th>
                    <th>C. Title</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($client_infos)) : ?>
                <?php foreach ($client_infos as $client) : ?>
                    <tr>
                        <td><?php echo $client["company_name"] ?></td>
                        <td><?php echo $client["department"] ?></td>
                        <td><?php echo $client["contact_first_name"] ?></td>
                        <td><?php echo $client["contact_full_name"] ?></td>
                        <td><?php echo $client["contact_title"] ?></td>
                        <td><?php echo $client["state_name"] ?></td>
                        <td>
                            <button type="button" id="view-info" show-id="<?php echo $client["client_no"] ?>" class="btn btn-mini">View</button>
                            <button type="button" del-id="<?php echo $client["client_no"] ?>" class="btn btn-mini btn-danger delete-state-btn"><i class="icon-trash icon-white"></i></button>
                        </td>
                    </tr>
                <?php endforeach ; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">No records found</td>
                    </tr>
                <?php endif ; ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $footer ?>
