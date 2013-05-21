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
                <a href="<?php echo base_url("sales_transactio") ?>" class="brand pull-right">PCS</a>
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-folder-open"></i> Libraries <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("libraries/position") ?>">Position</a></li>
                            <li><a href="<?php echo base_url("libraries/contacts") ?>">Contacts</a></li>
                            <li><a href="<?php echo base_url("libraries/clients") ?>">Clients/Company</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="pull-right" style="margin-top: 10px; margin-left: 5px;">
                    <a href="<?php echo base_url("logout") ?>">Logout</a>
                </div>
                <div class="pull-right" style="margin-top: 10px">
                    Welcome <?php echo $username ?>!
                </div>
            </div>
        </div>
    </div>