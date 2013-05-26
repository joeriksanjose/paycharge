<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_home.js") ?>"></script>
<div class="topmargin"></div>
<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
<div class="row">
    <div class="span12">
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab">Clients</a></li>
          <li class=""><a href="#profile" data-toggle="tab">Transactions</a></li>
        </ul>
    </div>
    <div id="myTabContent" class="tab-content span12">
        <div class="tab-pane fade active in" id="home">
            <form class="form-inline">
                <div class="input-append">
                    <input type="text" class="span4" id="search-input" placeholder="Search by company name, contact first name.">
                    <button type="button" class="btn" id="search-btn">Search</button>
                </div>
            </form>
            <div  style="max-height: 494px; overflow: auto;">
                <table class="table table-bordered table-condensed table-striped" style="font-size: 12px;" id="clients-table">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Department</th>
                            <th>C. First Name</th>
                            <th>C. Title</th>
                            <th>State</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($clients_assigned)) : ?>
                            <?php foreach ($clients_assigned as $clients) : ?>
                                <tr>
                                    <td><?php echo $clients["company_name"] ?></td>
                                    <td><?php echo $clients["department"] ?></td>
                                    <td><?php echo $clients["contact_first_name"] ?></td>
                                    <td><?php echo $clients["contact_title"] ?></td>
                                    <td><?php echo $clients["state_name"] ?></td>
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
        <div class="tab-pane fade" id="profile">
    
        </div>
    </div>
</div>
<script>
    $("#clients-table").tablesorter();
</script>
<?php echo $footer ?>