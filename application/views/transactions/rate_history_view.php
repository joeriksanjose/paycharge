<?php echo $header ?>
<div class="topmargin"></div>
<div class="row">
    <div class="span12">
        <h2>Rate Increase History
            <small>( <?php echo $award_info["modern_award_name"] ?> )</small>
        </h2>
        <hr>
    </div>
    <div class="span12">
        <table class="table table-bordered table-striped" id="rate-table" style="font-size: 11px; margin-top: 15px;">
            <thead>
                <tr>
                    <th>Transaction Date</th>
                    <th>Rate 1</th>
                    <th>Rate 2</th>
                    <th>Rate 3</th>
                    <th>Rate 4</th>
                    <th>Rate 5</th>
                    <th>Rate 6</th>
                    <th>Rate 7</th>
                    <th>Rate 8</th>
                    <th>Rate 9</th>
                    <th>Rate 10</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rate_increase_history) : ?>
                    <?php foreach($rate_increase_history as $history) : ?>
                    <tr>
                        <td><?php echo date("d/m/Y", strtotime($history["created_at"])) ?></td>
                        <td><?php echo $history["rate_1"] ?></td>
                        <td><?php echo $history["rate_2"] ?></td>
                        <td><?php echo $history["rate_3"] ?></td>
                        <td><?php echo $history["rate_4"] ?></td>
                        <td><?php echo $history["rate_5"] ?></td>
                        <td><?php echo $history["rate_6"] ?></td>
                        <td><?php echo $history["rate_7"] ?></td>
                        <td><?php echo $history["rate_8"] ?></td>
                        <td><?php echo $history["rate_9"] ?></td>
                        <td><?php echo $history["rate_10"] ?></td>
                    </tr>
                    <?php endforeach ; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11">No upcoming rate increase</td>
                    </tr>
                <?php endif ; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $footer ?>