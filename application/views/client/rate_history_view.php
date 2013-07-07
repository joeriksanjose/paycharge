<?php echo $header ?>

<div class="topmargin"></div>

<div class="row">
    <div class="span12">
        <h2>
            Rates history |
            <small>
                <?php
                    echo $charge_rate["transaction_name"];
                ?>
            </small>
        </h2>
        <hr>
    </div>
    <div class="span12">
        <table class="table table-bordered table-condensed" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>Effective Date</th>
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
                <?php if ($rates_history) : ?>
                    <?php foreach ($rates_history as $rate) : ?>
                        <td><?php echo date("d/m/Y", strtotime($rate["created_at"])) ?></td>
                        <td><?php echo $rate["rate_1"] ?></td>
                        <td><?php echo $rate["rate_2"] ?></td>
                        <td><?php echo $rate["rate_3"] ?></td>
                        <td><?php echo $rate["rate_4"] ?></td>
                        <td><?php echo $rate["rate_5"] ?></td>
                        <td><?php echo $rate["rate_6"] ?></td>
                        <td><?php echo $rate["rate_7"] ?></td>
                        <td><?php echo $rate["rate_8"] ?></td>
                        <td><?php echo $rate["rate_9"] ?></td>
                        <td><?php echo $rate["rate_10"] ?></td>
                    <?php endforeach ?>
                <?php else : ?>
                    <td colspan="11">No rates history.</td>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $footer ?>