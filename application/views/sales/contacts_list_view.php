<?php echo $header ?>
<div class="topmargin"></div>

<div class="row">
    <div class="span12">
        <h3><?php echo $client_info["company_name"] ?> Contacts List</h3>
        <hr>
    </div>
    <div class="span12">
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