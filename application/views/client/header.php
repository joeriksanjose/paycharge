<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("public/css/global.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("public/datetimepicker/css/bootstrap-datetimepicker.min.css") ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery1_9.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery_migrate_plugin.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/datetimepicker/js/bootstrap-datetimepicker.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery.tablesorter.min.js") ?>"></script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function(){
            // show change pass modal
            $("#changePassBtn").click(function(){
                $("#changePassModal").modal();
                return false;
            });
            
            // close change pass modal
            $("#closeChangePassModal").click(function(){
                $("#changePassModal").modal("hide");
                return false;
            });
        })
    </script>
</head>
<body>
<!-- LOADING MODAL -->
<div id="loadingModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <h3 id="myModalLabel">Loading</h3>
    </div>
    <div class="modal-body">
        <div class="progress progress-striped active">
            <div class="bar" style="width: 100%;"></div>
        </div>
    </div>
</div>
<!-- END LOADING MODAL -->

<!-- CHANGE PASS MODAL -->
<div id="changePassModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <h3 id="changePassModalLabel">Change Password</h3>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url("client/pcs/change_password") ?>" method="post" class="form-horizontal">
            <input type="hidden" id="contact_no" name="contact_no" value="<?php echo $client["contact_no"]; ?>">
            <input type="hidden" id="username" name="username" value="<?php echo $client["username"]; ?>">
            <div class="control-group">
                <label class="control-label" for="currPass">Current Password</label>
                <div class="controls">
                    <input type="password" id="currPass" name="currPass">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="newPass">New Password</label>
                <div class="controls">
                    <input type="password" id="newPass" name="newPass">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="reNewPass">Retype New Password</label>
                <div class="controls">
                    <input type="password" id="reNewPass" name="reNewPass">
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <a href="#" id="closeChangePassModal" class="btn">Close</a>
    </div>
    </form>
</div>
<!-- END CHANGE PASS MODAL -->

<div class="container">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="pull-right" style="margin-top: 10px; margin-left: 5px;">
                    <a href="<?php echo base_url("client/home/logout") ?>">Logout</a>
                </div>
                <div class="pull-right" style="margin-top: 10px; margin-left: 5px;">
                    <a href="#" id="changePassBtn">Change Password</a>
                </div>
                <div class="pull-right" style="margin-top: 10px">
                    Welcome <?php echo $name ?>!
                </div>
            </div>
        </div>
    </div>