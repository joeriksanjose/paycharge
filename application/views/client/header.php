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
</head>
<body>
<div class="container">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a href="<?php echo base_url("clients") ?>" class="brand pull-right">PCS (Client)</a>
                
                <div class="pull-right" style="margin-top: 10px; margin-left: 5px;">
                    <a href="<?php echo base_url("client/home/logout") ?>">Logout</a>
                </div>
                <div class="pull-right" style="margin-top: 10px">
                    Welcome <?php echo $name ?>!
                </div>
            </div>
        </div>
    </div>