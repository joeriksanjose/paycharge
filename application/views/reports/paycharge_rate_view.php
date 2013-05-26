<?php echo $header;?>

<div class="topmargin"></div>
<div class="row">
    <div class="span12">
        <h2 class="titles">Pay and Charge Rate Schedule <small>( <?php echo $type?> )</small></h2>
        <hr>
    </div>
    
<div class="span12" id="search-modern">
        <div class="form-search pull-right">
            <input type="text" class="input-xlarge search-query" id="search-award">
            <button type="button" class="btn" id="btn-search-award"><i class="icon-search"></i></button>
        </div>
    </div>
    <div class="span12" id="modern-body" style="max-height: 400px; overflow: auto;">
        <table class="table table-bordered table-striped" id="award-table" style="margin-top: 15px;">
            <thead>
            <tr>
                <th>Trans No</th>
                <th>Modern Award Name</th>
                <th>Client</th>
                <th>Date of Quotation</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($modern_awards)) : ?>
            <?php foreach ($modern_awards as $modern_award) : ?>
            <tr>
                <td><?php echo $modern_award["trans_no"] ?></td>
                <td><?php echo $modern_award["transaction_name"] ?></td>
                <td><?php echo $modern_award["company_name"] ?></td>
                <td><?php echo $modern_award["date_of_quotation"] ?></td>
                <td>
                    <a target="_blank" class="btn edit-award-btn" href="<?php echo base_url("reports/paycharge_rate/print_modern/".$modern_award["trans_no"]."/".$modern_award["modern_award_no"]); ?>"><i class="icon-print"></i></a>
                </td>
            </tr>
            <?php endforeach ; ?>
            <?php else : ?>
            <tr>
                <td colspan="4">Empty Record</td>
            </tr>   
            <?php endif ; ?>
            </tbody>
        </table>
    </div>
</div>  
<?php echo $footer;?>