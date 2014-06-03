<?php echo $header ?>
<div class="topmargin"></div>
<div class="row">
    <div class="span12">
        <h2 class="titles">Payroll Email Address</h2>
        <hr>
    </div>
    <div class="span12">
        <form action="<?php echo base_url("utilities/payroll_email_address") ?>" method="post">
            <table class="table table-bordered">
                <tr>
                    <td>Current Email Address</td>
                    <td><input type="text" class="input-large" disabled="disabled" value="<?php echo $current_email_address ?>"></td>
                </tr>
                <tr>
                    <td>Update Email Address</td>
                    <td><input type="text" name="new_email_add" class="input-large"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-block" name="btnUpdateEmail">Update email address</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php echo $footer ?>