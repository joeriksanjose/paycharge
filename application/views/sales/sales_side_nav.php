<div class="span3">
    <div style="margin-bottom: 10px; margin-top:10px;">
        <div class="input-append">
            <input style="width: 167px;" id="search-input" type="text" placeholder="Search by client name">
            <button class="btn" id="search-btn" type="button"><i class="icon-search"></i></button>
        </div>
        <div id="search-result" style="overflow: auto; max-height: 343px;">
            
        </div>
    </div>
    <h4>States Assigned</h4>
    <?php foreach ($states_assigned as $state) : ?>
    <ul class="nav nav-tabs nav-stacked">
        <li>
            <a href="#" class="state-link" state-name="<?php echo $state["state_name"] ?>"><?php echo $state["state_name"] ?>
                <i class="icon-chevron-right pull-right"></i>
            </a>
        </li>
        <li class="divider"></li>
        <li id="<?php echo $state["state_name"] ?>" style="display:none;">
            <ul class="nav nav-tabs nav-stacked" style="overflow: auto; max-height: 342px;">
            <?php foreach ($clients_assigned as $key => $client) : ?>
                <?php if ($client["state_name"] == $state["state_name"]) : ?>
                    <li>
                        <a href="<?php echo base_url("sales/home/view/".$client["client_no"]) ?>">
                            <?php echo $client["company_name"] ?><br>
                            <?php echo $client["client_no"] ?>
                        </a>
                    </li>
                    <?php unset($clients_assigned[$key]) ?>
                <?php endif ?>
            <?php endforeach ?>
            </ul>
        </li>
    </ul>
    <?php endforeach ?>
</div>