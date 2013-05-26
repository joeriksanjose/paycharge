<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_home.js") ?>"></script>
<div class="topmargin"></div>

<!-- INFO MODAL -->
<div id="showClientModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Client Information</h3>
    </div>
    <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <th>Company No</th><td id="s_company_no"></td>
            </tr>
            <tr>
                <th>Company Name</th><td id="s_company_name"></td>
            </tr>
            <tr>
                <th>Address Line 1</th><td id="s_add1"></td>
            </tr>
            <tr>
                <th>Address Line 2</th><td id="s_add2"></td>
            </tr>
            <tr>
                <th>Contact First Name</th><td id="s_c_firstname"></td>
            </tr>
            <tr>
                <th>Contact Full Name</th><td id="s_c_fullname"></td>
            </tr>
            <tr>
                <th>Contact Title</th><td id="s_c_title"></td>
            </tr>
            <tr>
                <th>State Name</th><td id="s_state_name"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!-- END INFO MODAL -->

<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
<div class="row">
    <div class="span12">
        <h2>Assigned Clients</h2>
        <hr>
        <div class="form-inline pull-right" style="margin-bottom: 20px;">
            <div class="input-append">
                <input type="text" class="span4" id="search-input" placeholder="Search by company name, contact first name.">
                <button type="button" class="btn" id="search-btn"><i class="icon-search"></i></button>
            </div>
        </div>
    </div>
    <div class="span12">
        <div  style="max-height: 494px; overflow: auto;" id="client-scroll">
            <table class="table table-bordered table-condensed table-striped" style="font-size: 13px;" id="clients-table">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Department</th>
                        <th>State</th>
                        <th>Action</th>    
                    </tr>
                </thead>
                <tbody id="clients-tbody">
                    <?php if (count($clients_assigned)) : ?>
                        <?php foreach ($clients_assigned as $clients) : ?>
                            <tr>
                                <td><?php echo $clients["company_name"] ?></td>
                                <td><?php echo $clients["department"] ?></td>
                                <td><?php echo $clients["state_name"] ?></td>
                                <td>
                                    <button type="button" class="btn btn-mini show-info" show-id="<?php echo $clients["client_no"] ?>">Info</button>
                                    <a target="_blank" href="<?php echo base_url("libraries/clients/contact_info/".$clients["client_no"]) ?>" type="button" class="btn btn-mini">Contacts </a>
                                </td>
                            </tr>
                        <?php endforeach ; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">Empty Record.</td>
                        </tr>
                    <?php endif ; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $("#clients-table").tablesorter();
</script>
<?php echo $footer ?>